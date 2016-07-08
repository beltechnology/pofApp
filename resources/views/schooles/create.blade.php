@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
    <h1 class="text-left"><a href="{{ url('/schooles') }}" class="fa fa-angle-left  fa-2x"> Schools</a></h1>
    <hr/>
	<div class="row">

    {!! Form::open(['url' => '/schooles', 'class' => 'form-horizontal']) !!}
        <div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('session') ? 'has-error' : ''}}">
                {!! Form::label('session', 'Session', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('session', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('session', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('distributionDate') ? 'has-error' : ''}}">
                {!! Form::label('distributionDate', 'Distribution Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('distributionDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('distributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('clossingDate') ? 'has-error' : ''}}">
                {!! Form::label('clossingDate', 'Clossing Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('clossingDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('clossingDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('formNo') ? 'has-error' : ''}}">
                {!! Form::label('formNo', 'Form No', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('formNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('formNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolCode') ? 'has-error' : ''}}">
                {!! Form::label('schoolCode', 'School Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('schoolCode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('uniqueSchoolCode') ? 'has-error' : ''}}">
                {!! Form::label('uniqueSchoolCode', 'Unique School Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('uniqueSchoolCode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('uniqueSchoolCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			 <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('schoolname', 'School Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('distributionDate') ? 'has-error' : ''}}">
                {!! Form::label('schooladdress', 'School Address', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('addressLine1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('addressLine1', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('stateName') ? 'has-error' : ''}}">
                {!! Form::label('state', 'State Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('stateName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('stateName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('district', 'District', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cityName') ? 'has-error' : ''}}">
                {!! Form::label('cityName', 'City Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('cityName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('cityName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pincode') ? 'has-error' : ''}}">
                {!! Form::label('pincode', 'Pin Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('pincode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
            <div class="form-group {{ $errors->has('teamcode') ? 'has-error' : ''}}">
                {!! Form::label('teamcode', 'Team Code', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('teamcode', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamcode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		
            <div class="form-group {{ $errors->has('employeeNo') ? 'has-error' : ''}}">
                {!! Form::label('employeeNo', 'Employee No', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('employeeNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('employeeNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			<div class="form-group {{ $errors->has('employeeConNo') ? 'has-error' : ''}}">
                {!! Form::label('employeeConNo', 'Employee Contact No', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::number('employeeConNo', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('employeeConNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			</div>
		<div class=" col-md-6 create-emp-list">
            
            <div class="form-group {{ $errors->has('principalName') ? 'has-error' : ''}}">
                {!! Form::label('principalName', 'Principal Name', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('principalName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pmo_psoIncharge') ? 'has-error' : ''}}">
                {!! Form::label('pmo_psoIncharge', 'PMO PSO Incharge', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('pmo_psoIncharge', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pmo_psoIncharge', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('pmoExmDate') ? 'has-error' : ''}}">
                {!! Form::label('pmoExmDate', 'Pmo Exam Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('pmoExmDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('pmoExmDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('psoExmDate') ? 'has-error' : ''}}">
                {!! Form::label('psoExmDate', 'PSO Exm Date', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('psoExmDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('psoExmDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('deleted') ? 'has-error' : ''}}">
                {!! Form::label('deleted', 'Deleted', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('deleted', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('deleted', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

			   <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('mobile', 'Primary Mobile Number', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('primaryNumber', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                {!! Form::label('secondaryNumber', 'Secondary Mobile Number', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('secondaryNumber', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', 'Email', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primaryMobile') ? 'has-error' : ''}}">
                {!! Form::label('primaryMobile', 'Principal Mobile Number', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('primaryMobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('primaryMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			
			<div class="form-group {{ $errors->has('primaryMobile') ? 'has-error' : ''}}">
                {!! Form::label('mobile', 'PMO Mobile', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('primaryMobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('primaryMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('primaryMobile') ? 'has-error' : ''}}">
                {!! Form::label('primaryMobile', 'PSO Mobile Number', ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('primaryMobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('primaryMobile', '<p class="help-block">:message</p>') !!}
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