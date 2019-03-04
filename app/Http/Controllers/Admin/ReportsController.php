<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Carbon\Carbon; 

class ReportsController extends Controller
{
    public function monthlyExpenses(Request $request)
    {
         if ($request->has('date_filter')) { 
              $parts = explode(' - ' , $request->input('date_filter')); 
              $date_from = Carbon::createFromFormat(config('app.date_format'), $parts[0])->format('Y-m-d');
              $date_to = Carbon::createFromFormat(config('app.date_format'), $parts[1])->format('Y-m-d');
         } else { 
              $date_from = new Carbon('last Monday');
              $date_to = new Carbon('this Sunday');
         } 
        $reportTitle = 'Monthly Expenses';
        $reportLabel = 'SUM';
        $chartType   = 'bar';

        $results = Expense::where('due_date', '>=', $date_from)->where('due_date', '<=', $date_to)->get()->sortBy('due_date')->groupBy(function ($entry) {
            if ($entry->due_date instanceof \Carbon\Carbon) {
                return \Carbon\Carbon::parse($entry->due_date)->format('Y-m-d');
            }
            try {
               return \Carbon\Carbon::createFromFormat(config('app.date_format'), $entry->due_date)->format('Y-m-d');
            } catch (\Exception $e) {
                 return \Carbon\Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $entry->due_date)->format('Y-m-d');
            }        })->map(function ($entries, $group) {
            return $entries->sum('invoice_total');
        });

        return view('admin.reports', compact('reportTitle', 'results', 'chartType', 'reportLabel'));
    }

}
