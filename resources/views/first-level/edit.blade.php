@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
    {!! Form::model($firstlevel, [
        'method' => 'PATCH',
        'url' => ['/first-level', $firstlevel->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	
	 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
       <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_SCHOOL_PROFILE') }} </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}"> {{ trans('messages.TABS_BOOK_DETAIL') }}</a></li>
      <li><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_NO_OF_STUDENTS_FROM_SCHOOL') }}</a></li>
      <li><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_PAYMENT_MODE') }}</a></li>
	  <li><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FEES') }}</a></li>
	  <li><a href="{{ url('/student/') }}">{{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></li>
	  <li class="active"><a href="{{ url('/first-level/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FIRST_LEVEL_EXAM_TIME') }}</a></li>
    </ul>
  </div>
</nav>
 <div class="h1-two edit-school-border col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/student/'.$firstlevel->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></h1>
      <h1 class="text-center col-md-4"> {{ trans('messages.EXAM_SCHEDULE') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	</div>
	<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
			<div class="row create-emp-list">
			{!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
				<div class="col-md-6">
           
                    {!! Form::hidden('examLevelId',1, ['class' => 'form-control']) !!}
                  
            <div class="form-group {{ $errors->has('reportTime') ? 'has-error' : ''}}">
                {!! Form::label('reportTime', trans('messages.REPORTING_TIME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('reportTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('reportTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examStartTime') ? 'has-error' : ''}}">
                {!! Form::label('examStartTime', trans('messages.EXAM_START_TIME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('examStartTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('examStartTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			</div>	
		<div class="col-md-6">
		 <div class="form-group {{ $errors->has('examEndTime') ? 'has-error' : ''}}"> 
                <div class="col-sm-6"></div>
            </div>
			 <div class="form-group {{ $errors->has('examEndTime') ? 'has-error' : ''}}"> 
                <div class="col-sm-6"></div>
            </div>
			 <div class="form-group {{ $errors->has('examEndTime') ? 'has-error' : ''}}"> 
                <div class="col-sm-6"></div>
            </div>
            <div class="form-group {{ $errors->has('examEndTime') ? 'has-error' : ''}}">
                {!! Form::label('examEndTime', trans('messages.EXAM_END_TIME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('examEndTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('examEndTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		</div>
        
		<div class=" col-md-12 button-group">
    <div class="form-group">
        <div class=" team_btn small-form-btn">
             {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
	</div>

		</div> 
		
    <!--<div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>-->
	
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