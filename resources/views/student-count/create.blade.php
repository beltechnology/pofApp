@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New studentCount</h1>
    <hr/>

    {!! Form::open(['url' => '/student-count', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('entityId') ? 'has-error' : ''}}">
                {!! Form::label('entityId', 'Entityid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('entityId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('entityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolId') ? 'has-error' : ''}}">
                {!! Form::label('schoolId', 'Schoolid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('schoolId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('schoolId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classId') ? 'has-error' : ''}}">
                {!! Form::label('classId', 'Classid', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('classId', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('classId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofstudentPMO') ? 'has-error' : ''}}">
                {!! Form::label('noofstudentPMO', 'Noofstudentpmo', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofstudentPMO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofstudentPMO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('noofstudentPSO') ? 'has-error' : ''}}">
                {!! Form::label('noofstudentPSO', 'Noofstudentpso', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('noofstudentPSO', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('noofstudentPSO', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('handicapped') ? 'has-error' : ''}}">
                {!! Form::label('handicapped', 'Handicapped', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('handicapped', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('handicapped', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

   

</div>
@endsection