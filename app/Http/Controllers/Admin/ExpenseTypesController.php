<?php

namespace App\Http\Controllers\Admin;

use App\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreExpenseTypesRequest;
use App\Http\Requests\Admin\UpdateExpenseTypesRequest;

class ExpenseTypesController extends Controller
{
    /**
     * Display a listing of ExpenseType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('expense_type_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('expense_type_delete')) {
                return abort(401);
            }
            $expense_types = ExpenseType::onlyTrashed()->get();
        } else {
            $expense_types = ExpenseType::all();
        }

        return view('admin.expense_types.index', compact('expense_types'));
    }

    /**
     * Show the form for creating new ExpenseType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('expense_type_create')) {
            return abort(401);
        }
        return view('admin.expense_types.create');
    }

    /**
     * Store a newly created ExpenseType in storage.
     *
     * @param  \App\Http\Requests\StoreExpenseTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseTypesRequest $request)
    {
        if (! Gate::allows('expense_type_create')) {
            return abort(401);
        }
        $expense_type = ExpenseType::create($request->all());



        return redirect()->route('admin.expense_types.index');
    }


    /**
     * Show the form for editing ExpenseType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('expense_type_edit')) {
            return abort(401);
        }
        $expense_type = ExpenseType::findOrFail($id);

        return view('admin.expense_types.edit', compact('expense_type'));
    }

    /**
     * Update ExpenseType in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseTypesRequest $request, $id)
    {
        if (! Gate::allows('expense_type_edit')) {
            return abort(401);
        }
        $expense_type = ExpenseType::findOrFail($id);
        $expense_type->update($request->all());



        return redirect()->route('admin.expense_types.index');
    }


    /**
     * Display ExpenseType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('expense_type_view')) {
            return abort(401);
        }
        $invoices = \App\Invoice::where('expense_type_id', $id)->get();

        $expense_type = ExpenseType::findOrFail($id);

        return view('admin.expense_types.show', compact('expense_type', 'invoices'));
    }


    /**
     * Remove ExpenseType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('expense_type_delete')) {
            return abort(401);
        }
        $expense_type = ExpenseType::findOrFail($id);
        $expense_type->delete();

        return redirect()->route('admin.expense_types.index');
    }

    /**
     * Delete all selected ExpenseType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('expense_type_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ExpenseType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ExpenseType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('expense_type_delete')) {
            return abort(401);
        }
        $expense_type = ExpenseType::onlyTrashed()->findOrFail($id);
        $expense_type->restore();

        return redirect()->route('admin.expense_types.index');
    }

    /**
     * Permanently delete ExpenseType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('expense_type_delete')) {
            return abort(401);
        }
        $expense_type = ExpenseType::onlyTrashed()->findOrFail($id);
        $expense_type->forceDelete();

        return redirect()->route('admin.expense_types.index');
    }
}
