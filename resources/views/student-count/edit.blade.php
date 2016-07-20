@extends('layouts.header')

@section('content')
    <div class=" col-md-9 category">


    {!! Form::model($studentcount, [
        'method' => 'PATCH',
        'url' => ['/student-count', $studentcount->entityId],
        'class' => 'form-horizontal'
    ]) !!}

           <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
       <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_SCHOOL_PROFILE') }} </a></li>
      <li><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_BOOK_DETAIL') }}</a></li>
      <li class="active"><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_NO_OF_STUDENTS_FROM_SCHOOL') }}</a></li>
      <li ><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_PAYMENT_MODE') }}</a></li>
	  <li ><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FEES') }}</a></li>
	  <li><a href="{{ url('/student/') }}">{{ trans('messages.TABS_STUDENT_REGISTRATION') }}</a></li>
	  <li><a href="{{ url('/first-level/'.session()->get('entityId').'/edit') }}">{{ trans('messages.TABS_FIRST_LEVEL_EXAM_TIME') }}</a></li>
    </ul>
  </div>
</nav>

	</div>
     <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/book-details/'.$studentcount->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_BOOK_DETAIL') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.STUDENTS_STRENGTH') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	  <div class="row create-emp-list">
 
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
                <tr>
					<td>{!! Form::hidden('classId[]', $item->classId, ['class' => '','readonly'=>'readonly']) !!}
					{!! Form::label('name', $item->name, ['class' => '','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('noofstudentPMO[]', $item->noofstudentPMO, ['class' => 'form-control noofstudentPMO']) !!} </td>
					<td> {!! Form::number('noofstudentPSO[]', $item->noofstudentPSO, ['class' => 'form-control noofstudentPSO']) !!}</td>
					<td> {!! Form::number('handicapped[]', $item->handicapped, ['class' => 'form-control handicapped']) !!}</td>
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
			</div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE'), ['class' => 'btn btn-primary form-control']) !!}
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