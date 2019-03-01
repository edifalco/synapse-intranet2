@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invoices.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.invoices.fields.invoice-subtotal')</th>
                            <td field-key='invoice_subtotal'>{{ $invoice->invoice_subtotal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.invoice-taxes')</th>
                            <td field-key='invoice_taxes'>{{ $invoice->invoice_taxes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.invoice-total')</th>
                            <td field-key='invoice_total'>{{ $invoice->invoice_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.budget-subtotal')</th>
                            <td field-key='budget_subtotal'>{{ $invoice->budget_subtotal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.budget-taxes')</th>
                            <td field-key='budget_taxes'>{{ $invoice->budget_taxes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.budget-total')</th>
                            <td field-key='budget_total'>{{ $invoice->budget_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.date')</th>
                            <td field-key='date'>{{ $invoice->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.due-date')</th>
                            <td field-key='due_date'>{{ $invoice->due_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.pm-approval-date')</th>
                            <td field-key='pm_approval_date'>{{ $invoice->pm_approval_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.finance-approval-date')</th>
                            <td field-key='finance_approval_date'>{{ $invoice->finance_approval_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.expense-type')</th>
                            <td field-key='expense_type'>{{ $invoice->expense_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.meeting')</th>
                            <td field-key='meeting'>{{ $invoice->meeting->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.contingency')</th>
                            <td field-key='contingency'>{{ $invoice->contingency->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.provider')</th>
                            <td field-key='provider'>{{ $invoice->provider->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.service-type')</th>
                            <td field-key='service_type'>{{ $invoice->service_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.pm')</th>
                            <td field-key='pm'>{{ $invoice->pm->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->pm) ? $invoice->pm->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.finance')</th>
                            <td field-key='finance'>{{ $invoice->finance->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->finance) ? $invoice->finance->name : '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.service')</th>
                            <td field-key='service'>{{ $invoice->service }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.selection-criteria')</th>
                            <td field-key='selection_criteria'>{{ $invoice->selection_criteria }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.user')</th>
                            <td field-key='user'>{{ $invoice->user->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.project')</th>
                            <td field-key='project'>{{ $invoice->project->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.invoices.fields.created-by')</th>
                            <td field-key='created_by'>{{ $invoice->created_by->name ?? '' }}</td>
<td field-key='name'>{{ isset($invoice->created_by) ? $invoice->created_by->name : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.invoices.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
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
            
            $('.timepicker').datetimepicker({
                format: "{{ config('app.time_format_moment') }}",
            });
            
        });
    </script>
            
@stop
