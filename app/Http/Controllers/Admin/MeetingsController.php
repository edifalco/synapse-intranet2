<?php

namespace App\Http\Controllers\Admin;

use App\Meeting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMeetingsRequest;
use App\Http\Requests\Admin\UpdateMeetingsRequest;

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


        if (request('show_deleted') == 1) {
            if (! Gate::allows('meeting_delete')) {
                return abort(401);
            }
            $meetings = Meeting::onlyTrashed()->get();
        } else {
            $meetings = Meeting::all();
        }

        return view('admin.meetings.index', compact('meetings'));
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
        $statuses = \App\Status::get()->pluck('name', 'id')->prepend(trans('global.app_please_select'), '');$invoices = \App\Invoice::where('meeting_id', $id)->get();

        $meeting = Meeting::findOrFail($id);

        return view('admin.meetings.show', compact('meeting', 'invoices'));
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
