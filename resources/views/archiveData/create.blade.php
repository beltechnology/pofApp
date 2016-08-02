@extends('layouts.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Session year</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/archiveData') }}">
                        {{ csrf_field() }}
	
                        <div class="form-group{{ $errors->has('sessionYear') ? ' has-error' : '' }}">
                            <label for="sessionYear" class="col-md-4 control-label">Session year</label>

                            <div class="col-md-6">
                               {!! Form::select('sessionYear',\DB::table('session_years')->where('session_years.deleted',0)->lists('sessionYear','id'), "Debugging", ['class' => 'form-control sessionYear','placeholder' => 'Select a Session Year','id' => 'sessionYear','required'=>'required']) !!}
                                @if ($errors->has('sessionYear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sessionYear') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> {{ trans('messages.SUBMIT_BTN') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
	$(".main-menu").remove(); 
	$("#sessionYear").val({{session()->get('activeSession')}});     
});
</script>
@endsection
