@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">

    <h1>Create New questionSet</h1>
    <hr/>

    {!! Form::open(['url' => '/question-sets', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('setName') ? 'has-error' : ''}}">
                {!! Form::label('setName', 'Setname', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('setName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('setName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sessionId') ? 'has-error' : ''}}">
                {!! Form::label('sessionId', 'Sessionid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('sessionId', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('sessionId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('stream') ? 'has-error' : ''}}">
                {!! Form::label('stream', 'Stream', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('stream', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('stream', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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