@extends('layouts.header')

@section('content')
 <div class=" col-md-9 category">
    {!! Form::model($bookdetail, [
        'method' => 'PATCH',
        'url' => ['/book-details', $bookdetail->id],
        'class' => 'form-horizontal'
    ]) !!}
	<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th><a href="#"> School Profile </a> </th>
					<th><a href="{{ url('/book-details/'.$bookdetail->entityId.'/edit') }}"> Book Detail </a>  </th>
					<th> <a href="#"> No. of students from school </a></th>
					<th> <a href="#"> Payment Mode </a></th>
                </tr>
            </thead>
			</table>
	</div>
	 <h1>Edit BookDetail {{ $bookdetail->id }}</h1>
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
            @foreach($bookdetail as $item)
                <tr>
					<td>{!! Form::number('classId', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('noofBookFirstVisitPMO', null, ['class' => 'form-control']) !!} </td>
					<td> {!! Form::number('noofBookFirstVisitPSO', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPMO', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('noofBookLastVisitPSO', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('returnBook', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('other', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('total', null, ['class' => 'form-control']) !!}</td>
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

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
</div>
@endsection