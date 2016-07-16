@extends('layouts.app')

@section('content')
<div class="container">

    <h1>payment {{ $payment->id }}
        <a href="{{ url('payments/' . $payment->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit payment"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['payments', $payment->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete payment',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $payment->id }}</td>
                </tr>
                <tr><th> TeamId </th><td> {{ $payment->teamId }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
