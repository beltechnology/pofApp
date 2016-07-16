@extends('layouts.header')
@section('content')
<div class=" col-md-9 category">
    {!! Form::model($fee, [
        'method' => 'PATCH',
        'url' => ['/fees', $fee->entityId],
        'class' => 'form-horizontal'
    ]) !!}

	 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
      <li><a href="{{ url('/schools/'.$fee->entityId.'/edit') }}"> School Profile </a></li>
      <li><a href="{{ url('/book-details/'.$fee->entityId.'/edit') }}"> Book Detail </a></li>
      <li ><a href="{{ url('/student-count/'.$fee->entityId.'/edit') }}"> No. of students from school </a></li>
      <li><a href="{{ url('/payments/'.$fee->entityId.'/edit') }}"> Payment Mode </a></li>
	  <li class="active"><a href="{{ url('/fees/'.$fee->entityId.'/edit') }}">Fees</a></li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/payments/'.$fee->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> Payment Mode</a></h1>
      <h1 class="text-center col-md-4">Fees</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	</div>
  <div class="row create-emp-list">
	<div class="col-md-6">
            <div class="form-group {{ $errors->has('examLevelId') ? 'has-error' : ''}}">
                {!! Form::label('examLevelId', 'Exam Level', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('examLevelId',(['1' => 'First Level']),null,['class' => 'form-control']) !!}
                    {!! $errors->first('examLevelId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			</div>
			<div class="col-md-6">
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
                   {!! Form::button('Activate', ['class' => 'btn btn-primary form-control']) !!}
                </div>
            </div>
			</div>		
	</div>

	 <div class="row create-emp-list">
	<div class="col-md-6">
            <div class="form-group {{ $errors->has('totalAmount') ? 'has-error' : ''}}">
                {!! Form::label('totalAmount', 'Total Amount', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('totalAmount',null,['class' => 'form-control']) !!}
                    {!! $errors->first('totalAmount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('restAmount') ? 'has-error' : ''}}">
                {!! Form::label('restAmount', 'Rest Amount', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('restAmount',null,['class' => 'form-control']) !!}
                    {!! $errors->first('restAmount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			</div>
			<div class="col-md-6">
            <div class="form-group {{ $errors->has('otherExpenses') ? 'has-error' : ''}}">
                {!! Form::label('otherExpenses', 'Miscellaneous Expenses', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('otherExpenses',null,['class' => 'form-control',  'required' => 'required']) !!}
                    {!! $errors->first('otherExpenses', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('receivedAmount') ? 'has-error' : ''}}">
                {!! Form::label('receivedAmount', 'Amount Received', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('receivedAmount',null,['class' => 'form-control',  'required' => 'required']) !!}
                    {!! $errors->first('receivedAmount', '<p class="help-block">:message</p>') !!}
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