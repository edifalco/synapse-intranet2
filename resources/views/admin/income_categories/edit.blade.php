@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.income-category.title')</h3>
    
    {!! Form::model($income_category, ['method' => 'PUT', 'route' => ['admin.income_categories.update', $income_category->id]]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_edit')
        </div>

        <div class="panel-body">
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

