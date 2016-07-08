@extends('layouts.app')

@section('content')
<div class="container">

    <h1>schoole {{ $schoole->id }}
        <a href="{{ url('schooles/' . $schoole->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit schoole"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['schooles', $schoole->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete schoole',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $schoole->id }}</td>
                </tr>
                <tr><th> Session </th><td> {{ $schoole->session }} </td></tr><tr><th> DistributionDate </th><td> {{ $schoole->distributionDate }} </td></tr><tr><th> ClossingDate </th><td> {{ $schoole->clossingDate }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
