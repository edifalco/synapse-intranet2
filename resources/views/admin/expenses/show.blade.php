@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.expense.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.expense.fields.expense-category')</th>
                            <td field-key='expense_category'>{{ $expense->expense_category->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expense.fields.entry-date')</th>
                            <td field-key='entry_date'>{{ $expense->entry_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.expense.fields.amount')</th>
                            <td field-key='amount'>{{ $expense->amount }}</td>
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
            
        });
    </script>
            
@stop
