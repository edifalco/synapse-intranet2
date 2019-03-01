@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.media.title')</h3>
    
    {!! Form::model($medium, ['method' => 'PUT', 'route' => ['admin.media.update', $medium->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('model_type', trans('global.media.fields.model-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('model_type', old('model_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('model_type'))
                        <p class="help-block">
                            {{ $errors->first('model_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('model_id', trans('global.media.fields.model-id').'', ['class' => 'control-label']) !!}
                    {!! Form::number('model_id', old('model_id'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('model_id'))
                        <p class="help-block">
                            {{ $errors->first('model_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('collection_name', trans('global.media.fields.collection-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('collection_name', old('collection_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('collection_name'))
                        <p class="help-block">
                            {{ $errors->first('collection_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.media.fields.name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('file_name', trans('global.media.fields.file-name').'', ['class' => 'control-label']) !!}
                    {!! Form::text('file_name', old('file_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('file_name'))
                        <p class="help-block">
                            {{ $errors->first('file_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('disk', trans('global.media.fields.disk').'', ['class' => 'control-label']) !!}
                    {!! Form::text('disk', old('disk'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('disk'))
                        <p class="help-block">
                            {{ $errors->first('disk') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('mime_type', trans('global.media.fields.mime-type').'', ['class' => 'control-label']) !!}
                    {!! Form::text('mime_type', old('mime_type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('mime_type'))
                        <p class="help-block">
                            {{ $errors->first('mime_type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('size', trans('global.media.fields.size').'', ['class' => 'control-label']) !!}
                    {!! Form::number('size', old('size'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('size'))
                        <p class="help-block">
                            {{ $errors->first('size') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('manipulations', trans('global.media.fields.manipulations').'', ['class' => 'control-label']) !!}
                    {!! Form::text('manipulations', old('manipulations'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('manipulations'))
                        <p class="help-block">
                            {{ $errors->first('manipulations') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('custom_properties', trans('global.media.fields.custom-properties').'', ['class' => 'control-label']) !!}
                    {!! Form::text('custom_properties', old('custom_properties'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('custom_properties'))
                        <p class="help-block">
                            {{ $errors->first('custom_properties') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('responsive_images', trans('global.media.fields.responsive-images').'', ['class' => 'control-label']) !!}
                    {!! Form::text('responsive_images', old('responsive_images'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('responsive_images'))
                        <p class="help-block">
                            {{ $errors->first('responsive_images') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('order_column', trans('global.media.fields.order-column').'', ['class' => 'control-label']) !!}
                    {!! Form::number('order_column', old('order_column'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('order_column'))
                        <p class="help-block">
                            {{ $errors->first('order_column') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

