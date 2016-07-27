@extends('layouts.app')

@section('content')
<div class="container">

    <h1>District {{ $district->id }}
        <a href="{{ url('district/' . $district->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit District"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['district', $district->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete District',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $district->id }}</td>
                </tr>
                <tr><th> State Id </th><td> {{ $district->state_id }} </td></tr><tr><th> Name </th><td> {{ $district->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
