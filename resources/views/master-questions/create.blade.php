@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
	<div class="edit_school">	
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
    	<ul class="nav navbar-nav">
	 @foreach ($articles as $article)
		@if($article->moduleType ==  trans('messages.THREE'))	
			@if($article->muduleLink === "/master-questions")
				<li  class="active"><a  href="{{ url($article->muduleLink) }}">{{ $article->name }}</a></li>
			@else
				<li><a  href="{{ url($article->muduleLink) }}">{{ $article->name }} </a></li>
			@endif
		@endif
        @endforeach 		
    </ul>
  </div>
</nav>

	</div>
<div class="row">
    {!! Form::open(['url' => '/master-questions', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
    			<div class=" col-md-12 create-emp-list">      
                     
            <div class="form-group {{ $errors->has('employeeName') ? 'has-error' : ''}}">
                <div class="col-sm-4"><label>Upload Questions</label></div>
                <div class="col-sm-8">
                    {!! Form::file('import_file', null, ['class' => 'form-control','required' => 'required','maxlength'=>'190']) !!}
                </div>
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
