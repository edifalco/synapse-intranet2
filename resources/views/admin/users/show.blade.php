@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.users.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.users.fields.name')</th>
                            <td field-key='name'>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.email')</th>
                            <td field-key='email'>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.users.fields.role')</th>
                            <td field-key='role'>
                                @foreach ($user->role as $singleRole)
                                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#expenses" aria-controls="expenses" role="tab" data-toggle="tab">Expenses</a></li>
<li role="presentation" class=""><a href="#user_actions" aria-controls="user_actions" role="tab" data-toggle="tab">User actions</a></li>
<li role="presentation" class=""><a href="#internal_notifications" aria-controls="internal_notifications" role="tab" data-toggle="tab">Notifications</a></li>
<li role="presentation" class=""><a href="#expenses" aria-controls="expenses" role="tab" data-toggle="tab">Expenses</a></li>
<li role="presentation" class=""><a href="#expenses" aria-controls="expenses" role="tab" data-toggle="tab">Expenses</a></li>
<li role="presentation" class=""><a href="#expenses" aria-controls="expenses" role="tab" data-toggle="tab">Expenses</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="expenses">
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
<div role="tabpanel" class="tab-pane " id="user_actions">
<table class="table table-bordered table-striped {{ count($user_actions) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.user-actions.created_at')</th>
                        <th>@lang('global.user-actions.fields.user')</th>
                        <th>@lang('global.user-actions.fields.action')</th>
                        <th>@lang('global.user-actions.fields.action-model')</th>
                        <th>@lang('global.user-actions.fields.action-id')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($user_actions) > 0)
            @foreach ($user_actions as $user_action)
                <tr data-entry-id="{{ $user_action->id }}">
                    <td>{{ $user_action->created_at ?? '' }}</td>
                                <td field-key='user'>{{ $user_action->user->name ?? '' }}</td>
                                <td field-key='action'>{{ $user_action->action }}</td>
                                <td field-key='action_model'>{{ $user_action->action_model }}</td>
                                <td field-key='action_id'>{{ $user_action->action_id }}</td>
                                
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="internal_notifications">
<table class="table table-bordered table-striped {{ count($internal_notifications) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.internal-notifications.fields.text')</th>
                        <th>@lang('global.internal-notifications.fields.link')</th>
                        <th>@lang('global.internal-notifications.fields.users')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($internal_notifications) > 0)
            @foreach ($internal_notifications as $internal_notification)
                <tr data-entry-id="{{ $internal_notification->id }}">
                    <td field-key='text'>{{ $internal_notification->text }}</td>
                                <td field-key='link'>{{ $internal_notification->link }}</td>
                                <td field-key='users'>
                                    @foreach ($internal_notification->users as $singleUsers)
                                        <span class="label label-info label-many">{{ $singleUsers->name }}</span>
                                    @endforeach
                                </td>
                                                                <td>
                                    @can('internal_notification_view')
                                    <a href="{{ route('admin.internal_notifications.show',[$internal_notification->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('internal_notification_edit')
                                    <a href="{{ route('admin.internal_notifications.edit',[$internal_notification->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('internal_notification_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.internal_notifications.destroy', $internal_notification->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8">@lang('global.app_no_entries_in_table')</td>
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.users.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


