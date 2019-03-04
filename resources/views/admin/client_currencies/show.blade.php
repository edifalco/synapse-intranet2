@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.client-currencies.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.client-currencies.fields.title')</th>
                            <td field-key='title'>{{ $client_currency->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.client-currencies.fields.code')</th>
                            <td field-key='code'>{{ $client_currency->code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.client-currencies.fields.main-currency')</th>
                            <td field-key='main_currency'>{{ Form::checkbox("main_currency", 1, $client_currency->main_currency == 1 ? true : false, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.client_currencies.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


