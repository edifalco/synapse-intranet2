@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invoices.title')</h3>
    @can('invoice_create')
    <p>
        <a href="{{ route('admin.invoices.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.invoices.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('global.app_all')</a></li> |
            <li><a href="{{ route('admin.invoices.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('global.app_trash')</a></li>
        </ul>
    </p>
    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($invoices) > 0 ? 'datatable' : '' }} @can('invoice_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('invoice_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                        <th>@lang('global.invoices.fields.invoice-taxes')</th>
                        <th>@lang('global.invoices.fields.invoice-total')</th>
                        <th>@lang('global.invoices.fields.budget-subtotal')</th>
                        <th>@lang('global.invoices.fields.budget-taxes')</th>
                        <th>@lang('global.invoices.fields.budget-total')</th>
                        <th>@lang('global.invoices.fields.date')</th>
                        <th>@lang('global.invoices.fields.due-date')</th>
                        <th>@lang('global.invoices.fields.pm-approval-date')</th>
                        <th>@lang('global.invoices.fields.finance-approval-date')</th>
                        <th>@lang('global.invoices.fields.expense-type')</th>
                        <th>@lang('global.invoices.fields.meeting')</th>
                        <th>@lang('global.invoices.fields.contingency')</th>
                        <th>@lang('global.invoices.fields.provider')</th>
                        <th>@lang('global.invoices.fields.service-type')</th>
                        <th>@lang('global.invoices.fields.pm')</th>
                        <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.invoices.fields.finance')</th>
                        <th>@lang('global.users.fields.name')</th>
                        <th>@lang('global.invoices.fields.service')</th>
                        <th>@lang('global.invoices.fields.selection-criteria')</th>
                        <th>@lang('global.invoices.fields.user')</th>
                        <th>@lang('global.invoices.fields.project')</th>
                        <th>@lang('global.invoices.fields.created-by')</th>
                        <th>@lang('global.users.fields.name')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($invoices) > 0)
                        @foreach ($invoices as $invoice)
                            <tr data-entry-id="{{ $invoice->id }}">
                                @can('invoice_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                                <td field-key='invoice_taxes'>{{ $invoice->invoice_taxes }}</td>
                                <td field-key='invoice_total'>{{ $invoice->invoice_total }}</td>
                                <td field-key='budget_subtotal'>{{ $invoice->budget_subtotal }}</td>
                                <td field-key='budget_taxes'>{{ $invoice->budget_taxes }}</td>
                                <td field-key='budget_total'>{{ $invoice->budget_total }}</td>
                                <td field-key='date'>{{ $invoice->date }}</td>
                                <td field-key='due_date'>{{ $invoice->due_date }}</td>
                                <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                                <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                                <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                                <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                                <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                                <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                                <td field-key='service_type'>{{ $invoice->service_type->name ?? '' }}</td>
                                <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->pm) ? $invoice->pm->name : '' }}</td>
                                <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->finance) ? $invoice->finance->name : '' }}</td>
                                <td field-key='service'>{{ $invoice->service }}</td>
                                <td field-key='selection_criteria'>{{ $invoice->selection_criteria }}</td>
                                <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                                <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                                <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->created_by) ? $invoice->created_by->name : '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.restore', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.perma_del', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('invoice_view')
                                    <a href="{{ route('admin.invoices.show',[$invoice->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('invoice_edit')
                                    <a href="{{ route('admin.invoices.edit',[$invoice->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('invoice_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.invoices.destroy', $invoice->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="27">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('invoice_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.invoices.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection