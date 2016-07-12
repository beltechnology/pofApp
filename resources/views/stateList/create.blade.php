@extends('layouts.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.SELECT_STATE_NAME') }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/statelist') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">{{ trans('messages.STATE_NAME') }}</label>

                            <div class="col-md-6">
                               {!! Form::select('state',\DB::table('states')->where('states.deleted',0)->lists('stateName','id'), "Debugging", ['class' => 'form-control stateSelect','placeholder' => 'Select a State','id' => 'state']) !!}
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
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
       
});
</script>
@endsection
