@extends('layouts.app')

@section('content')
<div class="container">

    <h1>BookDetail {{ $bookdetail->id }}
        <a href="{{ url('book-details/' . $bookdetail->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit BookDetail"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['bookdetails', $bookdetail->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete BookDetail',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $bookdetail->id }}</td>
                </tr>
                <tr><th> EntityId </th><td> {{ $bookdetail->entityId }} </td></tr><tr><th> ClassId </th><td> {{ $bookdetail->classId }} </td></tr><tr><th> SchoolId </th><td> {{ $bookdetail->schoolId }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
