@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Edit Team {{ $team->teamId }}</h1>
<div class="row">
    {!! Form::model($team, [
        'method' => 'PATCH',
        'url' => ['/team', $team->teamId],
        'class' => 'form-horizontal'
    ]) !!}
        <div class=" col-md-6">
               
            <div class="form-group {{ $errors->has('teamName') ? 'has-error' : ''}}">
                {!! Form::label('teamName', 'Team Name', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamLeader') ? 'has-error' : ''}}">
                {!! Form::label('teamLeader', 'Team Leader', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                   {!! Form::select('team',\DB::table('teams')->lists('teamLeader','teamId'), "Debugging", ['class' => 'form-control teamSelect','placeholder' => 'Select Team Leader','id' => 'teamSelect']) !!}
                    {!! $errors->first('teamLeader', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamEndDate') ? 'has-error' : ''}}">
                {!! Form::label('teamEndDate', 'Team End Date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6 input-group date">
                    {!! Form::text('teamEndDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamEndDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		</div>	
		<div class="col-md-6">
           
		     <div class="form-group {{ $errors->has('teamLocation') ? 'has-error' : ''}}">
                {!! Form::label('teamLocation', 'Team Location', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamLocation', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamLocation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamCreationDate') ? 'has-error' : ''}}">
                {!! Form::label('teamCreationDate', 'Team Creation Date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6 input-group date">
                    {!! Form::text('teamCreationDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamCreationDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamcode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', 'Team Code', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('teamCode', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
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
</div>
@endsection