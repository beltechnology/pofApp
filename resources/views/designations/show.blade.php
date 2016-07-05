@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
    <h1>Designation {{ $designation->id }}
        <a href="{{ url('designations/' . $designation->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Designation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['designations', $designation->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Designation',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $designation->id }}</td>
                </tr>
                <tr><th> Designation </th><td> {{ $designation->designation }} </td></tr><tr><th> Deleted </th><td> {{ $designation->deleted }} </td></tr><tr><th> Status </th><td> {{ $designation->status }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
