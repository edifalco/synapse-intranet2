@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.clients.fields.first-name')</th>
                            <td field-key='first_name'>{{ $client->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.last-name')</th>
                            <td field-key='last_name'>{{ $client->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.company-name')</th>
                            <td field-key='company_name'>{{ $client->company_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.email')</th>
                            <td field-key='email'>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.phone')</th>
                            <td field-key='phone'>{{ $client->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.website')</th>
                            <td field-key='website'>{{ $client->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.skype')</th>
                            <td field-key='skype'>{{ $client->skype }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.country')</th>
                            <td field-key='country'>{{ $client->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.clients.fields.client-status')</th>
                            <td field-key='client_status'>{{ $client->client_status->title ?? '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


