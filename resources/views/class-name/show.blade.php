@extends('layouts.app')

@section('content')
<div class="container">

    <h1>ClassName {{ $classname->id }}
        <a href="{{ url('class-name/' . $classname->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ClassName"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['classname', $classname->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete ClassName',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $classname->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $classname->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
