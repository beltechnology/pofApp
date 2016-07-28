@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">
<h1 class="text-left"><a href="{{ url('/designations') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.DESIGNATION_LIST') }} </a></h1>
    <hr/>
	<div class="row">
    {!! Form::model($designation, [
        'method' => 'PATCH',
        'url' => ['/designations', $designation->id],
        'class' => 'form-horizontal'
    ]) !!}
		<div class=" col-md-6 create-emp-list">
		 {!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
                <div class="form-group {{ $errors->has('designation') ? 'has-error' : ''}}">
                {!! Form::label('designation', trans('messages.NAME_DESIGNATION'), ['class' => 'col-sm-4 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('designation', null, ['class' => 'form-control', 'required' => 'required','maxlenght'=>'200']) !!}
                    {!! $errors->first('designation', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			 <div class="row">
			    @foreach ($module_configs as $module)
				 <?php $x=0;?>
				@foreach ($usermodule as $usermoduleData)
					@if ($module->id === $usermoduleData->moduleId)
						 <?php $x++;?>
				<div class="form-group>
				<label class="col-sm-3 control-label">{{$module->name}}</label>
                <div class="col-sm-3">
						@if ($usermoduleData->active === "Y")	
							<input type="checkbox" name="active{{$module->id}}" checked="checked" value="Y" />
							<input type="hidden" name="id[]" value="{{$module->id}}" />
						@else
							<input type="checkbox" name="active{{$module->id}}" value="Y" />
							<input type="hidden" name="id[]" value="{{$module->id}}" />	
						@endif
					</div>
					</div>
					@endif
					@endforeach
					
					@if($x === 0 )
				<div class="form-group>
				<label class="col-sm-3 control-label">{{$module->name}}</label>
                <div class="col-sm-3">
						<input type="checkbox" name="createActive[]" value="Y" />
						<input type="hidden" name="CreateId[]" value="{{$module->id}}" />	
				</div>
				</div>
					@endif
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