@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

   <h1 class="text-left"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_LIST') }} </a></h1>
    <hr/>
<div class="row">

    {!! Form::open(['url' => '/team', 'class' => 'form-horizontal']) !!}
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
                    {!! Form::select('teamLeader',$employee,null, ['class' => 'form-control teamSelect','placeholder' => 'Select Team Leader','id' => 'teamSelect']) !!}
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
			  
            
	</div>
	<div class=" col-md-6 create-emp-list">
	
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
		<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('messages.CITY'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
				{!! Form::select('city',$citys,null,['class' => 'form-control ','placeholder' => 'Select a City','id' => 'city']) !!} 
				
				{!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
	<div class="form-group {{ $errors->has('teamLocation') ? 'has-error' : ''}}">
                {!! Form::label('teamLocation', trans('messages.TEAM_LOCATION'), ['class' => 'col-sm-4 control-label']) !!}
                  <div class="col-sm-8">
					<select id="teamLocation" class="form-control " name="teamLocation">
					 <option >Select a Location </option>
					<option value=""></option>
					</select>
                    {!! $errors->first('teamLocation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
           
		  
			
            <div class="form-group {{ $errors->has('teamCode') ? 'has-error' : ''}}">
                {!! Form::hidden('teamCode', trans('messages.TEAM_CODE'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8 ">
                    {!! Form::hidden('teamCode', \DB::table('teams')->max('teamId')+1,null,['class' => 'form-control']) !!}
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
$('#city').on('change', function(e){
        console.log(e);
        var city_id = e.target.value;
        $.get('{{ url('team') }}/create/district?city_id=' + city_id, function(data) {
            console.log(data);
            $('#teamLocation').empty();
            $.each(data, function(index,subCatObj){
                $('#teamLocation').append('<option value="'+subCatObj.id+'">'+subCatObj.location+'</option>');
            });
        });
    });
</script>
@endsection