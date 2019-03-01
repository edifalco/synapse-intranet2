@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.categories.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.categories.fields.name')</th>
                            <td field-key='name'>{{ $category->name }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#budgets" aria-controls="budgets" role="tab" data-toggle="tab">Budgets</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="budgets">
<table class="table table-bordered table-striped {{ count($budgets) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.budgets.fields.amount')</th>
                        <th>@lang('global.budgets.fields.project')</th>
                        <th>@lang('global.budgets.fields.category')</th>
                        <th>@lang('global.budgets.fields.year')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($budgets) > 0)
            @foreach ($budgets as $budget)
                <tr data-entry-id="{{ $budget->id }}">
                    <td field-key='amount'>{{ $budget->amount }}</td>
                                <td field-key='project'>{{ $budget->project->name ?? '' }}</td>
                                <td field-key='category'>{{ $budget->category->name ?? '' }}</td>
                                <td field-key='year'>{{ $budget->year->name ?? '' }}</td>
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
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


