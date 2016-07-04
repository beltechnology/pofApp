@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
<div class="row">
   <h1 class="text-left"><a href="{{ url('/employee') }}">Employee List </a></h1>
    <hr/>

    {!! Form::model($employee->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(), [
        'method' => 'PATCH',
        'url' => ['/employee', $employee->entityId],
        'class' => 'form-horizontal'
    ]) !!}
   
    


               <div class=" col-md-6">
                    {!! Form::hidden('employeeId',null, ['class' => 'form-control'],['name'=>'employeeid']) !!}
                
                    {!! Form::hidden('entityId', null, ['class' => 'form-control'],['name'=>'entityId']) !!}
               
                     
            <div class="form-group {{ $errors->has('employeeName') ? 'has-error' : ''}}">
                {!! Form::label('employeeName', 'Name', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('employeeName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dob') ? 'has-error' : ''}}">
                {!! Form::label('dob', 'Dob', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6 input-group date">
                    {!! Form::text('dob', null, ['class' => 'form-control','required' => 'required']) !!}
                    <span class="input-group-addon ">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dob', '<p class="help-block">:message</p>') !!}
                </div>
                
            </div>   
             <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                {!! Form::label('address', 'Address', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('addressLine1', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                </div>
            </div>      
            <div class="form-group {{ $errors->has('state') ? 'has-error' : ''}}">
                {!! Form::label('state', 'State', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
					{!! Form::select('state',\DB::table('states')->lists('name','id'), "Debugging", ['class' => 'form-control stateSelect','placeholder' => 'Select a State','id' => 'stateSelect']) !!}
                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                {!! Form::label('district', 'District', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
					{!!	Form::select('district', array('key' => 'value'), 'key', array('class' => 'form-control','id'=>'selectCity', 'placeholder' => 'City')) !!}
					 {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', 'City', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
					{!!	Form::select('city', array('key' => 'value'), 'key', array('class' => 'form-control','id'=>'selectCity', 'placeholder' => 'City')) !!}
					 {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('pinCode') ? 'has-error' : ''}}">
                {!! Form::label('pinCode', 'Pin Code', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('pincode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
             </div>
            <div class=" col-md-6">
            
             <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('primaryNumber', 'Primary Mobile', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('primaryNumber', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
             <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('secondaryNumber', 'Secondary Mobile', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('secondaryNumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div> 
            <div class="form-group {{ $errors->has('emailAddress') ? 'has-error' : ''}}">
                {!! Form::label('emailAddress', 'Employee Email Id', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
              <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', 'Designation', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('designation', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateOfJoining') ? 'has-error' : ''}}">
                {!! Form::label('dateOfJoining', 'Date Of Joining', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6 input-group date">
                    {!! Form::text('dateOfJoining', null, ['class' => 'form-control','required' => 'required']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('dateOfJoining', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', 'Employee Code', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('employeeCode', null, ['class' => 'form-control','required' => 'required','readonly'=>'readonly']) !!}
                    {!! $errors->first('dateOfJoining', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
            <!--<div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', 'Employee Code', ['class' => 'col-sm-5  control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('employeeCode', null, ['class' => 'form-control','required' => 'required']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 -->
              <div class=" col-md-6">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5 ">
            {!! Form::reset('Cancel', ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit('Submit', ['class' => 'btn btn-primary ']) !!}
        </div>
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
</div>
@endsection