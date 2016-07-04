@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Edit City {{ $city->id }}</h1>

    {!! Form::model($city, [
        'method' => 'PATCH',
        'url' => ['/citys', $city->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('state_id') ? 'has-error' : ''}}">
                {!! Form::label('state_id', 'State Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('state_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
                {!! Form::label('district_id', 'District Id', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('district_id', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cityName') ? 'has-error' : ''}}">
                {!! Form::label('cityName', 'Cityname', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('cityName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('cityName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cityDelete') ? 'has-error' : ''}}">
                {!! Form::label('cityDelete', 'Citydelete', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('cityDelete', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cityDelete', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cityStatus') ? 'has-error' : ''}}">
                {!! Form::label('cityStatus', 'Citystatus', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('cityStatus', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cityStatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection