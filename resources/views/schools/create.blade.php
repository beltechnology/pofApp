@extends('layouts.header')
@section('content')
    <div class=" col-md-9 category">
    <h1>{{ trans('messages.SCHOOL_CREATE_NEW_SCHOOL') }}</h1>
    <hr/>

    {!! Form::open(['url' => '/schools', 'class' => 'form-horizontal']) !!}
        {!! Form::hidden('schoolCode',\DB::table('schools')->max('id')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'uniqueschoolCode']) !!}
        {!! Form::hidden('entityId',\DB::table('entitys')->max('entityId')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'entityId']) !!}
        <div class="row create-emp-list">
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('posterDistributionDate') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributionDate', trans('messages.SCHOOL_POSTER_DISTRIBUTION_DATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7  input-group date">
                    {!! Form::text('posterDistributionDate', null, ['class' => 'form-control']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('posterDistributionDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group  {{ $errors->has('closingDate') ? 'has-error' : ''}}">
                {!! Form::label('closingDate',trans('messages.SCHOOL_CLOSING_DATE') , ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7  input-group date">
                    {!! Form::text('closingDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('closingDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('formNo') ? 'has-error' : ''}}">
                {!! Form::label('formNo', trans('messages.SCHOOL_FORM_NO'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('formNo', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('formNo', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolName') ? 'has-error' : ''}}">
                {!! Form::label('schoolName', trans('messages.SCHOOL_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                    {!! Form::label('address', trans('messages.SCHOOL_ADDRESS'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::textarea('address', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            {!! Form::hidden('state',$value=session()->get('currentStateId'),['id' => 'state'])  !!}

                <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                    {!! Form::label('district', trans('messages.DISTRICT'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::select('district',$districts,null,['class' => 'form-control stateSelect','placeholder' => 'Select a District','id' => 'district']) !!}

                        {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                    {!! Form::label('city', trans('messages.CITY'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        <select id="city" class="form-control " name="city">
                            <option >Select a City </option>
                            <option value=""></option>
                        </select>
                        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('pinCode') ? 'has-error' : ''}}">
                    {!! Form::label('pinCode', trans('messages.PINCODE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('pinCode', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('pinCode', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>




                <div class="form-group {{ $errors->has('primaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('primaryNumber', trans('messages.PRIMARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('primaryNumber', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('primaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('secondaryNumber') ? 'has-error' : ''}}">
                    {!! Form::label('secondaryNumber', trans('messages.SECONDARY_MOBILE'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('secondaryNumber', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('secondaryNumber', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('emailAddress') ? 'has-error' : ''}}">
                    {!! Form::label('emailAddress', trans('messages.EMAIL'), ['class' => 'col-sm-5  control-label']) !!}
                    <div class="col-sm-7">
                        {!! Form::text('emailAddress', null, ['class' => 'form-control','required' => 'required']) !!}
                        {!! $errors->first('emailAddress', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('principalName') ? 'has-error' : ''}}">
                {!! Form::label('principalName', trans('messages.SCHOOL_PRINCIPAL_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			  <div class="form-group {{ $errors->has('principalMobile') ? 'has-error' : ''}}">
                {!! Form::label('principalMobile', trans('messages.SCHOOL_PRINCIPAL_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalMobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('principalEmail') ? 'has-error' : ''}}">
                {!! Form::label('principalEmail', trans('messages.SCHOOL_PRINCIPAL_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('principalEmail', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('principalEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('firstCoordinatorName') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorName',trans('messages.SCHOOL_FIRST_COORDINATOR_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorMobile', trans('messages.SCHOOL_FIRST_COORDINATOR_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorMobile', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('firstCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('firstCoordinatorEmail', trans('messages.SCHOOL_FIRST_COORDINATOR_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('firstCoordinatorEmail', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group {{ $errors->has('secondCoordinator') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinator', trans('messages.SCHOOL_SECOND_COORDINATOR_NAME'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinator', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinator', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('secondCoordinatorMobile') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorMobile', trans('messages.SCHOOL_SECOND_COORDINATOR_MOBILE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinatorMobile', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinatorMobile', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('secondCoordinatorEmail') ? 'has-error' : ''}}">
                {!! Form::label('secondCoordinatorEmail', trans('messages.SCHOOL_SECOND_COORDINATOR_EMAIL'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('secondCoordinatorEmail', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('secondCoordinatorEmail', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('PMOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PMOExamDate', trans('messages.SCHOOL_PMO_EXAM_DATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7  input-group date">
                    {!! Form::text('PMOExamDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PMOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('PSOExamDate') ? 'has-error' : ''}}">
                {!! Form::label('PSOExamDate', trans('messages.SCHOOL_PSO_EXAM_DATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7  input-group date">
                    {!! Form::text('PSOExamDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('PSOExamDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolcode') ? 'has-error' : ''}}">
                {!! Form::label('schoolcode', trans('messages.SCHOOL_SCHOOL_CODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolcode', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolcode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', trans('messages.SCHOOL_TEAM_CODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('teamCode', $team, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('employeeCode') ? 'has-error' : ''}}">
                {!! Form::label('employeeCode', trans('messages.SCHOOL_EMPLOYEE_CODE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('employeeCode',$employee, null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('employeeCode', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('schoolTotalStrength') ? 'has-error' : ''}}">
                {!! Form::label('schoolTotalStrength', trans('messages.SCHOOL_TOTAL_STRENGTH'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('schoolTotalStrength', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('schoolTotalStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('classStrength') ? 'has-error' : ''}}">
                {!! Form::label('classStrength', trans('messages.SCHOOL_CLASS_3_TO_10'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('classStrength', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('classStrength', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('followUpDate') ? 'has-error' : ''}}">
                {!! Form::label('followUpDate', trans('messages.SCHOOL_FOLLOW_UPDATE'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7  input-group date">
                    {!! Form::text('followUpDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('followUpDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('callStatus') ? 'has-error' : ''}}">
                {!! Form::label('callStatus', trans('messages.SCHOOL_CALL_STATUS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::select('callStatus',['1'=>'Cold Call','2'=>'Warm Call','3'=>'Hot Call'],null,['class' => 'form-control', 'required' => 'required','placeholder'=>'Select call status']) !!}
                    {!! $errors->first('callStatus', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('posterDistributed') ? 'has-error' : ''}}">
                {!! Form::label('posterDistributed', trans('messages.SCHOOL_POSTER_DISTRIBUTED'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('posterDistributed', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('posterDistributed', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('KMS') ? 'has-error' : ''}}">
                {!! Form::label('KMS', trans('messages.SCHOOL_KMS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::text('KMS', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('KMS', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('remarks') ? 'has-error' : ''}}">
                {!! Form::label('remarks', trans('messages.SCHOOL_REMARKS'), ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-7">
                    {!! Form::textarea('remarks', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('remarks', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.CREATE'), ['class' => 'btn btn-primary form-control']) !!}
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

