@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
    {!! Form::model($firstlevel, [
        'method' => 'PATCH',
        'url' => ['/first-level', $firstlevel->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	
	 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
      <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}"> School Profile </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}"> Book Detail </a></li>
      <li><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}"> No. of students from school </a></li>
      <li><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}"> Payment Mode </a></li>
	  <li><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">Fees</a></li>
	  <li><a href="{{ url('/student/') }}">Student Registration</a></li>
	   <li class="active"><a href="{{ url('/first-level/'.session()->get('entityId').'/edit') }}">First Level Exam Time</a></li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/student/'.$firstlevel->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> Student Registration</a></h1>
      <h1 class="text-center col-md-4">Exam Schedule</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	</div>

			<div class="row create-emp-list">
				<div class="col-md-6">
           
                    {!! Form::hidden('examLevelId',1, ['class' => 'form-control']) !!}
                  
            <div class="form-group {{ $errors->has('reportTime') ? 'has-error' : ''}}">
                {!! Form::label('reportTime', 'Reporting Time', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('reportTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                    {!! $errors->first('reportTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('examStartTime') ? 'has-error' : ''}}">
                {!! Form::label('examStartTime', 'Exam Start Time', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('examStartTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
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
                {!! Form::label('examEndTime', 'Exam End Time', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7 input-group datetime" >
                    {!! Form::text('examEndTime', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                    {!! $errors->first('examEndTime', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		</div>
         </div> 
           


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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
@endsection