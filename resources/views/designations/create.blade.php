@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
 <h1 class="text-left"><a href="{{ url('/designations') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.DESIGNATION_LIST') }} </a></h1>
    <hr/>
	<div class="row">
    {!! Form::open(['url' => '/designations', 'class' => 'form-horizontal']) !!}
	                {!! Form::hidden('designationsId',\DB::table('designations')->max('id')+1, null, ['class' => 'form-control','required' => 'required'],['name'=>'designationsId']) !!}
		<div class=" col-md-6 create-emp-list">
                <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', trans('messages.NAME_DESIGNATION'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('designation', null, ['class' => 'form-control', 'required' => 'required','maxlenght'=>'200']) !!}
                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="row">
			    @foreach ($module_configs as $module)
			<div class="form-group>
				<label class="col-sm-3 control-label">{{$module->name}}</label>
                <div class="col-sm-3">
					<input type="checkbox" name="active{{$module->id}}" value="Y" />
                    <input type="hidden" name="id[]" value="{{$module->id}}" />
                </div>
                </div>
				@endforeach
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
@endsection