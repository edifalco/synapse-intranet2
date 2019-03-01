@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.messages.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.messages.fields.name')</th>
                            <td field-key='name'>{{ $message->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.messages.fields.email')</th>
                            <td field-key='email'>{{ $message->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.messages.fields.phone')</th>
                            <td field-key='phone'>{{ $message->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.messages.fields.message')</th>
                            <td field-key='message'>{{ $message->message }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.messages.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


