@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">

    <h1>ModuleConfig {{ $moduleconfig->id }}
        <a href="{{ url('module-config/' . $moduleconfig->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit ModuleConfig"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['moduleconfig', $moduleconfig->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete ModuleConfig',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $moduleconfig->id }}</td>
                </tr>
                <tr><th> DesignationId </th><td> {{ $moduleconfig->designationId }} </td></tr><tr><th> ModuleType </th><td> {{ $moduleconfig->moduleType }} </td></tr><tr><th> Name </th><td> {{ $moduleconfig->name }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
