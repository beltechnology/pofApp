@extends('layouts.header')
@section('content')
<div class=" col-md-9 category">
    <h1 class="text-left"><a href="{{ url('/employee') }}">{{ trans('messages.EMPLOYEE_LIST') }} </a></h1>
    <hr/>
<div class="row">
    {!! Form::open(['url' => '/employee', 'class' => 'form-horizontal']) !!}
    			<div class=" col-md-6 create-emp-list">
                {!! Form::hidden('employeeId',\DB::table('employees')->max('employeeId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'employeeid']) !!}
                {!! Form::hidden('employeeCode',\DB::table('employees')->max('employeeId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'employeeid']) !!}

                    {!! Form::hidden('entityId',\DB::table('entitys')->max('entityId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'entityId']) !!}
               
                     
            <div class="form-group {{ $errors->has('employeeName') ? 'has-error' : ''}}">
                {!! Form::label('employeeName', trans('messages.NAME'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('employeeName', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('employeeName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', trans('messages.DOB'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('dob', null, ['class' => 'form-control','required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
            </div>   
             <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', trans('messages.ADDRESS'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('address', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>      
            <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                {!! Form::label('state', trans('messages.STATE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					{!! Form::select('state',\DB::table('states')->lists('name','id'), "Debugging", ['class' => 'form-control stateSelect','placeholder' => trans('messages.SELECT_STATE'),'id' => 'stateSelect']) !!}
                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                {!! Form::label('district', trans('messages.DISTRICT'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					{!!	Form::select('district', array('key' => trans('messages.SELECT_DISTRICT')), 'key', array('class' => 'form-control','id'=>'selectCity', 'placeholder' => 'City')) !!}
					 {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('messages.CITY'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					{!!	Form::select('city', array('key' => trans('messages.SELECT_CITY')), 'key', array('class' => 'form-control','id'=>'selectCity', 'placeholder' => 'City')) !!}
					 {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             
            
             </div>
            <div class=" col-md-6 create-emp-list">
			
			<div class="form-group {{ $errors->has('pinCode') ? 'has-error' : ''}}">
                {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('pinCode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
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
                    {!! Form::text('emailAddress', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
              <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', trans('messages.DESIGNATION'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                     {!! Form::select('designation',\DB::table('designations')->lists('designation','id'), "Debugging", ['class' => 'form-control stateSelect','id' => 'designation','placeholder' => trans('messages.SELECT_DESIGNATION'),]) !!}
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
                {!! Form::label('employeeCode', 'Employee Code', ['class' => 'col-sm-3  control-label']) !!}
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
@endsection
