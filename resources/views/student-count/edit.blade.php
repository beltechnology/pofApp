@extends('layouts.header')

@section('content')
    <div class=" col-md-10 category">


    {!! Form::model($studentcount, [
        'method' => 'PATCH',
        'url' => ['/student-count', $studentcount->entityId],
        'class' => 'form-horizontal'
    ]) !!}

           <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
@foreach ($articles as $article)
		@if($article->moduleType === '2')	
			@if($article->muduleLink === "/student-count")
				<li  class="active"><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }}</a></li>
			@elseif($article->muduleLink === "/student")
				<li><a  href="{{ url($article->muduleLink) }}">{{ $article->name }} </a></li>
			@else
				<li><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }} </a></li>
			@endif
		@endif
        @endforeach
    </ul>
  </div>
</nav>

	</div>
     <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/book-details/'.$studentcount->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_BOOK_DETAIL') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.STUDENTS_STRENGTH') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	 
 <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
 <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
					<th>{{ trans('messages.STUDENT_COUNT_NO_OF_STUDENTS_PMO') }}</th>
					<th>{{ trans('messages.STUDENT_COUNT_NO_OF_STUDENTS_PSO') }}</th>
					<th>{{ trans('messages.STUDENT_COUNT_HANDICAPPED') }}</th>
                </tr>
            </thead>
			<tbody>
            @foreach($studentcounts as $item)
				{!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
                <tr>
					<td>{!! Form::hidden('classId[]', $item->classId, ['class' => '','readonly'=>'readonly']) !!}
					{!! Form::label('name', $item->name, ['class' => '','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('noofstudentPMO[]', $item->noofstudentPMO, ['class' => 'form-control noofstudentPMO','min'=>'0']) !!} </td>
					<td> {!! Form::number('noofstudentPSO[]', $item->noofstudentPSO, ['class' => 'form-control noofstudentPSO','min'=>'0']) !!}</td>
					<td> {!! Form::number('handicapped[]', $item->handicapped, ['class' => 'form-control handicapped','min'=>'0']) !!}</td>
                </tr>
			@endforeach
				 <tr>
					<td>{{ trans('messages.STUDENT_COUNT_TOTAL_NO_OF_STUDENTS') }}</td>
					<td> {!! Form::number('totalnoofstudentPMO',$noofstudentPMO, ['class' => 'form-control noofstudentPMOTotal','readonly'=>'readonly']) !!} </td>
					<td> {!! Form::number('totalnoofstudentPSO',$noofstudentPSO, ['class' => 'form-control noofstudentPSOTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('totalhandicapped',$handicapped, ['class' => 'form-control handicappedTotal','readonly'=>'readonly']) !!}</td>
                </tr>
            </body>
			</table>
	</div>
			
			
	<div class=" col-md-12 button-group">
    <div class="form-group">
        <div class=" team_btn count-btn">
             {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
	</div>
			
    <!--<div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>-->
	
    {!! Form::close() !!}

   
</div>
<script>
	$("form input").on("change keyup mouseup", function(){
		var noofstudentPMOTotal = 0;
		$('.noofstudentPMO').each(function() {
        noofstudentPMOTotal += Number($(this).val());
		});
		$(".noofstudentPMOTotal").val(noofstudentPMOTotal);
	});
// end noofstudentPMOTotal Total	
	$("form input").on("change keyup mouseup", function(){
		var noofstudentPSOTotal = 0;
		$('.noofstudentPSO').each(function() {
        noofstudentPSOTotal += Number($(this).val());
		});
		$(".noofstudentPSOTotal").val(noofstudentPSOTotal);
	});
// end noofstudentPSOTotal Total	
	$("form input").on("change keyup mouseup", function(){
		var handicappedTotal = 0;
		$('.handicapped').each(function() {
        handicappedTotal += Number($(this).val());
		});
		$(".handicappedTotal").val(handicappedTotal);
	});
// end handicappedTotal Total	

</script>
@endsection