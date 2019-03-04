<?php

namespace App\Http\Controllers\Admin;

use App\CrmDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCrmDocumentsRequest;
use App\Http\Requests\Admin\UpdateCrmDocumentsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class CrmDocumentsController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of CrmDocument.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('crm_document_access')) {
            return abort(401);
        }


                $crm_documents = CrmDocument::all();

        return view('admin.crm_documents.index', compact('crm_documents'));
    }

    /**
     * Show the form for creating new CrmDocument.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('crm_document_create')) {
            return abort(401);
        }
        
        $customers = \App\CrmCustomer::get()->pluck('first_name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.crm_documents.create', compact('customers'));
    }

    /**
     * Store a newly created CrmDocument in storage.
     *
     * @param  \App\Http\Requests\StoreCrmDocumentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCrmDocumentsRequest $request)
    {
        if (! Gate::allows('crm_document_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $crm_document = CrmDocument::create($request->all());



        return redirect()->route('admin.crm_documents.index');
    }


    /**
     * Show the form for editing CrmDocument.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('crm_document_edit')) {
            return abort(401);
        }
        
        $customers = \App\CrmCustomer::get()->pluck('first_name', 'id')->prepend(trans('global.app_please_select'), '');

        $crm_document = CrmDocument::findOrFail($id);

        return view('admin.crm_documents.edit', compact('crm_document', 'customers'));
    }

    /**
     * Update CrmDocument in storage.
     *
     * @param  \App\Http\Requests\UpdateCrmDocumentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCrmDocumentsRequest $request, $id)
    {
        if (! Gate::allows('crm_document_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $crm_document = CrmDocument::findOrFail($id);
        $crm_document->update($request->all());



        return redirect()->route('admin.crm_documents.index');
    }


    /**
     * Display CrmDocument.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('crm_document_view')) {
            return abort(401);
        }
        $crm_document = CrmDocument::findOrFail($id);

        return view('admin.crm_documents.show', compact('crm_document'));
    }


    /**
     * Remove CrmDocument from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('crm_document_delete')) {
            return abort(401);
        }
        $crm_document = CrmDocument::findOrFail($id);
        $crm_document->delete();

        return redirect()->route('admin.crm_documents.index');
    }

    /**
     * Delete all selected CrmDocument at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('crm_document_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CrmDocument::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
