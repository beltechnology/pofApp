@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

   <h1 class="text-left"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_LIST') }} </a></h1>
    <hr/>
<div class="row">
    {!! Form::model($team, [
        'method' => 'PATCH',
        'url' => ['/team', $team->teamId],
        'class' => 'form-horizontal'
    ]) !!}
        <div class=" col-md-6 create-emp-list">
               
            <div class="form-group {{ $errors->has('teamName') ? 'has-error' : ''}}">
                {!! Form::label('teamName', trans('messages.TEAM_NAME'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('teamName', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('teamName', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamLeader') ? 'has-error' : ''}}">
                {!! Form::label('teamLeader', trans('messages.TEAM_LEADER'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                   {!! Form::select('teamLeader',$employee,null, ['class' => 'form-control teamSelect','id' => 'teamSelect']) !!}
                    {!! $errors->first('teamLeader', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamCreationDate') ? 'has-error' : ''}}">
                {!! Form::label('teamCreationDate', trans('messages.TEAM_CREATION_DATE'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('teamCreationDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamCreationDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="form-group {{ $errors->has('teamEndDate') ? 'has-error' : ''}}">
                {!! Form::label('teamEndDate', trans('messages.TEAM_END_DATE'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 input-group date">
                    {!! Form::text('teamEndDate', null, ['class' => 'form-control', 'required' => 'required']) !!}
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    {!! $errors->first('teamEndDate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		</div>	
		<div class="col-md-6 create-emp-list">
				<div class="form-group {{ $errors->has('cityId') ? 'has-error' : ''}}">
                {!! Form::label('cityId', trans('messages.CITY'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					{!! Form::select('cityId',$citys, null, ['class' => 'form-control stateSelect','id' => 'city']) !!}
					 {!! $errors->first('cityId', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
		     <div class="form-group {{ $errors->has('teamLocation') ? 'has-error' : ''}}">
                {!! Form::label('teamLocation', trans('messages.TEAM_LOCATION'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
				{!! Form::select('teamLocation',$locations, null, ['class' => 'form-control stateSelect','id' => 'teamLocation']) !!}
                    {!! $errors->first('teamLocation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
            <div class="form-group {{ $errors->has('teamcode') ? 'has-error' : ''}}">
                {!! Form::label('teamCode', trans('messages.TEAM_CODE'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('teamCode', null, ['class' => 'form-control','readonly' => 'readonly']) !!}
                    {!! $errors->first('teamCode', '<p class="help-block">:message</p>') !!}
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
<script>
 $(document).ready(function(){
        var city_id = $("#city").val();
		var teamLocation = $("#teamLocation").val();
	 $.get('{{ url('team') }}/edit/district?city_id=' + city_id, function(data) {
            console.log(data);
            $('#teamLocation').empty();
            $.each(data, function(index,subCatObj){
                $('#teamLocation').append('<option value="'+subCatObj.id+'">'+subCatObj.location+'</option>');
            });
			$("#city").val(city_id);
			$("#teamLocation").val(teamLocation);
        });

        });	

$('#city').on('change', function(e){
        console.log(e);
        var city_id = e.target.value;
        $.get('{{ url('team') }}/edit/district?city_id=' + city_id, function(data) {
            console.log(data);
            $('#teamLocation').empty();
            $.each(data, function(index,subCatObj){
                $('#teamLocation').append('<option value="'+subCatObj.id+'">'+subCatObj.location+'</option>');
            });
        });
    });
</script>
@endsection