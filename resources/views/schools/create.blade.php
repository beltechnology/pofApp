@extends('layouts.header')
@section('content')
    <div class=" col-md-9 category">

    <h1>Create New school</h1>
	
    <hr/>

    {!! Form::open(['url' => '/schools', 'class' => 'form-horizontal']) !!}


        {!! Form::hidden('schoolCode',\DB::table('schools')->max('id')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'schoolCode']) !!}

        {!! Form::hidden('entityId',\DB::table('entitys')->max('entityId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'entityId']) !!}

        <div class="row create-emp-list">
            <div class="col-md-6">

            <div class="form-group {{ $errors->has('posterDistributionDate') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributionDate', 'Poster distribution date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6  input-group date">
                    {!! Form::text('posterDistributionDate', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('posterDistributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('closingDate') ? 'has-error' : ''}}">
                {!! Form::label('closingDate', 'Closing date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6  input-group date">
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
                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                    {!! Form::label('address', trans('messages.ADDRESS'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('address', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            {!! Form::hidden('state',$value=session()->get('currentStateId'),['id' => 'state'])  !!}

                <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                    {!! Form::label('district', trans('messages.DISTRICT'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::select('district',$districts,null,['class' => 'form-control stateSelect','placeholder' => 'Select a District','id' => 'district']) !!}

                        {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                    {!! Form::label('city', trans('messages.CITY'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        <select id="city" class="form-control " name="city">
                            <option >Select a City </option>
                            <option value=""></option>
                        </select>
                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('pinCode') ? 'has-error' : ''}}">
                    {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('pinCode', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
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
                        {!! Form::text('emailAddress', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('PrincipalName') ? 'has-error' : ''}}">
                {!! Form::label('PrincipalName', 'Principal name', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('PrincipalName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('PrincipalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('principalEmail') ? 'has-error' : ''}}">
                {!! Form::label('principalEmail', 'Principal email', ['class' => 'col-sm-5 control-label']) !!}
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
                <div class="col-sm-6  input-group date">
                    {!! Form::text('PMOExamDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PMOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('PSOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PSOExamDate', 'Pso exam date', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-6  input-group date">
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
                <div class="col-sm-6  input-group date">
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
                    {!! Form::text('remarks', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
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
    <script>

        $('#district').on('change', function(e){
            console.log(e);
            var dist_id = e.target.value;
            $.get('{{ url('employee') }}/create/district?dist_id=' + dist_id, function(data) {
                console.log(data);
                $('#city').empty();
                $.each(data, function(index,subCatObj){
                    $('#city').append('<option value="'+subCatObj.id+'">'+subCatObj.cityName+'</option>');
                });
            });
        });
    </script>
@endsection

