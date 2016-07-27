@extends('layouts.app')

@section('content')
<div class="container">

    <h1>student {{ $student->id }}
        <a href="{{ url('student/' . $student->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit student"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['student', $student->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete student',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $student->id }}</td>
                </tr>
                <tr><th> StudentName </th><td> {{ $student->studentName }} </td></tr><tr><th> FatherName </th><td> {{ $student->fatherName }} </td></tr><tr><th> Dob </th><td> {{ $student->dob }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
