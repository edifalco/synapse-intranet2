<?php

namespace App\Http\Controllers\Admin;

use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProvidersRequest;
use App\Http\Requests\Admin\UpdateProvidersRequest;

class ProvidersController extends Controller
{
    /**
     * Display a listing of Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('provider_access')) {
            return abort(401);
        }


        if (request('show_deleted') == 1) {
            if (! Gate::allows('provider_delete')) {
                return abort(401);
            }
            $providers = Provider::onlyTrashed()->get();
        } else {
            $providers = Provider::all();
        }

        return view('admin.providers.index', compact('providers'));
    }

    /**
     * Show the form for creating new Provider.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('provider_create')) {
            return abort(401);
        }
        return view('admin.providers.create');
    }

    /**
     * Store a newly created Provider in storage.
     *
     * @param  \App\Http\Requests\StoreProvidersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProvidersRequest $request)
    {
        if (! Gate::allows('provider_create')) {
            return abort(401);
        }
        $provider = Provider::create($request->all());



        return redirect()->route('admin.providers.index');
    }


    /**
     * Show the form for editing Provider.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('provider_edit')) {
            return abort(401);
        }
        $provider = Provider::findOrFail($id);

        return view('admin.providers.edit', compact('provider'));
    }

    /**
     * Update Provider in storage.
     *
     * @param  \App\Http\Requests\UpdateProvidersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProvidersRequest $request, $id)
    {
        if (! Gate::allows('provider_edit')) {
            return abort(401);
        }
        $provider = Provider::findOrFail($id);
        $provider->update($request->all());



        return redirect()->route('admin.providers.index');
    }


    /**
     * Display Provider.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('provider_view')) {
            return abort(401);
        }
        $invoices = \App\Invoice::where('provider_id', $id)->get();

        $provider = Provider::findOrFail($id);

        return view('admin.providers.show', compact('provider', 'invoices'));
    }


    /**
     * Remove Provider from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('provider_delete')) {
            return abort(401);
        }
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('admin.providers.index');
    }

    /**
     * Delete all selected Provider at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('provider_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Provider::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Provider from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('provider_delete')) {
            return abort(401);
        }
        $provider = Provider::onlyTrashed()->findOrFail($id);
        $provider->restore();

        return redirect()->route('admin.providers.index');
    }

    /**
     * Permanently delete Provider from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('provider_delete')) {
            return abort(401);
        }
        $provider = Provider::onlyTrashed()->findOrFail($id);
        $provider->forceDelete();

        return redirect()->route('admin.providers.index');
    }
}
