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
      <li><a href="{{ url('/schools/'.$bookdetail->entityId.'/edit') }}"> School Profile </a></li>
      <li class="active"><a href="{{ url('/book-details/'.$bookdetail->entityId.'/edit') }}"> Book Detail </a></li>
      <li><a href="{{ url('/student-count/'.$bookdetail->entityId.'/edit') }}"> No. of students from school </a></li>
    <li><a href="{{ url('/payments/'.$bookdetail->entityId.'/edit') }}"> Payment Mode </a></li>
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
					<td> {!! Form::number('noofBookFirstVisitPMO[]', $item->noofBookFirstVisitPMO, ['class' => 'form-control','min'=>'0']) !!} </td>
					<td> {!! Form::number('noofBookFirstVisitPSO[]', $item->noofBookFirstVisitPSO, ['class' => 'form-control','min'=>'0']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPMO[]', $item->noofBookLastVisitPMO, ['class' => 'form-control','min'=>'0']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPSO[]', $item->noofBookLastVisitPSO, ['class' => 'form-control','min'=>'0']) !!}</td>
					<td> {!! Form::number('returnBook[]', $item->returnBook, ['class' => 'form-control','min'=>'0']) !!}</td>
					<td> {!! Form::number('other[]',$item->other, ['class' => 'form-control','min'=>'0']) !!}</td>
					<td> {!! Form::number('total[]',$item->total, ['class' => 'form-control','min'=>'0','readonly'=>'readonly']) !!}</td>
                </tr>
			@endforeach
				 <tr>
					<td>Total</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!} </td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('TOTAL', null, ['class' => 'form-control','readonly'=>'readonly']) !!}</td>
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
	 $(ele).find('input:last').val(total);
});
	
	
});

</script>
@endsection