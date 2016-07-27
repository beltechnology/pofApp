@extends('layouts.app')

@section('content')
<div class="container">

    <h1>firstLevel {{ $firstlevel->id }}
        <a href="{{ url('first-level/' . $firstlevel->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit firstLevel"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['firstlevel', $firstlevel->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete firstLevel',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $firstlevel->id }}</td>
                </tr>
                <tr><th> EntityId </th><td> {{ $firstlevel->entityId }} </td></tr><tr><th> SchoolId </th><td> {{ $firstlevel->schoolId }} </td></tr><tr><th> SessionYear </th><td> {{ $firstlevel->sessionYear }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
