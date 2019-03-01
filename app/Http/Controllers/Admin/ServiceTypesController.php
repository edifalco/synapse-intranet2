<?php

namespace App\Http\Controllers\Admin;

use App\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceTypesRequest;
use App\Http\Requests\Admin\UpdateServiceTypesRequest;

class ServiceTypesController extends Controller
{
    /**
     * Display a listing of ServiceType.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('service_type_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('service_type_delete')) {
                return abort(401);
            }
            $service_types = ServiceType::onlyTrashed()->get();
        } else {
            $service_types = ServiceType::all();
        }

        return view('admin.service_types.index', compact('service_types'));
    }

    /**
     * Show the form for creating new ServiceType.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('service_type_create')) {
            return abort(401);
        }
        return view('admin.service_types.create');
    }

    /**
     * Store a newly created ServiceType in storage.
     *
     * @param  \App\Http\Requests\StoreServiceTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceTypesRequest $request)
    {
        if (! Gate::allows('service_type_create')) {
            return abort(401);
        }
        $service_type = ServiceType::create($request->all());



        return redirect()->route('admin.service_types.index');
    }


    /**
     * Show the form for editing ServiceType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('service_type_edit')) {
            return abort(401);
        }
        $service_type = ServiceType::findOrFail($id);

        return view('admin.service_types.edit', compact('service_type'));
    }

    /**
     * Update ServiceType in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTypesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTypesRequest $request, $id)
    {
        if (! Gate::allows('service_type_edit')) {
            return abort(401);
        }
        $service_type = ServiceType::findOrFail($id);
        $service_type->update($request->all());



        return redirect()->route('admin.service_types.index');
    }


    /**
     * Display ServiceType.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('service_type_view')) {
            return abort(401);
        }
        $invoices = \App\Invoice::where('service_type_id', $id)->get();

        $service_type = ServiceType::findOrFail($id);

        return view('admin.service_types.show', compact('service_type', 'invoices'));
    }


    /**
     * Remove ServiceType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('service_type_delete')) {
            return abort(401);
        }
        $service_type = ServiceType::findOrFail($id);
        $service_type->delete();

        return redirect()->route('admin.service_types.index');
    }

    /**
     * Delete all selected ServiceType at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('service_type_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ServiceType::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ServiceType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('service_type_delete')) {
            return abort(401);
        }
        $service_type = ServiceType::onlyTrashed()->findOrFail($id);
        $service_type->restore();

        return redirect()->route('admin.service_types.index');
    }

    /**
     * Permanently delete ServiceType from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('service_type_delete')) {
            return abort(401);
        }
        $service_type = ServiceType::onlyTrashed()->findOrFail($id);
        $service_type->forceDelete();

        return redirect()->route('admin.service_types.index');
    }
}
