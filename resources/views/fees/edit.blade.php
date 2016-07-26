@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
   

	 <div class="edit_school">	
       <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
       <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_SCHOOL_PROFILE') }} </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_BOOK_DETAIL') }}</a></li>
      <li><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_NO_OF_STUDENTS_FROM_SCHOOL') }}</a></li>
      <li><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_PAYMENT_MODE') }}</a></li>
	  <li class="active"><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FEES') }}</a></li>
	  <li><a href="{{ url('/student/') }}">{{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></li>
	  <li><a href="{{ url('/first-level/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FIRST_LEVEL_EXAM_TIME') }}</a></li>
    </ul>
		</div>
	</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/payments/'.$fee->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_PAYMENT_MODE') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.TABS_FEES') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	</div>
	<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
  <div class="row create-emp-list">
		<div class="col-md-6">
            <div class="form-group {{ $errors->has('examLevelId') ? 'has-error' : ''}}">
                {!! Form::label('examLevelId', trans('messages.EXAM_LEVEL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('examLevelId',(['1' => trans('messages.FIRST_LEVEL')]),null,['class' => 'form-control']) !!}
                    {!! $errors->first('examLevelId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>		
			</div>
			<div class="col-md-6">
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-3">
				 {!! Form::open(['method'=>'DELETE','url' => ['/fees', $fee->entityId],'style' => 'display:inline']) !!}              
				{!! Form::submit(trans('messages.ACTIVATE'), ['class' => 'btn btn-primary ','onclick'=>'return confirm("Confirm to school activate ?")']) !!}
				{!! Form::close() !!}
                </div>
            </div>
			</div>	
		</div>			
 {!! Form::model($fee, [
        'method' => 'PATCH',
        'url' => ['/fees', $fee->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	 <div class="row create-emp-list">
	 {!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
	<div class="col-md-6">
			 <div class="form-group {{ $errors->has('studentsFees') ? 'has-error' : ''}}">
                {!! Form::label('studentsFees',trans('messages.STUDENTS_FEES'), ['class' => 'col-sm-5 control-label ']) !!}
                <div class="col-sm-7">
                    {!! Form::number('studentsFees',null,['class' => 'form-control studentsFees','min'=>'0']) !!}
                    {!! $errors->first('studentsFees', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('totalAmount') ? 'has-error' : ''}}">
                {!! Form::label('totalAmount',trans('messages.TOTAL_AMOUNT'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::number('totalAmount',null,['class' => 'form-control totalAmount','readonly'=>'readonly']) !!}
                    {!! $errors->first('totalAmount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('restAmount') ? 'has-error' : ''}}">
                {!! Form::label('restAmount', trans('messages.REST_AMOUNT'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::number('restAmount',null,['class' => 'form-control','readonly'=>'readonly']) !!}
                    {!! $errors->first('restAmount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			</div>
			<div class="col-md-6">
            <div class="form-group {{ $errors->has('otherExpenses') ? 'has-error' : ''}}">
                {!! Form::label('otherExpenses',trans('messages.MISCELLANEOUS_EXPENSES'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::number('otherExpenses',null,['class' => 'form-control otherExpenses',  'required' => 'required','min'=>'0']) !!}
                    {!! $errors->first('otherExpenses', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('receivedAmount') ? 'has-error' : ''}}">
                {!! Form::label('receivedAmount', trans('messages.AMOUNT_RECEIVED'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::number('receivedAmount',null,['class' => 'form-control',  'required' => 'required','min'=>'0']) !!}
                    {!! $errors->first('receivedAmount', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			</div>			
			</div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary ']) !!}
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
 <script type="text/javascript">
        $(function() {
            $(".studentsFees , .otherExpenses").on("change keyup mouseup", function(){
               var studentsFees= $(".studentsFees").val();
			   var otherExpenses= $(".otherExpenses").val();
			   var totalAmout=(studentsFees+otherExpenses);
			   $(".totalAmount").val(totalAmout);
            });
        });
    </script>
@endsection