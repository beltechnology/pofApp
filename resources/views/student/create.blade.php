@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
<div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
      <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}"> School Profile </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}"> Book Detail </a></li>
      <li ><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}"> No. of students from school </a></li>
      <li><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}"> Payment Mode </a></li>
	  <li><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">Fees</a></li>
	  <li class="active"><a href="{{ url('/student/'.session()->get('entityId').'/edit') }}">Student Registration</a></li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/student/') }}" class="fa fa-angle-left  fa-2x"> Student List</a></h1>
      <h1 class="text-center col-md-4"></h1> 
  </div>
	</div>
    {!! Form::open(['url' => '/student', 'class' => 'form-horizontal']) !!}
	
     {!! Form::hidden('entityId',\DB::table('entitys')->max('entityId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'entityId']) !!}
	  {!! Form::select('schoolId',$schoolId,null,['class' => 'form-control','style'=>'display:none','required' => 'required'],['name'=>'schoolId']) !!}

	<div class="row create-emp-list">
	<div class="col-md-6">
                <div class="form-group {{ $errors->has('studentName') ? 'has-error' : ''}}">
                {!! Form::label('studentName', 'Studentname', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('studentName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('studentName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fatherName') ? 'has-error' : ''}}">
                {!! Form::label('fatherName', 'Fathername', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('fatherName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('fatherName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', 'Dob', ['class' => 'col-sm-4 control-label']) !!}
				<div class="col-sm-8   input-group date">
                    {!! Form::text('dob', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classId') ? 'has-error' : ''}}">
                {!! Form::label('classId', 'Class', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('classId',$classes,null,['placeholder'=>'Select Class','class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('classId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('section') ? 'has-error' : ''}}">
                {!! Form::label('section', 'Section', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('section',['1'=>'A','2'=>'B','3'=>'C'],null,['class' => 'form-control', 'required' => 'required','placeholder'=>'Select Section']) !!}
                    {!! $errors->first('section', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		</div>
			<div class="col-md-6">
            <div class="form-group {{ $errors->has('pmo') ? 'has-error' : ''}}">
                {!! Form::label('pmo', 'Pmo', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::radio('pmo',1,['class' => 'form-control']) !!} Yes
					 {!! Form::radio('pmo',0,['class' => 'form-control']) !!} No
                    {!! $errors->first('pmo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pso') ? 'has-error' : ''}}">
                {!! Form::label('pso', 'Pso', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::radio('pso',1,['class' => 'form-control']) !!} Yes
					 {!! Form::radio('pso',0,['class' => 'form-control']) !!} No
                    {!! $errors->first('pso', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('handicapped') ? 'has-error' : ''}}">
                {!! Form::label('handicapped', 'Handicapped', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                     {!! Form::radio('handicapped',1,['class' => 'form-control']) !!} Yes
					 {!! Form::radio('handicapped',0,['class' => 'form-control']) !!} No
                    {!! $errors->first('handicapped', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rollNo') ? 'has-error' : ''}}">
                {!! Form::label('rollNo', 'Rollno', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('rollNo',$rollNo, ['class' => 'form-control','readonly'=>'readonly']) !!}
                    {!! $errors->first('rollNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
				</div>
				</div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
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