@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.media.title')</h3>
    @can('medium_create')
    <p>
        <a href="{{ route('admin.media.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($media) > 0 ? 'datatable' : '' }} @can('medium_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('medium_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('global.media.fields.model-type')</th>
                        <th>@lang('global.media.fields.model-id')</th>
                        <th>@lang('global.media.fields.collection-name')</th>
                        <th>@lang('global.media.fields.name')</th>
                        <th>@lang('global.media.fields.file-name')</th>
                        <th>@lang('global.media.fields.disk')</th>
                        <th>@lang('global.media.fields.mime-type')</th>
                        <th>@lang('global.media.fields.size')</th>
                        <th>@lang('global.media.fields.manipulations')</th>
                        <th>@lang('global.media.fields.custom-properties')</th>
                        <th>@lang('global.media.fields.responsive-images')</th>
                        <th>@lang('global.media.fields.order-column')</th>
                                                <th>&nbsp;</th>

                    </tr>
                </thead>
                
                <tbody>
                    @if (count($media) > 0)
                        @foreach ($media as $medium)
                            <tr data-entry-id="{{ $medium->id }}">
                                @can('medium_delete')
                                    <td></td>
                                @endcan

                                <td field-key='model_type'>{{ $medium->model_type }}</td>
                                <td field-key='model_id'>{{ $medium->model_id }}</td>
                                <td field-key='collection_name'>{{ $medium->collection_name }}</td>
                                <td field-key='name'>{{ $medium->name }}</td>
                                <td field-key='file_name'>{{ $medium->file_name }}</td>
                                <td field-key='disk'>{{ $medium->disk }}</td>
                                <td field-key='mime_type'>{{ $medium->mime_type }}</td>
                                <td field-key='size'>{{ $medium->size }}</td>
                                <td field-key='manipulations'>{{ $medium->manipulations }}</td>
                                <td field-key='custom_properties'>{{ $medium->custom_properties }}</td>
                                <td field-key='responsive_images'>{{ $medium->responsive_images }}</td>
                                <td field-key='order_column'>{{ $medium->order_column }}</td>
                                                                <td>
                                    @can('medium_view')
                                    <a href="{{ route('admin.media.show',[$medium->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan
                                    @can('medium_edit')
                                    <a href="{{ route('admin.media.edit',[$medium->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('medium_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.media.destroy', $medium->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="17">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('medium_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.media.mass_destroy') }}';
        @endcan

    </script>
@endsection