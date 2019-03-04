@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.user-actions.title')</h3>
    @can('user_action_create')
    <p>
        
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped ajaxTable ">
                <thead>
                    <tr>
                        
                        <th>@lang('global.user-actions.created_at')</th>
                        <th>@lang('global.user-actions.fields.user')</th>
                        <th>@lang('global.user-actions.fields.action')</th>
                        <th>@lang('global.user-actions.fields.action-model')</th>
                        <th>@lang('global.user-actions.fields.action-id')</th>
                        
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
                $(document).ready(function () {
            window.dtDefaultOptions.ajax = '{!! route('admin.user_actions.index') !!}';
            window.dtDefaultOptions.columns = [{data: 'created_at', name: 'created_at'},
                {data: 'user.name', name: 'user.name'},
                {data: 'action', name: 'action'},
                {data: 'action_model', name: 'action_model'},
                {data: 'action_id', name: 'action_id'},
                
                {data: 'actions', name: 'actions', searchable: false, sortable: false}
            ];
            processAjaxTables();
        });
    </script>
@endsection