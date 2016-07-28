@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    {!! Form::model($payment, [
        'method' => 'PATCH',
        'url' => ['/payments', $payment->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	
	 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
@foreach ($articles as $article)
		@if($article->moduleType === 2)	
			@if($article->muduleLink === "/payments")
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
	 <h1 class="text-left col-md-4"><a href="{{ url('/student-count/'.$payment->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.STUDENTS_STRENGTH') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.TABS_PAYMENT_MODE') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	</div>
	<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
	  <div class="row create-emp-list">
	  	{!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
	<div class="col-md-6">
            <div class="form-group {{ $errors->has('examLevelId') ? 'has-error' : ''}}">
                {!! Form::label('examLevelId', trans('messages.EXAM_LEVEL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('examLevelId',(['1' => trans('messages.FIRST_LEVEL')]),null,['class' => 'form-control']) !!}
                    {!! $errors->first('examLevelId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('paymentDate') ? 'has-error' : ''}}">
					{!! Form::label('paymentDate', trans('messages.DATE'), ['class' => 'col-sm-5 control-label']) !!}
					<div class="col-sm-7   input-group date">
                    {!! Form::text('paymentDate', null, ['class' => 'form-control','required'=>'required','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('paymentDate', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
			
			</div>
			<div class="col-md-6">
			
            <div class="form-group {{ $errors->has('paymentModeId') ? 'has-error' : ''}}">
                {!! Form::label('paymentModeId', trans('messages.TABS_PAYMENT_MODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('paymentModeId',$payment_modes,null,['class' => 'form-control',  'required' => 'required']) !!}
                    {!! $errors->first('paymentModeId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<!-- cheque div -->
			<div class="form-group Cheque commonDiv {{ $errors->has('modeRefNo') ? 'has-error' : ''}}">
					{!! Form::label('modeRefNo', trans('messages.CHEQUE_NO'), ['class' => 'col-sm-5 control-label']) !!}
					<div class="col-sm-7">
                    {!! Form::text('modeRefNo', null, ['class' => 'form-control','maxlength'=>'20']) !!}
                    {!! $errors->first('modeRefNo', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
				<!-- cheque div -->	
				<!-- demand draft div -->
				<div class="form-group hide DD commonDiv {{ $errors->has('modeRefNo') ? 'has-error' : ''}}">
					{!! Form::label('modeRefNo', trans('messages.DEMAND_DRAFT'), ['class' => 'col-sm-5 control-label']) !!}
					<div class="col-sm-7">
                    {!! Form::text('modeRefNo', null, ['class' => 'form-control','maxlength'=>'20']) !!}
                    {!! $errors->first('modeRefNo', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
				<!-- demand draft div -->	

					<!-- RTGS div -->
					<div class="form-group hide RTGS commonDiv {{ $errors->has('paymentStatus') ? 'has-error' : ''}}">
					{!! Form::label('paymentStatus', trans('messages.RECEIVED'), ['class' => 'col-sm-5 control-label']) !!}
					<div class="col-sm-6">
                    {!! Form::checkbox('paymentStatus',$payment->paymentStatus, ['class' => 'form-control','id'=>'paymentStatus']) !!}
                    {!! $errors->first('paymentStatus', '<p class="help-block">:message</p>') !!}
							</div>
						</div>
					<!-- RTGS div -->
				
				<!-- NEFT Div -->
					<div class="form-group hide NEFT commonDiv{{ $errors->has('paymentStatus') ? 'has-error' : ''}}">
					{!! Form::label('paymentStatus1', trans('messages.RECEIVED'), ['class' => 'col-sm-5 control-label','id'=>'paymentStatus1'])!!}
					<div class="col-sm-6 ">
                    {!! Form::checkbox('paymentStatus',$payment->paymentStatus, ['class' => 'form-control','id'=>'paymentStatusNeft']) !!}
                    {!! $errors->first('paymentStatus', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
			<!-- NEFT DIV -->
			
			<!-- Cash Div -->
				<div class="form-group hide Cash commonDiv {{ $errors->has('modeRefNo') ? 'has-error' : ''}}">
					{!! Form::label('modeRefNo', trans('messages.AMOUNT'), ['class' => 'col-sm-5 control-label']) !!}
					<div class="col-sm-7">
                    {!! Form::text('modeRefNo', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('modeRefNo', '<p class="help-block">:message</p>') !!}						
						</div>
					</div>
		
			<!-- Cash DIV -->
			
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
<script>
      if($('#paymentStatus').val() == 1){
          $( "#paymentStatus" ).prop( "checked", true );
     }else if($('#paymentStatus').val() ==  0){
		   $( "#paymentStatus" ).prop( "checked", false );
     }

$('#paymentStatus').change(function(){
      if($(this).attr('checked')){
          $(this).val('1');
     }else{
          $(this).val('0');
     }
 });
  if($('#paymentStatus1 #paymentStatus').val() == 1){
          $('#paymentStatus').prop( "checked", true );
     }else if($('#paymentStatus1 #paymentStatus').val() ==  0){
		   $('#paymentStatus').prop( "checked", false );
     }
$('#paymentStatusNeft').change(function(){
      if($(this).attr('checked')){
          $(this).val('1');
     }else{
          $(this).val('0');
     }
 });
           var textCode = $("#paymentModeId option:selected").text();
		   checkCurrentForm(textCode);
		   $('#paymentModeId').on('change', function(e){
           var textCode = $("#paymentModeId option:selected").text();
		  checkCurrentForm(textCode);
        });
		function checkCurrentForm(textCode)
		{
			$(".commonDiv").addClass('hide');
			$(".commonDiv").find('input').attr('disabled','disabled');
			$("."+textCode).find('input').removeAttr('disabled');
			$("."+textCode).removeClass('hide');
		}
</script>
@endsection