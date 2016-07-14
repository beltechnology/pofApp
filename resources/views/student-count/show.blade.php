@extends('layouts.app')

@section('content')
<div class="container">

    <h1>studentCount {{ $studentcount->id }}
        <a href="{{ url('student-count/' . $studentcount->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit studentCount"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['studentcount', $studentcount->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete studentCount',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $studentcount->id }}</td>
                </tr>
                <tr><th> EntityId </th><td> {{ $studentcount->entityId }} </td></tr><tr><th> SchoolId </th><td> {{ $studentcount->schoolId }} </td></tr><tr><th> ClassId </th><td> {{ $studentcount->classId }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
