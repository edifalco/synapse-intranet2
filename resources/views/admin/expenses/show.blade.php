@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.expenses.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.expenses.fields.user')</th>
                            <td field-key='user'>{{ $expense->user->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.project')</th>
                            <td field-key='project'>{{ $expense->project->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.expense-type')</th>
                            <td field-key='expense_type'>{{ $expense->expense_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.meeting')</th>
                            <td field-key='meeting'>{{ $expense->meeting->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.contingency')</th>
                            <td field-key='contingency'>{{ $expense->contingency->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.date')</th>
                            <td field-key='date'>{{ $expense->date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.due-date')</th>
                            <td field-key='due_date'>{{ $expense->due_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.invoice-subtotal')</th>
                            <td field-key='invoice_subtotal'>{{ $expense->invoice_subtotal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.invoice-taxes')</th>
                            <td field-key='invoice_taxes'>{{ $expense->invoice_taxes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.invoice-total')</th>
                            <td field-key='invoice_total'>{{ $expense->invoice_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.budget-subtotal')</th>
                            <td field-key='budget_subtotal'>{{ $expense->budget_subtotal }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.budget-taxes')</th>
                            <td field-key='budget_taxes'>{{ $expense->budget_taxes }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.budget-total')</th>
                            <td field-key='budget_total'>{{ $expense->budget_total }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.provider')</th>
                            <td field-key='provider'>{{ $expense->provider->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.service-type')</th>
                            <td field-key='service_type'>{{ $expense->service_type->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.service')</th>
                            <td field-key='service'>{{ $expense->service }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.selection-criteria')</th>
                            <td field-key='selection_criteria'>{{ $expense->selection_criteria }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.pm')</th>
                            <td field-key='pm'>{{ $expense->pm->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.pm-approval-date')</th>
                            <td field-key='pm_approval_date'>{{ $expense->pm_approval_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.finance')</th>
                            <td field-key='finance'>{{ $expense->finance->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.finance-approval-date')</th>
                            <td field-key='finance_approval_date'>{{ $expense->finance_approval_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.files')</th>
                            <td field-key='files's> @foreach($expense->getMedia('files') as $media)
                                <p class="form-group">
                                    <a href="{{ $media->getUrl() }}" target="_blank">{{ $media->name }} ({{ $media->size }} KB)</a>
                                </p>
                            @endforeach</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expenses.fields.created-by')</th>
                            <td field-key='created_by'>{{ $expense->created_by->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.expenses.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
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
