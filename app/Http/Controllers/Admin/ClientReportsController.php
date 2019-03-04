<?php

namespace App\Http\Controllers\Admin;

use App\ClientProject;
use Carbon\Carbon;
use App\ClientTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClientReportsController extends Controller
{
    /**
     * Index page
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $q = ClientTransaction::with('project')
            ->with('transaction_type')
            ->with('income_source')
            ->with('currency')
            ->orderBy('transaction_date', 'desc');

        if ($request->has('project')) {
            $q->where('project_id', $request->project);
        }

        $transactions = $q->get();

        $entries = [];
        foreach ($transactions as $row) {
            if ($row->transaction_date != null) {
                $date = Carbon::createFromFormat(config('app.date_format'), $row->transaction_date)->format("Y-m");
                if (!isset($entries[$date])) {
                    $entries[$date] = [];
                }
                $currency = $row->currency->code;
                if (!isset($entries[$date][$currency])) {
                    $entries[$date][$currency] = [
                        'income'   => 0,
                        'expenses' => 0,
                        'fees'     => 0,
                        'total'    => 0
                    ];
                }
                $income   = 0;
                $expenses = 0;
                $fees     = 0;
                if ($row->amount > 0) {
                    $income += $row->amount;
                } else {
                    $expenses += $row->amount;
                }
                if (!is_null($row->income_source->fee_percent)) {
                    $fees = $row->amount * ($row->income_source->fee_percent / 100);
                }

                $total = $income + $expenses - $fees;
                $entries[$date][$currency]['income'] += $income;
                $entries[$date][$currency]['expenses'] += $expenses;
                $entries[$date][$currency]['fees'] += $fees;
                $entries[$date][$currency]['total'] += $total;
            }
        }
        $projects = ClientProject::pluck('title', 'id')->prepend('--- All projects ---', '');
        if ($request->has('project')) {
            $currentProject = $request->get('project');
        } else {
            $currentProject = '';
        }

        return view('admin.client_reports.index', compact('entries', 'projects', 'currentProject'));
    }
}
