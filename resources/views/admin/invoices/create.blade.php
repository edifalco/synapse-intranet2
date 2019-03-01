@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.invoices.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.invoices.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('invoice_subtotal', trans('global.invoices.fields.invoice-subtotal').'', ['class' => 'control-label']) !!}
                    {!! Form::text('invoice_subtotal', old('invoice_subtotal'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('invoice_subtotal'))
                        <p class="help-block">
                            {{ $errors->first('invoice_subtotal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('invoice_taxes', trans('global.invoices.fields.invoice-taxes').'', ['class' => 'control-label']) !!}
                    {!! Form::text('invoice_taxes', old('invoice_taxes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('invoice_taxes'))
                        <p class="help-block">
                            {{ $errors->first('invoice_taxes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('invoice_total', trans('global.invoices.fields.invoice-total').'', ['class' => 'control-label']) !!}
                    {!! Form::text('invoice_total', old('invoice_total'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('invoice_total'))
                        <p class="help-block">
                            {{ $errors->first('invoice_total') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('budget_subtotal', trans('global.invoices.fields.budget-subtotal').'', ['class' => 'control-label']) !!}
                    {!! Form::text('budget_subtotal', old('budget_subtotal'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('budget_subtotal'))
                        <p class="help-block">
                            {{ $errors->first('budget_subtotal') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('budget_taxes', trans('global.invoices.fields.budget-taxes').'', ['class' => 'control-label']) !!}
                    {!! Form::text('budget_taxes', old('budget_taxes'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('budget_taxes'))
                        <p class="help-block">
                            {{ $errors->first('budget_taxes') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('budget_total', trans('global.invoices.fields.budget-total').'', ['class' => 'control-label']) !!}
                    {!! Form::text('budget_total', old('budget_total'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('budget_total'))
                        <p class="help-block">
                            {{ $errors->first('budget_total') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('date', trans('global.invoices.fields.date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('date', old('date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('date'))
                        <p class="help-block">
                            {{ $errors->first('date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('due_date', trans('global.invoices.fields.due-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('due_date', old('due_date'), ['class' => 'form-control date', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('due_date'))
                        <p class="help-block">
                            {{ $errors->first('due_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pm_approval_date', trans('global.invoices.fields.pm-approval-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('pm_approval_date', old('pm_approval_date'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pm_approval_date'))
                        <p class="help-block">
                            {{ $errors->first('pm_approval_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finance_approval_date', trans('global.invoices.fields.finance-approval-date').'', ['class' => 'control-label']) !!}
                    {!! Form::text('finance_approval_date', old('finance_approval_date'), ['class' => 'form-control timepicker', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finance_approval_date'))
                        <p class="help-block">
                            {{ $errors->first('finance_approval_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('expense_type_id', trans('global.invoices.fields.expense-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('expense_type_id', $expense_types, old('expense_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('expense_type_id'))
                        <p class="help-block">
                            {{ $errors->first('expense_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('meeting_id', trans('global.invoices.fields.meeting').'', ['class' => 'control-label']) !!}
                    {!! Form::select('meeting_id', $meetings, old('meeting_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('meeting_id'))
                        <p class="help-block">
                            {{ $errors->first('meeting_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contingency_id', trans('global.invoices.fields.contingency').'', ['class' => 'control-label']) !!}
                    {!! Form::select('contingency_id', $contingencies, old('contingency_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contingency_id'))
                        <p class="help-block">
                            {{ $errors->first('contingency_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('provider_id', trans('global.invoices.fields.provider').'', ['class' => 'control-label']) !!}
                    {!! Form::select('provider_id', $providers, old('provider_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('provider_id'))
                        <p class="help-block">
                            {{ $errors->first('provider_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('service_type_id', trans('global.invoices.fields.service-type').'', ['class' => 'control-label']) !!}
                    {!! Form::select('service_type_id', $service_types, old('service_type_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('service_type_id'))
                        <p class="help-block">
                            {{ $errors->first('service_type_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('pm_id', trans('global.invoices.fields.pm').'', ['class' => 'control-label']) !!}
                    {!! Form::select('pm_id', $pms, old('pm_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('pm_id'))
                        <p class="help-block">
                            {{ $errors->first('pm_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('finance_id', trans('global.invoices.fields.finance').'', ['class' => 'control-label']) !!}
                    {!! Form::select('finance_id', $finances, old('finance_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('finance_id'))
                        <p class="help-block">
                            {{ $errors->first('finance_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('service', trans('global.invoices.fields.service').'', ['class' => 'control-label']) !!}
                    {!! Form::text('service', old('service'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('service'))
                        <p class="help-block">
                            {{ $errors->first('service') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('selection_criteria', trans('global.invoices.fields.selection-criteria').'', ['class' => 'control-label']) !!}
                    {!! Form::text('selection_criteria', old('selection_criteria'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('selection_criteria'))
                        <p class="help-block">
                            {{ $errors->first('selection_criteria') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_id', trans('global.invoices.fields.user').'', ['class' => 'control-label']) !!}
                    {!! Form::select('user_id', $users, old('user_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('user_id'))
                        <p class="help-block">
                            {{ $errors->first('user_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('project_id', trans('global.invoices.fields.project').'', ['class' => 'control-label']) !!}
                    {!! Form::select('project_id', $projects, old('project_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('project_id'))
                        <p class="help-block">
                            {{ $errors->first('project_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('created_by_id', trans('global.invoices.fields.created-by').'', ['class' => 'control-label']) !!}
                    {!! Form::select('created_by_id', $created_bies, old('created_by_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('created_by_id'))
                        <p class="help-block">
                            {{ $errors->first('created_by_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
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