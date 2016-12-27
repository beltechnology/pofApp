@extends('layouts.header')
@section('content')
<div class=" col-md-10 category create-emp-list">

    <h1>Edit Second Level Exam Time </h1>

    {!! Form::model($secondlevelexam, [
        'method' => 'PATCH',
        'url' => ['/second-level-exam', $secondlevelexam->id],
        'class' => 'form-horizontal'
    ]) !!}
                <div class="form-group {{ $errors->has('examType') ? 'has-error' : ''}}">
                {!! Form::label('examType', 'Exam type', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('examType', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
                    {!! $errors->first('examType', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateOfExam') ? 'has-error' : ''}}">
                {!! Form::label('dateOfExam', 'Date of exam', ['class' => 'col-sm-3 control-label']) !!}
               <div class="col-sm-6 input-group date">
                    {!! Form::text('dateOfExam', null, ['class' => 'form-control', 'required' => 'required' , 'readonly' => 'readonly']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('dateOfExam', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('reportingTime') ? 'has-error' : ''}}">
                {!! Form::label('reportingTime', 'Reporting time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6 input-group datetime">
                    {!! Form::text('reportingTime', null, ['class' => 'form-control', 'required' => 'required' , 'readonly' => 'readonly']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('reportingTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examTime') ? 'has-error' : ''}}">
                {!! Form::label('examTime', 'Exam time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6 input-group datetime">
                    {!! Form::text('examTime', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('examTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('tillTime') ? 'has-error' : ''}}">
                {!! Form::label('tillTime', 'Till Time', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6 input-group datetime">
                    {!! Form::text('tillTime', null, ['class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('tillTime', '<p class="help-block">:message</p>') !!}
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