@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Location {{ $location->id }}
        <a href="{{ url('locations/' . $location->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Location"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['locations', $location->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Location',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $location->id }}</td>
                </tr>
                <tr><th> Location </th><td> {{ $location->location }} </td></tr><tr><th> Deleted </th><td> {{ $location->deleted }} </td></tr><tr><th> Status </th><td> {{ $location->status }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
