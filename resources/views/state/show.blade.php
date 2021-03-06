@extends('layouts.app')

@section('content')
<div class="container">

    <h1>State {{ $state->id }}
        <a href="{{ url('state/' . $state->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit State"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['state', $state->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete State',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $state->id }}</td>
                </tr>
                <tr><th> Name </th><td> {{ $state->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
