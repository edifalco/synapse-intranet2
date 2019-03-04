<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExpensesRequest;
use App\Http\Requests\Admin\UpdateExpensesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class ExpensesController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('expense_access')) {
            return abort(401);
        }
        if ($filterBy = Input::get('filter')) {
            if ($filterBy == 'all') {
                Session::put('Expense.filter', 'all');
            } elseif ($filterBy == 'my') {
                Session::put('Expense.filter', 'my');
            }
        }

        
        if (request()->ajax()) {
            $query = Expense::query();
            $query->with("user");
            $query->with("project");
            $query->with("expense_type");
            $query->with("meeting");
            $query->with("contingency");
            $query->with("provider");
            $query->with("service_type");
            $query->with("pm");
            $query->with("finance");
            $query->with("created_by");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('expense_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'expenses.id',
                'expenses.user_id',
                'expenses.project_id',
                'expenses.expense_type_id',
                'expenses.meeting_id',
                'expenses.contingency_id',
                'expenses.date',
                'expenses.due_date',
                'expenses.invoice_subtotal',
                'expenses.invoice_taxes',
                'expenses.invoice_total',
                'expenses.budget_subtotal',
                'expenses.budget_taxes',
                'expenses.budget_total',
                'expenses.provider_id',
                'expenses.service_type_id',
                'expenses.service',
                'expenses.selection_criteria',
                'expenses.pm_id',
                'expenses.pm_approval_date',
                'expenses.finance_id',
                'expenses.finance_approval_date',
                'expenses.created_by_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'expense_';
                $routeKey = 'admin.expenses';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('user.name', function ($row) {
                return $row->user ? $row->user->name : '';
            });
            $table->editColumn('project.name', function ($row) {
                return $row->project ? $row->project->name : '';
            });
            $table->editColumn('expense_type.name', function ($row) {
                return $row->expense_type ? $row->expense_type->name : '';
            });
            $table->editColumn('meeting.name', function ($row) {
                return $row->meeting ? $row->meeting->name : '';
            });
            $table->editColumn('contingency.name', function ($row) {
                return $row->contingency ? $row->contingency->name : '';
            });
            $table->editColumn('date', function ($row) {
                return $row->date ? $row->date : '';
            });
            $table->editColumn('due_date', function ($row) {
                return $row->due_date ? $row->due_date : '';
            });
            $table->editColumn('invoice_subtotal', function ($row) {
                return $row->invoice_subtotal ? $row->invoice_subtotal : '';
            });
            $table->editColumn('invoice_taxes', function ($row) {
                return $row->invoice_taxes ? $row->invoice_taxes : '';
            });
            $table->editColumn('invoice_total', function ($row) {
                return $row->invoice_total ? $row->invoice_total : '';
            });
            $table->editColumn('budget_subtotal', function ($row) {
                return $row->budget_subtotal ? $row->budget_subtotal : '';
            });
            $table->editColumn('budget_taxes', function ($row) {
                return $row->budget_taxes ? $row->budget_taxes : '';
            });
            $table->editColumn('budget_total', function ($row) {
                return $row->budget_total ? $row->budget_total : '';
            });
            $table->editColumn('provider.name', function ($row) {
                return $row->provider ? $row->provider->name : '';
            });
            $table->editColumn('service_type.name', function ($row) {
                return $row->service_type ? $row->service_type->name : '';
            });
            $table->editColumn('service', function ($row) {
                return $row->service ? $row->service : '';
            });
            $table->editColumn('selection_criteria', function ($row) {
                return $row->selection_criteria ? $row->selection_criteria : '';
            });
            $table->editColumn('pm.name', function ($row) {
                return $row->pm ? $row->pm->name : '';
            });
            $table->editColumn('pm_approval_date', function ($row) {
                return $row->pm_approval_date ? $row->pm_approval_date : '';
            });
            $table->editColumn('finance.name', function ($row) {
                return $row->finance ? $row->finance->name : '';
            });
            $table->editColumn('finance_approval_date', function ($row) {
                return $row->finance_approval_date ? $row->finance_approval_date : '';
            });
            $table->editColumn('files', function ($row) {
                $build  = '';
                foreach ($row->getMedia('files') as $media) {
                    $build .= '<p class="form-group"><a href="' . $media->getUrl() . '" target="_blank">' . $media->name . '</a></p>';
                }
                
                return $build;
            });
            $table->editColumn('created_by.name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions','massDelete','files']);

            return $table->make(true);
        }

        return view('admin.expenses.index');
    }

    /**
     * Show the form for creating new Expense.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('expense_create')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $expense_types = \App\ExpenseType::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $meetings = \App\Meeting::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $contingencies = \App\Contingency::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $providers = \App\Provider::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $service_types = \App\ServiceType::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $pms = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $finances = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.expenses.create', compact('users', 'projects', 'expense_types', 'meetings', 'contingencies', 'providers', 'service_types', 'pms', 'finances', 'created_bies'));
    }

    /**
     * Store a newly created Expense in storage.
     *
     * @param  \App\Http\Requests\StoreExpensesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpensesRequest $request)
    {
        if (! Gate::allows('expense_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $expense = Expense::create($request->all());


        foreach ($request->input('files_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $expense->id;
            $file->save();
        }


        return redirect()->route('admin.expenses.index');
    }


    /**
     * Show the form for editing Expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('expense_edit')) {
            return abort(401);
        }
        
        $users = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $expense_types = \App\ExpenseType::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $meetings = \App\Meeting::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $contingencies = \App\Contingency::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $providers = \App\Provider::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $service_types = \App\ServiceType::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $pms = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $finances = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $created_bies = \App\User::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $expense = Expense::findOrFail($id);

        return view('admin.expenses.edit', compact('expense', 'users', 'projects', 'expense_types', 'meetings', 'contingencies', 'providers', 'service_types', 'pms', 'finances', 'created_bies'));
    }

    /**
     * Update Expense in storage.
     *
     * @param  \App\Http\Requests\UpdateExpensesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpensesRequest $request, $id)
    {
        if (! Gate::allows('expense_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $expense = Expense::findOrFail($id);
        $expense->update($request->all());


        $media = [];
        foreach ($request->input('files_id', []) as $index => $id) {
            $model          = config('medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $expense->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $expense->updateMedia($media, 'files');


        return redirect()->route('admin.expenses.index');
    }


    /**
     * Display Expense.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('expense_view')) {
            return abort(401);
        }
        $expense = Expense::findOrFail($id);

        return view('admin.expenses.show', compact('expense'));
    }


    /**
     * Remove Expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('expense_delete')) {
            return abort(401);
        }
        $expense = Expense::findOrFail($id);
        $expense->deletePreservingMedia();

        return redirect()->route('admin.expenses.index');
    }

    /**
     * Delete all selected Expense at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('expense_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Expense::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('expense_delete')) {
            return abort(401);
        }
        $expense = Expense::onlyTrashed()->findOrFail($id);
        $expense->restore();

        return redirect()->route('admin.expenses.index');
    }

    /**
     * Permanently delete Expense from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('expense_delete')) {
            return abort(401);
        }
        $expense = Expense::onlyTrashed()->findOrFail($id);
        $expense->forceDelete();

        return redirect()->route('admin.expenses.index');
    }
}
