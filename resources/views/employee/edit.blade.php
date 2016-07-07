@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
<div class="row">
   <h1 class="text-left"><a href="{{ url('/employee') }}">{{ trans('messages.EMPLOYEE_LIST') }}</a></h1>
    <hr/>

    {!! Form::model($employee->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(), [
        'method' => 'PATCH',
        'url' => ['/employee', $employee->entityId],
        'class' => 'form-horizontal'
    ]) !!}
   
    


               <div class=" col-md-6 create-emp-list">
                    {!! Form::hidden('employeeId',null, ['class' => 'form-control'],['name'=>'employeeid']) !!}
                
                    {!! Form::hidden('entityId', null, ['class' => 'form-control'],['name'=>'entityId']) !!}
               
                     
            <div class="form-group {{ $errors->has('employeeName') ? 'has-error' : ''}}">
                {!! Form::label('employeeName', trans('messages.NAME'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('employeeName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', trans('messages.DOB'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('dob', null, ['class' => 'form-control','required' => 'required']) !!}
                    <span class="input-group-addon ">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
                
            </div>   
             <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', trans('messages.ADDRESS'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('addressLine1', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>      
            <div class="form-group {{ $errors->has('stateId') ? 'has-error' : ''}}">
                {!! Form::label('stateId', trans('messages.STATE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					{!! Form::select('stateId',\DB::table('states')->lists('stateName','id'), "Debugging", ['class' => 'form-control stateSelect','id' => 'state']) !!}
                    {!! $errors->first('stateId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('districtId') ? 'has-error' : ''}}">
                {!! Form::label('districtId', trans('messages.DISTRICT'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					 <select id="district" class="form-control " name="districtId">
					<option value=""></option>
					</select>
					 {!! $errors->first('districtId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  
             <div class="form-group {{ $errors->has('cityId') ? 'has-error' : ''}}">
                {!! Form::label('cityId', trans('messages.CITY'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					<select id="city" class="form-control " name="cityId">
					<option value=""></option>
					</select>
					 {!! $errors->first('cityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('pinCode') ? 'has-error' : ''}}">
                {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('pincode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
             </div>
            <div class=" col-md-6 create-emp-list">
            
             <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('primaryNumber', trans('messages.PRIMARY_MOBILE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('primaryNumber', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('secondaryNumber', trans('messages.SECONDARY_MOBILE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('secondaryNumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
            <div class="form-group {{ $errors->has('emailAddress') ? 'has-error' : ''}}">
                {!! Form::label('emailAddress', trans('messages.EMAIL'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
              <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', trans('messages.DESIGNATION'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::select('designation',\DB::table('designations')->lists('designation','id'), "Debugging", ['class' => 'form-control stateSelect','id' => 'designation']) !!}
                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateOfJoining') ? 'has-error' : ''}}">
                {!! Form::label('dateOfJoining', trans('messages.JOINING_DATE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('dateOfJoining', null, ['class' => 'form-control','required' => 'required']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dateOfJoining', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', trans('messages.EMPLOYEE_CODE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('employeeCode', null, ['class' => 'form-control','required' => 'required','readonly'=>'readonly']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			  <div class=" col-md-12 button-group">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-12 ">
            {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
    </div>
	
            </div>
           

		   <!--<div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', 'Employee Code', ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('employeeCode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 -->
            
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
<script>
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