@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.media.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.media.fields.model-type')</th>
                            <td field-key='model_type'>{{ $medium->model_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.model-id')</th>
                            <td field-key='model_id'>{{ $medium->model_id }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.collection-name')</th>
                            <td field-key='collection_name'>{{ $medium->collection_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.name')</th>
                            <td field-key='name'>{{ $medium->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.file-name')</th>
                            <td field-key='file_name'>{{ $medium->file_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.disk')</th>
                            <td field-key='disk'>{{ $medium->disk }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.mime-type')</th>
                            <td field-key='mime_type'>{{ $medium->mime_type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.size')</th>
                            <td field-key='size'>{{ $medium->size }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.manipulations')</th>
                            <td field-key='manipulations'>{{ $medium->manipulations }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.custom-properties')</th>
                            <td field-key='custom_properties'>{{ $medium->custom_properties }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.responsive-images')</th>
                            <td field-key='responsive_images'>{{ $medium->responsive_images }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.media.fields.order-column')</th>
                            <td field-key='order_column'>{{ $medium->order_column }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab">Projects</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="projects">
<table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.projects.fields.name')</th>
                        <th>@lang('global.projects.fields.start-date')</th>
                        <th>@lang('global.projects.fields.end-date')</th>
                        <th>@lang('global.projects.fields.logo')</th>
                        <th>@lang('global.projects.fields.status')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
        </tr>
    </thead>

    <tbody>
        @if (count($projects) > 0)
            @foreach ($projects as $project)
                <tr data-entry-id="{{ $project->id }}">
                    <td field-key='name'>{{ $project->name }}</td>
                                <td field-key='start_date'>{{ $project->start_date }}</td>
                                <td field-key='end_date'>{{ $project->end_date }}</td>
                                <td field-key='logo'>
                                    @foreach ($project->logo as $singleLogo)
                                        <span class="label label-info label-many">{{ $singleLogo->responsive_images }}</span>
                                    @endforeach
                                </td>
                                <td field-key='status'>{{ $project->status->name ?? '' }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.projects.restore', $project->id])) !!}
                                    {!! Form::submit(trans('global.app_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.projects.perma_del', $project->id])) !!}
                                    {!! Form::submit(trans('global.app_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                                                </td>
                                @else
                                <td>
                                    @can('project_view')
                                    <a href="{{ route('admin.projects.show',[$project->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('project_edit')
                                    <a href="{{ route('admin.projects.edit',[$project->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('project_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.projects.destroy', $project->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.media.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop


