@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    <h1>Create New Second Level Exam</h1>
    <hr/>

    {!! Form::open(['url' => '/second-level-exam', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('examType') ? 'has-error' : ''}}">
                {!! Form::label('examType', 'Exam type', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examType', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('examType', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateOfExam') ? 'has-error' : ''}}">
                {!! Form::label('dateOfExam', 'Date of exam', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('dateOfExam', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('dateOfExam', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reportingTime') ? 'has-error' : ''}}">
                {!! Form::label('reportingTime', 'Reporting time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('reportingTime', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('reportingTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examTime') ? 'has-error' : ''}}">
                {!! Form::label('examTime', 'Exam time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examTime', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('examTime', '<p class="help-block">:message</p>') !!}
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