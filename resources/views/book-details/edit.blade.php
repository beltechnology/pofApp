@extends('layouts.header')
@section('content')
 <div class=" col-md-10 category">
    {!! Form::model($bookdetail, [
        'method' => 'PATCH',
        'url' => ['/book-details', $bookdetail->entityId],
        'class' => 'form-horizontal'
    ]) !!}
  <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
@foreach ($articles as $article)
		@if($article->moduleType == trans('messages.TWO'))	
			@if($article->muduleLink == "/book-details")
				<li  class="active"><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }}</a></li>
			@elseif($article->muduleLink == "/student")
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
	 <h1 class="text-left col-md-4"><a href="{{ url('/schools/'.$bookdetail->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x">  {{ trans('messages.TABS_SCHOOL_PROFILE') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.TABS_BOOK_DETAIL') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
	  <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
 <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
					<th>{{ trans('messages.BOOKDETAIL_NO_OF_BOOKS_IN_FIRST_VISIT_PMO') }}</th>
					<th> {{ trans('messages.BOOKDETAIL_NO_OF_BOOKS_IN_FIRST_VISIT_PSO') }}</th>
					<th>{{ trans('messages.BOOKDETAIL_NO_OF_BOOKS_IN_LAST_VISIT_PMO') }}</th>
					<th> {{ trans('messages.BOOKDETAIL_NO_OF_BOOKS_IN_LAST_VISIT_PSO') }}</th>
					<th>{{ trans('messages.BOOKDETAIL_RETURN_BOOKS') }}</th>
					<th>{{ trans('messages.BOOKDETAIL_OTHER') }}</th>
					<th>{{ trans('messages.BOOKDETAIL_TOTAL') }}</th>
                </tr>
            </thead>
			<tbody>
            @foreach($bookdetails as $item)
			{!! Form::hidden('updateCounter', null, ['class' => 'form-control'],['name'=>'updateCounter']) !!}
                <tr>
					<td>{!! Form::hidden('classId[]', $item->classId, ['class' => '','readonly'=>'readonly']) !!}
							
					{!! Form::label('name', $item->name, ['class' => '','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('noofBookFirstVisitPMO[]', $item->noofBookFirstVisitPMO, ['class' => 'form-control noofBookFirstVisitPMO','min'=>'0']) !!} </td>
					<td> {!! Form::number('noofBookFirstVisitPSO[]', $item->noofBookFirstVisitPSO, ['class' => 'form-control noofBookFirstVisitPSO','min'=>'0']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPMO[]', $item->noofBookLastVisitPMO, ['class' => 'form-control noofBookLastVisitPMO','min'=>'0']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPSO[]', $item->noofBookLastVisitPSO, ['class' => 'form-control noofBookLastVisitPSO','min'=>'0']) !!}</td>
					<td> {!! Form::number('returnBook[]', $item->returnBook, ['class' => 'form-control returnBook','min'=>'0']) !!}</td>
					<td> {!! Form::number('other[]',$item->other, ['class' => 'form-control other','min'=>'0']) !!}</td>
					<td> {!! Form::number('total[]',$item->total, ['class' => 'form-control readonlyClass','min'=>'0','readonly'=>'readonly']) !!}</td>
                </tr>
			@endforeach
				 <tr>
					<td>{{ trans('messages.BOOKDETAIL_TOTAL') }}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control noofBookFirstVisitPMOTotal','readonly'=>'readonly']) !!} </td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control noofBookFirstVisitPSOTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control noofBookLastVisitPMOTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control noofBookLastVisitPSOTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control returnBookTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control otherTotal','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control readonlyClassTotal','readonly'=>'readonly']) !!}</td>
                </tr>
            </tbody>
			</table>
	</div>
	
	<div class=" col-md-12 button-group">
    <div class="form-group">
        <div class=" team_btn">
             {!! Form::reset(trans('messages.CANCEL_BTN'), ['class' => 'btn btn-primary ']) !!}
            {!! Form::submit(trans('messages.SUBMIT_BTN'), ['class' => 'btn btn-primary ']) !!}
        </div>
    </div>
	</div>

    <!--<div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit(trans('messages.UPDATE') , ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>-->
	
    {!! Form::close() !!}
</div>
<script>
$(document).ready(function(){
	
$("form input").on("change keyup mouseup", function(){
	var ele =$(this).parent().parent();
	var eleLength =$(ele).find('input').length;
	var total =0;
	for(var i=1;i<eleLength-1;i++)
	{
		totalval = parseInt($(ele).find('input').eq(i).val());
		total = parseInt(totalval)+parseInt(total);
	}
	var returnBook = parseInt($(ele).find('input').eq(eleLength-3).val());
	returnBook = parseInt(returnBook)+parseInt(returnBook);
	total = parseInt(total) - parseInt(returnBook);
	 $(ele).find('.readonlyClass').val(total);
});

// start noofBookFirstVisitPMO Total
    var noofBookFirstVisitPMOTotal = 0;
    $('.noofBookFirstVisitPMO').each(function() {
        noofBookFirstVisitPMOTotal += Number($(this).val());
    });
    $(".noofBookFirstVisitPMOTotal").val(noofBookFirstVisitPMOTotal);
	
	
	
	$("form input").on("change keyup mouseup", function(){
		var noofBookFirstVisitPMOTotal = 0;
		$('.noofBookFirstVisitPMO').each(function() {
        noofBookFirstVisitPMOTotal += Number($(this).val());
		});
		$(".noofBookFirstVisitPMOTotal").val(noofBookFirstVisitPMOTotal);
	});
// 1. end noofBookFirstVisitPMO Total	


// 2.start noofBookFirstVisitPSO Total
    var noofBookFirstVisitPSOTotal = 0;
    $('.noofBookFirstVisitPSO').each(function() {
        noofBookFirstVisitPSOTotal += Number($(this).val());
    });
    $(".noofBookFirstVisitPSOTotal").val(noofBookFirstVisitPSOTotal);
	
	
	
	$("form input").on("change keyup mouseup", function(){
		var noofBookFirstVisitPSOTotal = 0;
		$('.noofBookFirstVisitPSO').each(function() {
        noofBookFirstVisitPSOTotal += Number($(this).val());
		});
		$(".noofBookFirstVisitPSOTotal").val(noofBookFirstVisitPSOTotal);
	});
// end noofBookFirstVisitPSO Total	


// 3. start noofBookLastVisitPMO Total
    var noofBookLastVisitPMOTotal = 0;
    $('.noofBookLastVisitPMO').each(function() {
       noofBookLastVisitPMOTotal += Number($(this).val());
    });
    $(".noofBookLastVisitPMOTotal").val(noofBookLastVisitPMOTotal);
	
	$("form input").on("change keyup mouseup", function(){
		var noofBookLastVisitPMOTotal = 0;
		$('.noofBookLastVisitPMO').each(function() {
        noofBookLastVisitPMOTotal += Number($(this).val());
		});
		$(".noofBookLastVisitPMOTotal").val(noofBookLastVisitPMOTotal);
	});
// end noofBookFirstVisitPSO Total	

	
// 4. start noofBookLastVisitPSO Total
    var noofBookLastVisitPSOTotal = 0;
    $('.noofBookLastVisitPSO').each(function() {
       noofBookLastVisitPSOTotal += Number($(this).val());
    });
    $(".noofBookLastVisitPSOTotal").val(noofBookLastVisitPSOTotal);
	
	$("form input").on("change keyup mouseup", function(){
		var noofBookLastVisitPSOTotal = 0;
		$('.noofBookLastVisitPSO').each(function() {
        noofBookLastVisitPSOTotal += Number($(this).val());
		});
		$(".noofBookLastVisitPSOTotal").val(noofBookLastVisitPSOTotal);
	});
// end noofBookLastVisitPSO Total	

// 5. start returnBook Total

    var returnBookTotal = 0;
    $('.returnBook').each(function() {
       returnBookTotal += Number($(this).val());
    });
    $(".returnBookTotal").val(returnBookTotal);
	
	$("form input").on("change keyup mouseup", function(){
		var returnBookTotal = 0;
		$('.returnBook').each(function() {
        returnBookTotal += Number($(this).val());
		});
		$(".returnBookTotal").val(returnBookTotal);
	});
// end returnBook Total	

// 6. start other Total

    var otherTotal = 0;
    $('.other').each(function() {
       otherTotal += Number($(this).val());
    });
    $(".otherTotal").val(otherTotal);
	
	$("form input").on("change keyup mouseup", function(){
		var otherTotal = 0;
		$('.other').each(function() {
        otherTotal += Number($(this).val());
		});
		$(".otherTotal").val(otherTotal);
	});
// end returnBook Total	

// 7. start  Total

    var Total = 0;
    $('.readonlyClass').each(function() {
       Total += Number($(this).val());
    });
    $(".readonlyClassTotal").val(Total);
	
	$("form input").on("change keyup mouseup", function(){
		var Total = 0;
		$('.readonlyClass').each(function() {
        Total += Number($(this).val());
		});
		$(".readonlyClassTotal").val(Total);
	});
// end returnBook Total	

	
});

</script>
@endsection