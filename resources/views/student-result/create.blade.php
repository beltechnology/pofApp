@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
    <hr/>
<div class="row">
    {!! Form::open(['url' => '/student-result', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    			<div class=" col-md-12 create-emp-list">      
                     
            <div class="form-group {{ $errors->has('employeeName') ? 'has-error' : ''}}">
                <div class="col-sm-4"><label>Result Questions</label></div>
                <div class="col-sm-8">
                    {!! Form::file('import_file', null, ['class' => 'form-control','required' => 'required','maxlength'=>'190']) !!}
                </div>
            </div>
      
             </div>
			 
            <div class="form-group">
                <div class="col-sm-4"><label></label></div>
                <div class="col-sm-8">
                                       @if($errors->any())
                                    <span class="has-error  help-block" >
                                        <strong class="  help-block">{{$errors->first()}} student Result successfully uploaded </strong>
                                    </span>
                                @endif
                </div>
            </div>

			 <div class=" col-md-6 button-group">
    <div class="form-group">
        <div class=" team_btn">
            {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
    </div>
    {!! Form::close() !!}

</div>
</div>
@endsection
