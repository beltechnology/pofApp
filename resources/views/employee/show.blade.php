@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
    <h1>employee {{ $employee->employeeId }}
        <a href="{{ url('employee/' . $employee->employeeId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit employee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['employee', $employee->employeeId],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete employee',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $employee->employeeId }}</td>
                </tr>
                <tr><th> EmployeeId </th><td> {{ $employee->employeeId }} </td></tr><tr><th> EntityId </th><td> {{ $employee->entityId }} </td></tr><tr><th> DateOfJoining </th><td> {{ $employee->dateOfJoining }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
