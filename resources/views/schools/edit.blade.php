@extends('layouts.header')
@section('content')
    <div class=" col-md-9 category">
			
   
    {!! Form::model($school->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(), [
        'method' => 'PATCH',
        'url' => ['/schools', $school->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	<div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
      <li class="active"><a href="{{ url('/schools/'.$school->entityId.'/edit') }}"> School Profile </a></li>
      <li><a href="{{ url('/book-details/'.$school->entityId.'/edit') }}"> Book Detail </a></li>
      <li><a href="{{ url('/student-count/'.$school->entityId.'/edit') }}"> No. of students from school </a></li>
      <li><a href="{{ url('/payments/'.$school->entityId.'/edit') }}"> Payment Mode </a></li>
    </ul>
  </div>
</nav>

	</div>
    <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/schools') }}" class="fa fa-angle-left  fa-2x"> School List </a></h1>
      <h1 class="text-center col-md-4">Edit school</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
        <div class="row create-emp-list">
		@if(Session::has('flash_message'))
		<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('flash_message') }}</p>
		@endif
            <div class="col-md-6">

            <div class="form-group {{ $errors->has('posterDistributionDate') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributionDate', 'Poster distribution date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6   input-group date">
                    {!! Form::text('posterDistributionDate', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('posterDistributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('closingDate') ? 'has-error' : ''}}">
                {!! Form::label('closingDate', 'Closing date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6   input-group date">
                    {!! Form::text('closingDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('closingDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('formNo') ? 'has-error' : ''}}">
                {!! Form::label('formNo', 'Form no', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('formNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('formNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolName') ? 'has-error' : ''}}">
                {!! Form::label('schoolName', 'School name', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('schoolName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                <div class="form-group {{ $errors->has('addressLine1') ? 'has-error' : ''}}">
                    {!! Form::label('addressLine1', trans('messages.ADDRESS'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::textarea('addressLine1', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('addressLine1', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
			{!! Form::hidden('stateId',session()->get('currentStateId'),['id' => 'state']) !!}

			 <div class="form-group {{ $errors->has('districtId') ? 'has-error' : ''}}">
                {!! Form::label('districtId', trans('messages.DISTRICT'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
				{!! Form::select('districtId',$districts, null, ['class' => 'form-control stateSelect','id' => 'district']) !!}
					 {!! $errors->first('districtId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  
             <div class="form-group {{ $errors->has('cityId') ? 'has-error' : ''}}">
                {!! Form::label('cityId', trans('messages.CITY'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
				{!! Form::select('cityId',$citys, null, ['class' => 'form-control stateSelect','id' => 'city']) !!}
					 {!! $errors->first('cityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
                {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pincode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('pincode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>




                <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('primaryNumber', trans('messages.PRIMARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('primaryNumber', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('secondaryNumber', trans('messages.SECONDARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('secondaryNumber', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('emailAddress') ? 'has-error' : ''}}">
                    {!! Form::label('emailAddress', trans('messages.EMAIL'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('principalName') ? 'has-error' : ''}}">
                {!! Form::label('principalName', 'Principal Name', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('principalName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('principalMobile') ? 'has-error' : ''}}">
                {!! Form::label('principalMobile', 'Principal Mobile', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('principalMobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('principalEmail') ? 'has-error' : ''}}">
                {!! Form::label('principalEmail', 'Principal Email', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('principalEmail', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('firstCoordinatorName') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorName', 'First coordinator name', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstCoordinatorName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorMobile', 'First coordinator mobile', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstCoordinatorMobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorEmail', 'First coordinator email', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstCoordinatorEmail', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('secondCoordinator') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinator', 'Second coordinator', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondCoordinator', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinator', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorMobile', 'second coordinator mobile', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondCoordinatorMobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('secondCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorEmail', 'Second coordinator email', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondCoordinatorEmail', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('PMOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PMOExamDate', 'Pmo exam date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6   input-group date">
                    {!! Form::text('PMOExamDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PMOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('PSOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PSOExamDate', 'Pso exam date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6   input-group date">
                    {!! Form::text('PSOExamDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PSOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolcode') ? 'has-error' : ''}}">
                {!! Form::label('schoolcode', 'School code', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('schoolcode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolcode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('uniqueSchoolCode') ? 'has-error' : ''}}">
                {!! Form::label('uniqueSchoolCode', 'Unique school code', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('uniqueSchoolCode', null, ['class' => 'form-control','readonly'=>'readonly']) !!}
                    {!! $errors->first('uniqueSchoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', 'Team code', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('teamCode', $team, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', 'Employee code', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('employeeCode',$employee, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolTotalStrength') ? 'has-error' : ''}}">
                {!! Form::label('schoolTotalStrength', 'School total strength', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('schoolTotalStrength', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolTotalStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classStrength') ? 'has-error' : ''}}">
                {!! Form::label('classStrength', 'Class 3 to 10 strength', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('classStrength', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('classStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('followUpDate') ? 'has-error' : ''}}">
                {!! Form::label('followUpDate', 'Follow update', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6   input-group date">
                    {!! Form::text('followUpDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('followUpDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('callStatus') ? 'has-error' : ''}}">
                {!! Form::label('callStatus', 'Call status', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('callStatus', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('callStatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('posterDistributed') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributed', 'Poster distributed', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('posterDistributed', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('posterDistributed', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('KMS') ? 'has-error' : ''}}">
                {!! Form::label('KMS', 'Kms', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('KMS', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('KMS', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                {!! Form::label('remarks', 'Remarks', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
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
<script>
$(document).ready(function(){
	
        var state_id = $("#state").val();
        var district = $("#district").val();
        var city = $("#city").val();

        $.get('{{ url('employee') }}/edit/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#district').empty();
            $.each(data, function(index,subCatObj){
                $('#district').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
		$("#district").val(district);
		var dist_id = $("#district").val();
	 $.get('{{ url('employee') }}/edit/district?dist_id=' + dist_id, function(data) {
            console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value="'+subCatObj.id+'">'+subCatObj.cityName+'</option>');
            });
			$("#city").val(city);
        });

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
</script>
@endsection