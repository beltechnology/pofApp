@extends('layouts.header')
@section('content')
<div class=" col-md-9 category">
<div class="row">

   <h1 class="text-left"><a href="{{ url('/district') }}">{{ trans('messages.DISTRICT_LIST') }} </a></h1>
    <hr/>

    {!! Form::open(['url' => '/district', 'class' => 'form-horizontal']) !!}

		<div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('state_id') ? 'has-error' : ''}}">
                {!! Form::label('state_id',trans('messages.STATE_ID'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
					{!! Form::select('state_id',\DB::table('states')->lists('name','id'), "Debugging", ['class' => 'form-control stateSelect','placeholder' => 'Select State Id','id' => 'stateSelect']) !!}
                    {!! $errors->first('state_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('messages.NAME_DISTRICT'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>

   <div class=" col-md-12 button-group">
    <div class="form-group" style="float:left ;padding-left:100px">
        <div class="col-sm-offset-3 col-sm-12 ">
            {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
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