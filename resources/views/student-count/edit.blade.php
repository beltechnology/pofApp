@extends('layouts.header')

@section('content')
    <div class=" col-md-9 category">


    {!! Form::model($studentcount, [
        'method' => 'PATCH',
        'url' => ['/student-count', $studentcount->entityId],
        'class' => 'form-horizontal'
    ]) !!}

               <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th><a href="{{ url('/schools/'.$studentcount->entityId.'/edit') }}"> School Profile </a> </th>
					<th><a href="{{ url('/book-details/'.$studentcount->entityId.'/edit') }}"> Book Detail </a>  </th>
					<th> <a href="{{ url('/student-count/'.$studentcount->entityId.'/edit') }}"> No. of students from school </a></th>
					<th> <a href="#"> Payment Mode </a></th>
                </tr>
            </thead>
			</table>
	</div>
	  <h1>Edit studentCount {{ $studentcount->entityId }}</h1>
	  <div class="row create-emp-list">
 
 <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>Class</th>
					<th>No. of Students PMO </th>
					<th>No. of Students PSO</th>
					<th>Handicapped</th>
                </tr>
            </thead>
			<tbody>
            @foreach($studentcounts as $item)
                <tr>
					<td>{!! Form::hidden('classId[]', $item->classId, ['class' => '','readonly'=>'readonly']) !!}
					{!! Form::label('name', $item->name, ['class' => '','readonly'=>'readonly']) !!}</td>
					<td> {!! Form::number('noofstudentPMO[]', $item->noofstudentPMO, ['class' => 'form-control']) !!} </td>
					<td> {!! Form::number('noofstudentPSO[]', $item->noofstudentPSO, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('handicapped[]', $item->handicapped, ['class' => 'form-control']) !!}</td>
                </tr>
			@endforeach
				 <tr>
					<td>Total No. of Students</td>
					<td> {!! Form::number('totalnoofstudentPMO', null, ['class' => 'form-control']) !!} </td>
					<td> {!! Form::number('totalnoofstudentPSO', null, ['class' => 'form-control']) !!}</td>
					<td> {!! Form::number('totalhandicapped', null, ['class' => 'form-control']) !!}</td>
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
@endsection