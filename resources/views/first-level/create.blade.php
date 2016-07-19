@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New firstLevel</h1>
    <hr/>

    {!! Form::open(['url' => '/first-level', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('entityId') ? 'has-error' : ''}}">
                {!! Form::label('entityId', 'Entityid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('entityId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('entityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolId') ? 'has-error' : ''}}">
                {!! Form::label('schoolId', 'Schoolid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('schoolId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('schoolId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('sessionYear') ? 'has-error' : ''}}">
                {!! Form::label('sessionYear', 'Sessionyear', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('sessionYear', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('sessionYear', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examLevelId') ? 'has-error' : ''}}">
                {!! Form::label('examLevelId', 'Examlevelid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examLevelId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('examLevelId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reportTime') ? 'has-error' : ''}}">
                {!! Form::label('reportTime', 'Reporttime', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reportTime', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('reportTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examStartTime') ? 'has-error' : ''}}">
                {!! Form::label('examStartTime', 'Examstarttime', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examStartTime', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('examStartTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examEndTime') ? 'has-error' : ''}}">
                {!! Form::label('examEndTime', 'Examendtime', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examEndTime', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('examEndTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('deleted') ? 'has-error' : ''}}">
                {!! Form::label('deleted', 'Deleted', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('deleted', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('deleted', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
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