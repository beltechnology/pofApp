@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

   <h1 class="text-left"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_LIST') }} </a></h1>
    <hr/>
<div class="row">

    {!! Form::open(['url' => '/team', 'class' => 'form-horizontal']) !!}
        <div class=" col-md-6 create-emp-list">
                
            <div class="form-group {{ $errors->has('teamName') ? 'has-error' : ''}}">
                {!! Form::label('teamName', 'Team Name ', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('teamName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('teamLeader') ? 'has-error' : ''}}">
                {!! Form::label('teamLeader', 'Team Leader', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('teamLeader',$employee,null, ['class' => 'form-control teamSelect','placeholder' => 'Select Team Leader','id' => 'teamSelect']) !!}
                    {!! $errors->first('teamLeader', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamEndDate') ? 'has-error' : ''}}">
                {!! Form::label('teamEndDate', 'Team End Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('teamEndDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamEndDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>   
            
	</div>
	<div class=" col-md-6 create-emp-list">
	<div class="form-group {{ $errors->has('teamLocation') ? 'has-error' : ''}}">
                {!! Form::label('teamLocation', 'Team Location', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                   {!! Form::select('teamLocation',\DB::table('locations')->where('locations.state_id',session()->get('currentStateId'))->where('locations.deleted',0)->lists('location','id'), "Debugging", ['class' => ' form-control teamSelect','placeholder' => 'Select location','id' => 'teamLocation']) !!}
                    {!! $errors->first('teamLocation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
		   <div class="form-group {{ $errors->has('teamCreationDate') ? 'has-error' : ''}}">
                {!! Form::label('teamCreationDate', 'Team Creation Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('teamCreationDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamCreationDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::hidden('teamCode', 'Team Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 ">
                    {!! Form::hidden('teamCode', \DB::table('teams')->max('teamId')+1,null,['class' => 'form-control']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
	<div class=" col-md-12 button-group">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-12 ">
            {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
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