@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit student {{ $student->id }}</h1>

    {!! Form::model($student, [
        'method' => 'PATCH',
        'url' => ['/student', $student->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('studentName') ? 'has-error' : ''}}">
                {!! Form::label('studentName', 'Studentname', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('studentName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('studentName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fatherName') ? 'has-error' : ''}}">
                {!! Form::label('fatherName', 'Fathername', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('fatherName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fatherName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', 'Dob', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('dob', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('class') ? 'has-error' : ''}}">
                {!! Form::label('class', 'Class', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('class', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('class', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
                {!! Form::label('section', 'Section', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('section', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pmo') ? 'has-error' : ''}}">
                {!! Form::label('pmo', 'Pmo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pmo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pmo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pso') ? 'has-error' : ''}}">
                {!! Form::label('pso', 'Pso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pso', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pso', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('handicapped') ? 'has-error' : ''}}">
                {!! Form::label('handicapped', 'Handicapped', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('handicapped', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('handicapped', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rollNo') ? 'has-error' : ''}}">
                {!! Form::label('rollNo', 'Rollno', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('rollNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('rollNo', '<p class="help-block">:message</p>') !!}
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