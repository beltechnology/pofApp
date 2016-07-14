@extends('layouts.header')

@section('content')
 <div class=" col-md-9 category">
    {!! Form::model($bookdetail, [
        'method' => 'PATCH',
        'url' => ['/book-details', $bookdetail->entityId],
        'class' => 'form-horizontal'
    ]) !!}
	<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th><a href="{{ url('/schools/'.$bookdetail->entityId.'/edit') }}"> School Profile </a> </th>
					<th><a href="{{ url('/book-details/'.$bookdetail->entityId.'/edit') }}"> Book Detail </a>  </th>
					<th> <a href="#"> No. of students from school </a></th>
					<th> <a href="#"> Payment Mode </a></th>
                </tr>
            </thead>
			</table>
	</div>
	 <h1>Edit BookDetail {{ $bookdetail->entityId }}</h1>
 <div class="row create-emp-list">
 
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
					<td> {!! Form::number('noofBookFirstVisitPMO[]', $item->noofBookFirstVisitPMO, ['class' => 'form-control']) !!} </td>
					<td> {!! Form::number('noofBookFirstVisitPSO[]', $item->noofBookFirstVisitPSO, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPMO[]', $item->noofBookLastVisitPMO, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPSO[]', $item->noofBookLastVisitPSO, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('returnBook[]', $item->returnBook, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('other[]',$item->other, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('total',$item->total, ['class' => 'form-control']) !!}</td>
                </tr>
			@endforeach
				 <tr>
					<td>Total</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!} </td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('entityId', null, ['class' => 'form-control']) !!}</td>
                </tr>
            </body>
			</table>
	</div>
	</div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection