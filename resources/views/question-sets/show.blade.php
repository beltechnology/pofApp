@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">

    <h1>questionSet {{ $questionset->id }}
        <a href="{{ url('question-sets/' . $questionset->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit questionSet"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['questionsets', $questionset->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete questionSet',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $questionset->id }}</td>
                </tr>
                <tr><th> Setid </th><td> {{ $questionset->setid }} </td></tr><tr><th> SetName </th><td> {{ $questionset->setName }} </td></tr><tr><th> SessionId </th><td> {{ $questionset->sessionId }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
