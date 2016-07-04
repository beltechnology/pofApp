@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Create New Team</h1>
    <hr/>

    {!! Form::open(['url' => '/team', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('teamId') ? 'has-error' : ''}}">
                {!! Form::label('teamId', 'Team Id ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamId', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamName') ? 'has-error' : ''}}">
                {!! Form::label('teamName', 'Team Name ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamLocation') ? 'has-error' : ''}}">
                {!! Form::label('teamLocation', 'Team Location', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamLocation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamLocation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamLeader') ? 'has-error' : ''}}">
                {!! Form::label('teamLeader', 'Team Leader', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamLeader', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamLeader', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamCreationDate') ? 'has-error' : ''}}">
                {!! Form::label('teamCreationDate', 'Team Creation Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamCreationDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamCreationDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamEndDate') ? 'has-error' : ''}}">
                {!! Form::label('teamEndDate', 'Team End Date', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamEndDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamEndDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', 'Team Code', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamCode', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
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