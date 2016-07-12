@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
<div class="row">
	 <h1 class="text-left"><a href="{{ url('/citys') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.CITY_LIST') }} </a></h1>
    <hr/>

    {!! Form::open(['url' => '/citys', 'class' => 'form-horizontal']) !!}
<div class=" col-md-6 create-emp-list">
			{!! Form::hidden('state_id',$value=session()->get('currentStateId'),['id' => 'state'])  !!}
             
				 <div class="form-group {{ $errors->has('district_id') ? 'has-error' : ''}}">
                {!! Form::label('district_id', trans('messages.DISTRICT'), ['class' => 'col-sm-4  control-label']) !!}
                <div class="col-sm-8">
				{!! Form::select('district_id',$districts,null,['class' => 'form-control stateSelect','placeholder' => 'Select a District','id' => 'district']) !!} 
					 
					 {!! $errors->first('district_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>  
				
            
            <div class="form-group {{ $errors->has('cityName') ? 'has-error' : ''}}">
                {!! Form::label('cityName', trans('messages.NAME_CITY'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('cityName', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('cityName', '<p class="help-block">:message</p>') !!}
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
    $('#state').on('change', function(e){
        console.log(e);
        var state_id = $("#state").val();
        $.get('{{ url('citys') }}/create/ajax-state?state_id=' + state_id, function(data) {
            console.log(data);
            $('#district').empty();
            $.each(data, function(index,subCatObj){
                $('#district').append('<option value="'+subCatObj.id+'">'+subCatObj.name+'</option>');
            });
        });
    });
</script>
@endsection