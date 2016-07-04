@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
         <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>Employee Creation</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
            
            <div class="row">
          
          <div class="styled-select blue semi-square col-md-2">
  			<select>
    		<option>Select Employee Name</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
        
         <div class="styled-select blue semi-square select-location col-md-2">
  			<select>
    		<option>Select Location</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
         <div class="styled-select blue semi-square school-name col-md-2">
  			<select>
    		<option>School Name</option>
    		<option>The second option</option>
    		<option>The third option</option>
            <option>The Fourth option</option>
    		<option>The Fifth option</option>
            <option>The Six option</option>
    		<option>The Seven option</option>
            <option>The Eight option</option>
    		<option>The Nine option</option>
  			</select>
		</div>
        
    		</div>  
            
          
            
            </div>
            
            <div class="add-emp col-md-2">
            <a href="{{ url('/employee/create') }}"><p>Add <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
            
            </div>
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
					<td width="110">{{ $item->primaryNumber }}</td>
					<td width="200">{{ $item->addressLine1 }}</td>
					<td width="105">{{ $item->email }}</td>
                    <td width="120">
                        <!--<a href="{{ url('/employee/' . $item->employeeId) }}" class="btn  btn-xs" title="View employee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>-->
                        <a href="{{ url('/employee/' . $item->entityId . '/edit') }}" class="btn  btn-xs" title="Edit employee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/employee', $item->entityId],
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
