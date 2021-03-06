@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">
    {!! Form::model($school->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(), [
        'method' => 'PATCH',
        'url' => ['/schools', $school->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	<div class="edit_school">	
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
    	<ul class="nav navbar-nav">
	 @foreach ($articles as $article)	
		@if($article->moduleType == trans('messages.TWO'))	
			@if($article->muduleLink === "/schools")
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

	</div>
    <div class="h1-two edit-school-border col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/schools') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.SCHOOL_LIST') }} </a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.SCHOOL_EDIT_SCHOOL') }} </h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
        <div class="row create-emp-list">
		 <div class="col-md-6">
            <div class="form-group {{ $errors->has('posterDistributionDate') ? 'has-error' : ''}}">
				{!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
                {!! Form::label('posterDistributionDate', trans('messages.SCHOOL_POSTER_DISTRIBUTION_DATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7   input-group date">
                    {!! Form::text('posterDistributionDate', null, ['class' => 'form-control','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('posterDistributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('closingDate') ? 'has-error' : ''}}">
                {!! Form::label('closingDate', trans('messages.SCHOOL_CLOSING_DATE') , ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7   input-group date">
                    {!! Form::text('closingDate', null, ['class' => 'form-control','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('closingDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('sessionYear') ? 'has-error' : ''}}">
                {!! Form::label('sessionYear',  trans('messages.SESSION_YEAR'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('sessionYear', ['0'=>'Select Session Year']+$sessionYear,null,['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('sessionYear', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('formNo') ? 'has-error' : ''}}">
                {!! Form::label('formNo',  trans('messages.SCHOOL_FORM_NO'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('formNo', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'10']) !!}
                    {!! $errors->first('formNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolName') ? 'has-error' : ''}}">
                {!! Form::label('schoolName', trans('messages.SCHOOL_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolName', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'190']) !!}
                    {!! $errors->first('schoolName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                <div class="form-group {{ $errors->has('addressLine1') ? 'has-error' : ''}}">
                    {!! Form::label('addressLine1', trans('messages.ADDRESS'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::textarea('addressLine1', null, ['class' => 'form-control','required' => 'required','maxlength'=>'190']) !!}
                        {!! $errors->first('addressLine1', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
			{!! Form::hidden('stateId',session()->get('currentStateId'),['id' => 'state']) !!}

			 <div class="form-group {{ $errors->has('districtId') ? 'has-error' : ''}}">
                {!! Form::label('districtId', trans('messages.DISTRICT'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-7">
				{!! Form::select('districtId',$districts, null, ['class' => 'form-control stateSelect','id' => 'district','required'=>'required']) !!}
					 {!! $errors->first('districtId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  
             <div class="form-group {{ $errors->has('cityId') ? 'has-error' : ''}}">
                {!! Form::label('cityId', trans('messages.CITY'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-7">
				{!! Form::select('cityId',$citys, null, ['class' => 'form-control stateSelect','id' => 'city']) !!}
					 {!! $errors->first('cityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
                {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('pincode', null, ['class' => 'form-control','required' => 'required','maxlength'=>'10']) !!}
                    {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




                <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('primaryNumber', trans('messages.PRIMARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('primaryNumber', null, ['class' => 'form-control','required' => 'required','maxlength'=>'13']) !!}
                        {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('secondaryNumber', trans('messages.SECONDARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('secondaryNumber', null, ['class' => 'form-control','maxlength'=>'13']) !!}
                        {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('emailAddress') ? 'has-error' : ''}}">
                    {!! Form::label('emailAddress', trans('messages.EMAIL'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('email', null, ['class' => 'form-control','required' => 'required','maxlength'=>'190']) !!}
                        {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('principalName') ? 'has-error' : ''}}">
                {!! Form::label('principalName', trans('messages.SCHOOL_PRINCIPAL_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalName', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'190']) !!}
                    {!! $errors->first('principalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('principalMobile') ? 'has-error' : ''}}">
                {!! Form::label('principalMobile',  trans('messages.SCHOOL_PRINCIPAL_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalMobile', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'13']) !!}
                    {!! $errors->first('principalMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('principalEmail') ? 'has-error' : ''}}">
                {!! Form::label('principalEmail', trans('messages.SCHOOL_PRINCIPAL_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalEmail', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'190']) !!}
                    {!! $errors->first('principalEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('principalGift') ? 'has-error' : ''}}">
                {!! Form::label('principalGift', trans('messages.SCHOOL_PRINCIPAL_GIFT'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('principalGift',['0'=>'Yes','1'=>'NO'],null,['class' => 'form-control', 'required' => 'required','placeholder'=>'Select Gift Status']) !!}
                    {!! $errors->first('principalGift', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorName') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorName', trans('messages.SCHOOL_FIRST_COORDINATOR_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorName', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('firstCoordinatorName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorMobile', trans('messages.SCHOOL_FIRST_COORDINATOR_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorMobile', null, ['class' => 'form-control','maxlength'=>'13']) !!}
                    {!! $errors->first('firstCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorEmail', trans('messages.SCHOOL_FIRST_COORDINATOR_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorEmail', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('firstCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('secondCoordinator') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinator', trans('messages.SCHOOL_SECOND_COORDINATOR_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinator', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('secondCoordinator', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorMobile', trans('messages.SCHOOL_SECOND_COORDINATOR_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinatorMobile', null, ['class' => 'form-control','maxlength'=>'13']) !!}
                    {!! $errors->first('secondCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('secondCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorEmail',  trans('messages.SCHOOL_SECOND_COORDINATOR_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinatorEmail', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('secondCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('coordinatorGift') ? 'has-error' : ''}}">
                {!! Form::label('coordinatorGift', trans('messages.SCHOOL_COORDINATOR_GIFT'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('coordinatorGift',['0'=>'Yes','1'=>'NO'],null,['class' => 'form-control','placeholder'=>'Select Gift Status']) !!}
                    {!! $errors->first('coordinatorGift', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('PMOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PMOExamDate',  trans('messages.SCHOOL_PMO_EXAM_DATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7   input-group date">
                    {!! Form::text('PMOExamDate', null, ['class' => 'form-control','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PMOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('PSOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PSOExamDate',  trans('messages.SCHOOL_PSO_EXAM_DATE'),['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7   input-group date">
                    {!! Form::text('PSOExamDate', null, ['class' => 'form-control','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PSOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolcode') ? 'has-error' : ''}}">
                {!! Form::label('schoolcode', trans('messages.SCHOOL_SCHOOL_CODE'),['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolcode', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('schoolcode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('uniqueSchoolCode') ? 'has-error' : ''}}">
                {!! Form::label('uniqueSchoolCode',trans('messages.SCHOOL_UNIQUE_CODE'),['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('uniqueSchoolCode', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
                    {!! $errors->first('uniqueSchoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', trans('messages.SCHOOL_TEAM_CODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('teamCode', ['0' => 'Select a Team Code']+$team, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', trans('messages.SCHOOL_EMPLOYEE_CODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('employeeCode',['0' => 'Select a Employee Code']+$employee, null, ['class' => 'form-control', 'required' => 'required','id'=>'employeeCode']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('employeeMobileType') ? 'has-error' : ''}}">
                {!! Form::label('employeeMobileType', trans('messages.SCHOOL_EMPLOYEE_MOBILE_NUMBER'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
					 {!! Form::select('employeeMobileType',[], null, ['class' => 'form-control', 'required' => 'required','id'=>'mobileNumber']) !!}
                    {!! $errors->first('employeeMobileType', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolTotalStrength') ? 'has-error' : ''}}">
                {!! Form::label('schoolTotalStrength', trans('messages.SCHOOL_TOTAL_STRENGTH'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolTotalStrength', null, ['class' => 'form-control','maxlength'=>'15']) !!}
                    {!! $errors->first('schoolTotalStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classStrength') ? 'has-error' : ''}}">
                {!! Form::label('classStrength', trans('messages.SCHOOL_CLASS_3_TO_10'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('classStrength', null, ['class' => 'form-control','maxlength'=>'15']) !!}
                    {!! $errors->first('classStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('followUpDate') ? 'has-error' : ''}}">
                {!! Form::label('followUpDate', trans('messages.SCHOOL_FOLLOW_UPDATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7   input-group date">
                    {!! Form::text('followUpDate', null, ['class' => 'form-control','maxlength'=>'10']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('followUpDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('callStatus') ? 'has-error' : ''}}">
                {!! Form::label('callStatus', trans('messages.SCHOOL_CALL_STATUS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                   {!! Form::select('callStatus',['1'=>'Cold Call','2'=>'Warm Call','3'=>'Hot Call'],null,['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('callStatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('posterDistributed') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributed', trans('messages.SCHOOL_POSTER_DISTRIBUTED'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('posterDistributed', null, ['class' => 'form-control','maxlength'=>'15']) !!}
                    {!! $errors->first('posterDistributed', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('KMS') ? 'has-error' : ''}}">
                {!! Form::label('KMS', trans('messages.SCHOOL_KMS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('KMS', null, ['class' => 'form-control','maxlength'=>'15']) !!}
                    {!! $errors->first('KMS', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                {!! Form::label('remarks', trans('messages.SCHOOL_REMARKS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::textarea('remarks', null, ['class' => 'form-control','maxlength'=>'190']) !!}
                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    
	<div class=" col-md-12 button-group">
    <div class="form-group">
        <div class=" team_btn school-create-btn">
             {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
	</div>
	
	</div>



    <!--<div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>-->
	
    {!! Form::close() !!}

   

</div>
<script>
$(document).ready(function(){
	
        var state_id = $("#state").val();
        var district = $("#district").val();
        var city = $("#city").val();
		var emp_id=$("#employeeCode").val();

        $.get('{{ url('employee') }}/edit/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#district').empty();
            $.each(data, function(index,subCatObj){
                $('#district').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
				$("#district").val(district);
   			 });	
		
		var dist_id = $("#district").val();
	 $.get('{{ url('employee') }}/edit/district?dist_id=' + dist_id, function(data) {
            console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value="'+subCatObj.id+'">'+subCatObj.cityName+'</option>');
            });
			$("#city").val(city);
        });
  $.get('{{ url('schools') }}/edit/schools?emp_id=' + emp_id, function(data) {
            console.log(data);
            $('#mobileNumber').empty();
            $.each(data, function(index,subCatObj){
                $('#mobileNumber').append('<option value="primary">'+subCatObj.primaryNumber+'</option>');
                $('#mobileNumber').append('<option value="secondary">'+subCatObj.secondaryNumber+'</option>');
            });
			$("#employeeCode").val(emp_id);
        });

});

    $('#state').on('change', function(e){
        console.log(e);
        var state_id = e.target.value;
        $.get('{{ url('employee') }}/edit/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#district').empty();
            $.each(data, function(index,subCatObj){
                $('#district').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
        });
    });
$('#district').on('change', function(e){
        console.log(e);
        var dist_id = e.target.value;
        $.get('{{ url('employee') }}/edit/district?dist_id=' + dist_id, function(data) {
            console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value="'+subCatObj.id+'">'+subCatObj.cityName+'</option>');
            });
        });
    });

$('#employeeCode').on('change', function(e){
        console.log(e);
        var emp_id = e.target.value;
        $.get('{{ url('schools') }}/edit/schools?emp_id=' + emp_id, function(data) {
            console.log(data);
            $('#mobileNumber').empty();
            $.each(data, function(index,subCatObj){
                $('#mobileNumber').append('<option value="primary">'+subCatObj.primaryNumber+'</option>');
                $('#mobileNumber').append('<option value="secondary">'+subCatObj.secondaryNumber+'</option>');
            });
        });
    });
</script>
@endsection