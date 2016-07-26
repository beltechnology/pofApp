@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
<div class="row">
	 <h1 class="text-left"><a href="{{ url('/state') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.STATE_LIST') }} </a></h1>
    <hr/>

    {!! Form::model($state, [
        'method' => 'PATCH',
        'url' => ['/state', $state->id],
        'class' => 'form-horizontal'
    ]) !!}
			<div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('messages.STATE_NAME'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('stateName', null, ['class' => 'form-control', 'required' => 'required']) !!}
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