@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.projects.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.projects.fields.name')</th>
                            <td field-key='name'>{{ $project->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.projects.fields.start-date')</th>
                            <td field-key='start_date'>{{ $project->start_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.projects.fields.end-date')</th>
                            <td field-key='end_date'>{{ $project->end_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.projects.fields.logo')</th>
                            <td field-key='logo'>@if($project->logo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $project->logo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $project->logo) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('global.projects.fields.status')</th>
                            <td field-key='status'>{{ $project->status->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#budgets" aria-controls="budgets" role="tab" data-toggle="tab">Budgets</a></li>
<li role="presentation" class=""><a href="#expenses" aria-controls="expenses" role="tab" data-toggle="tab">Expenses</a></li>
<li role="presentation" class=""><a href="#meetings" aria-controls="meetings" role="tab" data-toggle="tab">Meetings</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="budgets">
<table class="table table-bordered table-striped {{ count($budgets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.budgets.fields.amount')</th>
                        <th>@lang('global.budgets.fields.projects')</th>
                        <th>@lang('global.budgets.fields.category')</th>
                        <th>@lang('global.budgets.fields.year')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($budgets) > 0)
            @foreach ($budgets as $budget)
                <tr data-entry-id="{{ $budget->id }}">
                    <td field-key='amount'>{{ $budget->amount }}</td>
                                <td field-key='projects'>{{ $budget->projects->name ?? '' }}</td>
                                <td field-key='category'>{{ $budget->category->name ?? '' }}</td>
                                <td field-key='year'>{{ $budget->year->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.budgets.restore', $budget->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.budgets.perma_del', $budget->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('budget_view')
                                    <a href="{{ route('admin.budgets.show',[$budget->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('budget_edit')
                                    <a href="{{ route('admin.budgets.edit',[$budget->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('budget_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.budgets.destroy', $budget->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="expenses">
<table class="table table-bordered table-striped {{ count($expenses) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.expenses.fields.user')</th>
                        <th>@lang('global.expenses.fields.project')</th>
                        <th>@lang('global.expenses.fields.expense-type')</th>
                        <th>@lang('global.expenses.fields.meeting')</th>
                        <th>@lang('global.expenses.fields.contingency')</th>
                        <th>@lang('global.expenses.fields.date')</th>
                        <th>@lang('global.expenses.fields.due-date')</th>
                        <th>@lang('global.expenses.fields.provider')</th>
                        <th>@lang('global.expenses.fields.pm')</th>
                        <th>@lang('global.expenses.fields.pm-approval-date')</th>
                        <th>@lang('global.expenses.fields.finance')</th>
                        <th>@lang('global.expenses.fields.finance-approval-date')</th>
                        <th>@lang('global.expenses.fields.created-by')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($expenses) > 0)
            @foreach ($expenses as $expense)
                <tr data-entry-id="{{ $expense->id }}">
                    <td field-key='user'>{{ $expense->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $expense->project->name ?? '' }}</td>
                                <td field-key='expense_type'>{{ $expense->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $expense->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $expense->contingency->name ?? '' }}</td>
                                <td field-key='date'>{{ $expense->date }}</td>
                                <td field-key='due_date'>{{ $expense->due_date }}</td>
                                <td field-key='provider'>{{ $expense->provider->name ?? '' }}</td>
                                <td field-key='pm'>{{ $expense->pm->name ?? '' }}</td>
                                <td field-key='pm_approval_date'>{{ $expense->pm_approval_date }}</td>
                                <td field-key='finance'>{{ $expense->finance->name ?? '' }}</td>
                                <td field-key='finance_approval_date'>{{ $expense->finance_approval_date }}</td>
                                <td field-key='created_by'>{{ $expense->created_by->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.expenses.restore', $expense->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.expenses.perma_del', $expense->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('expense_view')
                                    <a href="{{ route('admin.expenses.show',[$expense->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('expense_edit')
                                    <a href="{{ route('admin.expenses.edit',[$expense->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('expense_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.expenses.destroy', $expense->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="28">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="meetings">
<table class="table table-bordered table-striped {{ count($meetings) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.meetings.fields.name')</th>
                        <th>@lang('global.meetings.fields.city')</th>
                        <th>@lang('global.meetings.fields.start-date')</th>
                        <th>@lang('global.meetings.fields.end-date')</th>
                        <th>@lang('global.meetings.fields.project')</th>
                        <th>@lang('global.meetings.fields.status')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($meetings) > 0)
            @foreach ($meetings as $meeting)
                <tr data-entry-id="{{ $meeting->id }}">
                    <td field-key='name'>{{ $meeting->name }}</td>
                                <td field-key='city'>{{ $meeting->city }}</td>
                                <td field-key='start_date'>{{ $meeting->start_date }}</td>
                                <td field-key='end_date'>{{ $meeting->end_date }}</td>
                                <td field-key='project'>{{ $meeting->project->name ?? '' }}</td>
                                <td field-key='status'>{{ $meeting->status->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.meetings.restore', $meeting->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.meetings.perma_del', $meeting->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('meeting_view')
                                    <a href="{{ route('admin.meetings.show',[$meeting->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('meeting_edit')
                                    <a href="{{ route('admin.meetings.edit',[$meeting->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('meeting_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.meetings.destroy', $meeting->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop

@section('javascript')
    @parent

    <script src="{{ url('adminlte/plugins/datetimepicker/moment-with-locales.min.js') }}"></script>
    <script src="{{ url('adminlte/plugins/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function(){
            moment.updateLocale('{{ App::getLocale() }}', {
                week: { dow: 1 } // Monday is the first day of the week
            });
            
            $('.date').datetimepicker({
                format: "{{ config('app.date_format_moment') }}",
                locale: "{{ App::getLocale() }}",
            });
            
        });
    </script>
            
@stop
