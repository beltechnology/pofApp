@extends('layouts.app')

@section('content')
<div class="container">

    <h1>school {{ $school->id }}
        <a href="{{ url('schools/' . $school->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit school"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['schools', $school->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete school',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $school->id }}</td>
                </tr>
                <tr><th> SessionYear </th><td> {{ $school->sessionYear }} </td></tr><tr><th> PosterDistributionDate </th><td> {{ $school->posterDistributionDate }} </td></tr><tr><th> ClosingData </th><td> {{ $school->closingData }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
