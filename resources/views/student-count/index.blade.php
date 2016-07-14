@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Studentcount <a href="{{ url('/student-count/create') }}" class="btn btn-primary btn-xs" title="Add New studentCount"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> EntityId </th><th> SchoolId </th><th> ClassId </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($studentcount as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->entityId }}</td><td>{{ $item->schoolId }}</td><td>{{ $item->classId }}</td>
                    <td>
                        <a href="{{ url('/student-count/' . $item->id) }}" class="btn btn-success btn-xs" title="View studentCount"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/student-count/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit studentCount"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/student-count', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete studentCount" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete studentCount',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $studentcount->render() !!} </div>
    </div>

</div>
@endsection
