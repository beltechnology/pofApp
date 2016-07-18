@extends('layouts.header')

@section('content')
 <div class=" col-md-9 category">
    {!! Form::model($bookdetail, [
        'method' => 'PATCH',
        'url' => ['/book-details', $bookdetail->entityId],
        'class' => 'form-horizontal'
    ]) !!}
  <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
       <li><a href="{{ url('/schools/'.session()->get('entityId').'/edit') }}"> School Profile </a></li>
      <li  class="active"><a href="{{ url('/book-details/'.session()->get('entityId').'/edit') }}"> Book Detail </a></li>
      <li><a href="{{ url('/student-count/'.session()->get('entityId').'/edit') }}"> No. of students from school </a></li>
      <li ><a href="{{ url('/payments/'.session()->get('entityId').'/edit') }}"> Payment Mode </a></li>
	  <li ><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}">Fees</a></li>
	  <li><a href="{{ url('/student/'.session()->get('entityId').'/edit') }}">Student Registration</a></li>
    </ul>
  </div>
</nav>

	</div>
     <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/schools/'.$bookdetail->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> School Profile </a></h1>
      <h1 class="text-center col-md-4">Book Detail</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
 <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>Class</th>
					<th>No. of Books in first visit PMO </th>
					<th> No. of Books in first visit PSO</th>
					<th>No. of Books in last visit PMO </th>
					<th> No. of Books in last visit PSO</th>
					<th>Return Books</th>
					<th>Other</th>
					<th>Total</th>
                </tr>
            </thead>
			<tbody>
            @foreach($bookdetails as $item)
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
					<td>Total</td>
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

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
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
    $(".noofBookLastVisitPMOTotal").val(noofBookLastVisitPMOTotal);
	
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