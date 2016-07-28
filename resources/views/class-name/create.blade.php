@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

   <h1 class="text-left"><a href="{{ url('/class-name') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.CLASS_LIST') }} </a></h1>
    <hr/>
	<div class="row">
   

    {!! Form::open(['url' => '/class-name', 'class' => 'form-horizontal']) !!}
		<div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name',  trans('messages.NAME_CLASS'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required','maxlength'=>'95']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
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

   
</div>
</div>
@endsection