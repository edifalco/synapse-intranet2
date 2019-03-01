@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.budgets.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.budgets.fields.amount')</th>
                            <td field-key='amount'>{{ $budget->amount }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.budgets.fields.projects')</th>
                            <td field-key='projects'>{{ $budget->projects->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.budgets.fields.category')</th>
                            <td field-key='category'>{{ $budget->category->name ?? '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.budgets.fields.year')</th>
                            <td field-key='year'>{{ $budget->year->name ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.budgets.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


