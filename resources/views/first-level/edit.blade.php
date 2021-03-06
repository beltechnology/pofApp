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
	@foreach ($articles as $article)
		@if($article->moduleType == trans('messages.TWO'))	
			@if($article->muduleLink === "/first-level")
				<li  class="active"><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }}</a></li>
			@elseif($article->muduleLink === "/student")
				<li><a  href="{{ url($article->muduleLink) }}">{{ $article->name }} </a></li>
			@else
				<li><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }} </a></li>
			@endif
		@endif
    @endforeach
    </ul>
  </div>
</nav>
 <div class="h1-two edit-school-border col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/student') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></h1>
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
                    {!! Form::text('reportTime', null, ['class' => 'form-control','required'=>'required','maxlength'=>'8']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time watch"></span>
                    </span>
                    {!! $errors->first('reportTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examStartTime') ? 'has-error' : ''}}">
                {!! Form::label('examStartTime', trans('messages.EXAM_START_TIME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('examStartTime', null, ['class' => 'form-control','required'=>'required','maxlength'=>'8']) !!}
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
                    {!! Form::text('examEndTime', null, ['class' => 'form-control','required'=>'required','maxlength'=>'8']) !!}
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

   

</div>
@endsection