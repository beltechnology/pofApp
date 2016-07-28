@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
    <h1 class="text-left"><a href="{{ url('/locations') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.LOCATION_LIST') }} </a></h1>
    <hr/>
	<div class="row">
    {!! Form::open(['url' => '/locations', 'class' => 'form-horizontal']) !!}
        <div class=" col-md-6 create-emp-list">
			{!! Form::hidden('state',$value=session()->get('currentStateId'),['id' => 'state'])  !!}
			 <div class="form-group {{ $errors->has('district') ? 'has-error' : ''}}">
                {!! Form::label('district', trans('messages.DISTRICT'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
				{!! Form::select('district',$districts,null,['class' => 'form-control stateSelect','placeholder' => 'Select a District','id' => 'district']) !!} 
					 
					 {!! $errors->first('district', '<p class="help-block">:message</p>') !!}
                </div>
            </div>   		  
			<div class="form-group {{ $errors->has('city') ? 'has-error' : ''}}">
                {!! Form::label('city', trans('messages.CITY'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
					<select id="city" class="form-control " name="city">
					 <option >Select a City </option>
					<option value=""></option>
					</select>
					 {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
                <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', trans('messages.NAME_LOCATION'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('location', null, ['class' => 'form-control', 'required' => 'required','maxlength'=>'95']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
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

   
</div>
</div>
<script>
$('#district').on('change', function(e){
        console.log(e);
        var dist_id = e.target.value;
        $.get('{{ url('locations') }}/create/district?dist_id=' + dist_id, function(data) {
            console.log(data);
            $('#city').empty();
            $.each(data, function(index,subCatObj){
                $('#city').append('<option value="'+subCatObj.id+'">'+subCatObj.cityName+'</option>');
            });
        });
    });
</script>
@endsection