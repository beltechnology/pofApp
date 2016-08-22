@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

    <h1 class="text-center">Change Session Year</h1>
    <hr/>
	<div class="row">
   

    {!! Form::model($sessionyear, [
        'method' => 'POST',
        'url' => ['/changeYear',],
        'class' => 'form-horizontal'
    ]) !!}
		<div class=" col-md-6 col-md-offset-3 create-emp-list">
                <div class="form-group {{ $errors->has('sessionYear') ? 'has-error' : ''}}">
                {!! Form::label('sessionYear',  trans('messages.SESSION_YEAR'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('sessionYear',\DB::table('session_years')->where('session_years.deleted',0)->lists('sessionYear','id'), "Debugging", ['class' => 'form-control sessionYear','placeholder' => 'Select a session Year','id' => 'sessionYear','required'=>'required']) !!}
                    {!! $errors->first('sessionYear', '<p class="help-block">:message</p>') !!}
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
<script>
$(document).ready(function(){
	$("#sessionYear").val({{session()->get('activeSession')}});     
});
</script>
@endsection