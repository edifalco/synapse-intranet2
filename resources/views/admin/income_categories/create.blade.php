@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.income-category.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.income_categories.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

