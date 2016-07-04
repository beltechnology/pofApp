@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
    <h1>Employee <a href="{{ url('/employee/create') }}" class="btn btn-primary btn-xs" title="Add New employee"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="main-table col-md">
            <table border="0" bgcolor="#eeeeee">
            <thead bgcolor="#ffffff" style="color:#4b4b4b">
      <tr class="table-heading">
        <th width="200" class="emp-name"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>Employee Name</th>
        <th width="50" class="emp-id">Employee Id</th>
        <th width="80" class="emp-dob">DOB</th>
        <th width="110" class="emp-no">Contact Number</th>
        <th width="200" class="emp-location">Address</th>
        <th width="105" class="emp-team">E-Mail </th>
        <th width="120">Actions</th>
      </tr>
    </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($employee as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td width="200">{{ $item->name }}</td>
                    <td width="50">{{ $item->employeeId }}</td>
					<td width="80">{{ $item->dob }}</td>
					<td width="110">{{ $item->phoneNumber }}</td>
					<td width="200">{{ $item->addressLine1 }}</td>
					<td width="105">{{ $item->email }}</td>
                    <td width="120">
                        <a href="{{ url('/employee/' . $item->employeeId) }}" class="btn  btn-xs" title="View employee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/employee/' . $item->entityId . '/edit') }}" class="btn  btn-xs" title="Edit employee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/employee', $item->employeeId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete employee" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete employee',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      <div class="pagination-wrapper"> {!! $employee->render() !!} </div> 
    </div>

</div>
@endsection
