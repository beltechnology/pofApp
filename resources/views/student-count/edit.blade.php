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
      <li><a href="{{ url('/schools/'.$studentcount->entityId.'/edit') }}"> School Profile </a></li>
      <li><a href="{{ url('/book-details/'.$studentcount->entityId.'/edit') }}"> Book Detail </a></li>
      <li class="active"><a href="{{ url('/student-count/'.$studentcount->entityId.'/edit') }}"> No. of students from school </a></li>
     <!-- <li><a href="#"> Payment Mode </a></li>-->
    </ul>
  </div>
</nav>

	</div>
     <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/book-details/'.$studentcount->entityId.'/edit') }}" class="fa fa-angle-left  fa-2x"> Book Detail </a></h1>
      <h1 class="text-center col-md-4">Students Strength</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
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