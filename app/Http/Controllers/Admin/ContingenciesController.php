<?php

namespace App\Http\Controllers\Admin;

use App\Contingency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContingenciesRequest;
use App\Http\Requests\Admin\UpdateContingenciesRequest;

class ContingenciesController extends Controller
{
    /**
     * Display a listing of Contingency.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contingency_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('contingency_delete')) {
                return abort(401);
            }
            $contingencies = Contingency::onlyTrashed()->get();
        } else {
            $contingencies = Contingency::all();
        }

        return view('admin.contingencies.index', compact('contingencies'));
    }

    /**
     * Show the form for creating new Contingency.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contingency_create')) {
            return abort(401);
        }
        return view('admin.contingencies.create');
    }

    /**
     * Store a newly created Contingency in storage.
     *
     * @param  \App\Http\Requests\StoreContingenciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContingenciesRequest $request)
    {
        if (! Gate::allows('contingency_create')) {
            return abort(401);
        }
        $contingency = Contingency::create($request->all());



        return redirect()->route('admin.contingencies.index');
    }


    /**
     * Show the form for editing Contingency.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contingency_edit')) {
            return abort(401);
        }
        $contingency = Contingency::findOrFail($id);

        return view('admin.contingencies.edit', compact('contingency'));
    }

    /**
     * Update Contingency in storage.
     *
     * @param  \App\Http\Requests\UpdateContingenciesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContingenciesRequest $request, $id)
    {
        if (! Gate::allows('contingency_edit')) {
            return abort(401);
        }
        $contingency = Contingency::findOrFail($id);
        $contingency->update($request->all());



        return redirect()->route('admin.contingencies.index');
    }


    /**
     * Display Contingency.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contingency_view')) {
            return abort(401);
        }
        $invoices = \App\Invoice::where('contingency_id', $id)->get();

        $contingency = Contingency::findOrFail($id);

        return view('admin.contingencies.show', compact('contingency', 'invoices'));
    }


    /**
     * Remove Contingency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contingency_delete')) {
            return abort(401);
        }
        $contingency = Contingency::findOrFail($id);
        $contingency->delete();

        return redirect()->route('admin.contingencies.index');
    }

    /**
     * Delete all selected Contingency at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contingency_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Contingency::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Contingency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('contingency_delete')) {
            return abort(401);
        }
        $contingency = Contingency::onlyTrashed()->findOrFail($id);
        $contingency->restore();

        return redirect()->route('admin.contingencies.index');
    }

    /**
     * Permanently delete Contingency from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('contingency_delete')) {
            return abort(401);
        }
        $contingency = Contingency::onlyTrashed()->findOrFail($id);
        $contingency->forceDelete();

        return redirect()->route('admin.contingencies.index');
    }
}
