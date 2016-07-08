@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit schoole {{ $schoole->id }}</h1>

    {!! Form::model($schoole, [
        'method' => 'PATCH',
        'url' => ['/schooles', $schoole->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('session') ? 'has-error' : ''}}">
                {!! Form::label('session', 'Session', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('session', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('session', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('distributionDate') ? 'has-error' : ''}}">
                {!! Form::label('distributionDate', 'Distributiondate', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('distributionDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('distributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('clossingDate') ? 'has-error' : ''}}">
                {!! Form::label('clossingDate', 'Clossingdate', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('clossingDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('clossingDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('formNo') ? 'has-error' : ''}}">
                {!! Form::label('formNo', 'Formno', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('formNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('formNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolCode') ? 'has-error' : ''}}">
                {!! Form::label('schoolCode', 'Schoolcode', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('schoolCode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('uniqueSchoolCode') ? 'has-error' : ''}}">
                {!! Form::label('uniqueSchoolCode', 'Uniqueschoolcode', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('uniqueSchoolCode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('uniqueSchoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamcode') ? 'has-error' : ''}}">
                {!! Form::label('teamcode', 'Teamcode', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamcode', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamcode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeNo') ? 'has-error' : ''}}">
                {!! Form::label('employeeNo', 'Employeeno', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('employeeNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('employeeNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeConNo') ? 'has-error' : ''}}">
                {!! Form::label('employeeConNo', 'Employeeconno', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('employeeConNo', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('employeeConNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('principalName') ? 'has-error' : ''}}">
                {!! Form::label('principalName', 'Principalname', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('principalName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pmo_psoIncharge') ? 'has-error' : ''}}">
                {!! Form::label('pmo_psoIncharge', 'Pmo Psoincharge', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pmo_psoIncharge', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pmo_psoIncharge', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pmoExmDate') ? 'has-error' : ''}}">
                {!! Form::label('pmoExmDate', 'Pmoexmdate', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pmoExmDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pmoExmDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('psoExmDate') ? 'has-error' : ''}}">
                {!! Form::label('psoExmDate', 'Psoexmdate', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('psoExmDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('psoExmDate', '<p class="help-block">:message</p>') !!}
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