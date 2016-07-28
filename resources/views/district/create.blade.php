@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
<div class="row">

   <h1 class="text-left"><a href="{{ url('/district') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.DISTRICT_LIST') }} </a></h1>
    <hr/>

    {!! Form::open(['url' => '/district', 'class' => 'form-horizontal']) !!}

		<div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('state_id') ? 'has-error' : ''}}">
                {!! Form::label('state_id',trans('messages.STATE_NAME'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
					{!! Form::select('state_id',\DB::table('states')->where('states.deleted',0)->lists('stateName','id'), "Debugging", ['class' => 'form-control stateSelect','placeholder' => 'Select a state ','id' => 'stateSelect']) !!}
                    {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('messages.NAME_DISTRICT'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'95']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

    <div class=" col-md-12 button-group">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-12 team_btn state-btn">
            {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
    </div>
    </div>
    {!! Form::close() !!}

   
</div>
</div>
@endsection