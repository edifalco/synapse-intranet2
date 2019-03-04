<?php

namespace App\Http\Controllers\Admin;

use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMeetingsRequest;
use App\Http\Requests\Admin\UpdateMeetingsRequest;
use Yajra\DataTables\DataTables;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class MeetingsController extends Controller
{
    /**
     * Display a listing of Meeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('meeting_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Meeting::query();
            $query->with("project");
            $query->with("status");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('meeting_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'meetings.id',
                'meetings.name',
                'meetings.city',
                'meetings.start_date',
                'meetings.end_date',
                'meetings.project_id',
                'meetings.status_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'meeting_';
                $routeKey = 'admin.meetings';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('start_date', function ($row) {
                return $row->start_date ? $row->start_date : '';
            });
            $table->editColumn('end_date', function ($row) {
                return $row->end_date ? $row->end_date : '';
            });
            $table->editColumn('project.name', function ($row) {
                return $row->project ? $row->project->name : '';
            });
            $table->editColumn('status.name', function ($row) {
                return $row->status ? $row->status->name : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.meetings.index');
    }

    /**
     * Show the form for creating new Meeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('meeting_create')) {
            return abort(401);
        }
        
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        return view('admin.meetings.create', compact('projects', 'statuses'));
    }

    /**
     * Store a newly created Meeting in storage.
     *
     * @param  \App\Http\Requests\StoreMeetingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingsRequest $request)
    {
        if (! Gate::allows('meeting_create')) {
            return abort(401);
        }
        $meeting = Meeting::create($request->all());



        return redirect()->route('admin.meetings.index');
    }


    /**
     * Show the form for editing Meeting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('meeting_edit')) {
            return abort(401);
        }
        
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');

        $meeting = Meeting::findOrFail($id);

        return view('admin.meetings.edit', compact('meeting', 'projects', 'statuses'));
    }

    /**
     * Update Meeting in storage.
     *
     * @param  \App\Http\Requests\UpdateMeetingsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMeetingsRequest $request, $id)
    {
        if (! Gate::allows('meeting_edit')) {
            return abort(401);
        }
        $meeting = Meeting::findOrFail($id);
        $meeting->update($request->all());



        return redirect()->route('admin.meetings.index');
    }


    /**
     * Display Meeting.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('meeting_view')) {
            return abort(401);
        }
        
        $projects = \App\Project::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$expenses = \App\Expense::where('meeting_id', $id)->get();

        $meeting = Meeting::findOrFail($id);

        return view('admin.meetings.show', compact('meeting', 'expenses'));
    }


    /**
     * Remove Meeting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('meeting_delete')) {
            return abort(401);
        }
        $meeting = Meeting::findOrFail($id);
        $meeting->delete();

        return redirect()->route('admin.meetings.index');
    }

    /**
     * Delete all selected Meeting at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('meeting_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Meeting::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Meeting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('meeting_delete')) {
            return abort(401);
        }
        $meeting = Meeting::onlyTrashed()->findOrFail($id);
        $meeting->restore();

        return redirect()->route('admin.meetings.index');
    }

    /**
     * Permanently delete Meeting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('meeting_delete')) {
            return abort(401);
        }
        $meeting = Meeting::onlyTrashed()->findOrFail($id);
        $meeting->forceDelete();

        return redirect()->route('admin.meetings.index');
    }
}
