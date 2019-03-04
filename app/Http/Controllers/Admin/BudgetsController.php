<?php

namespace App\Http\Controllers\Admin;

use App\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBudgetsRequest;
use App\Http\Requests\Admin\UpdateBudgetsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class BudgetsController extends Controller
{
    /**
     * Display a listing of Budget.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('budget_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Budget::query();
            $query->with("projects");
            $query->with("category");
            $query->with("year");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('budget_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'budgets.id',
                'budgets.amount',
                'budgets.projects_id',
                'budgets.category_id',
                'budgets.year_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'budget_';
                $routeKey = 'admin.budgets';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('projects.name', function ($row) {
                return $row->projects ? $row->projects->name : '';
            });
            $table->editColumn('category.name', function ($row) {
                return $row->category ? $row->category->name : '';
            });
            $table->editColumn('year.name', function ($row) {
                return $row->year ? $row->year->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.budgets.index');
    }

    /**
     * Show the form for creating new Budget.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('budget_create')) {
            return abort(401);
        }
        
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $categories = \App\Category::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $years = \App\Year::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.budgets.create', compact('projects', 'categories', 'years'));
    }

    /**
     * Store a newly created Budget in storage.
     *
     * @param  \App\Http\Requests\StoreBudgetsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBudgetsRequest $request)
    {
        if (! Gate::allows('budget_create')) {
            return abort(401);
        }
        $budget = Budget::create($request->all());



        return redirect()->route('admin.budgets.index');
    }


    /**
     * Show the form for editing Budget.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('budget_edit')) {
            return abort(401);
        }
        
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $categories = \App\Category::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $years = \App\Year::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $budget = Budget::findOrFail($id);

        return view('admin.budgets.edit', compact('budget', 'projects', 'categories', 'years'));
    }

    /**
     * Update Budget in storage.
     *
     * @param  \App\Http\Requests\UpdateBudgetsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetsRequest $request, $id)
    {
        if (! Gate::allows('budget_edit')) {
            return abort(401);
        }
        $budget = Budget::findOrFail($id);
        $budget->update($request->all());



        return redirect()->route('admin.budgets.index');
    }


    /**
     * Display Budget.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('budget_view')) {
            return abort(401);
        }
        $budget = Budget::findOrFail($id);

        return view('admin.budgets.show', compact('budget'));
    }


    /**
     * Remove Budget from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('budget_delete')) {
            return abort(401);
        }
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return redirect()->route('admin.budgets.index');
    }

    /**
     * Delete all selected Budget at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('budget_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Budget::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Budget from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('budget_delete')) {
            return abort(401);
        }
        $budget = Budget::onlyTrashed()->findOrFail($id);
        $budget->restore();

        return redirect()->route('admin.budgets.index');
    }

    /**
     * Permanently delete Budget from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('budget_delete')) {
            return abort(401);
        }
        $budget = Budget::onlyTrashed()->findOrFail($id);
        $budget->forceDelete();

        return redirect()->route('admin.budgets.index');
    }
}
