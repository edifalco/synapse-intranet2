@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.client-income-sources.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.client-income-sources.fields.title')</th>
                            <td field-key='title'>{{ $client_income_source->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.client-income-sources.fields.fee-percent')</th>
                            <td field-key='fee_percent'>{{ $client_income_source->fee_percent }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.client_income_sources.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


