@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

    <h1>City {{ $city->id }}
        <a href="{{ url('citys/' . $city->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit City"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['citys', $city->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete City',
                    'onclick'=>'return confirm("Do you really  want to delete this?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $city->id }}</td>
                </tr>
                <tr><th> State Id </th><td> {{ $city->state_id }} </td></tr><tr><th> District Id </th><td> {{ $city->district_id }} </td></tr><tr><th> CityName </th><td> {{ $city->cityName }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
