@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">
         <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.EMPLOYEE_CREATION') }}</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
            
            <div class="row">
          
          <div class="styled-select blue semi-square col-md-2">
  			 {!! Form::select('designation',\DB::table('entitys')->lists('name','entityId'), "Debugging", ['class' => 'form-control stateSelect','id' => 'designation','placeholder' => 'Select Employee Name']) !!}
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
            <a href="{{ url('/employee/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
            
            </div>
        <div class="table">
            <table class="table table-bordered table-striped table-hover" >
            <thead>
      <tr>
        <th><input type="checkbox" id="selectall" />{{ trans('messages.EMPLOYEE_NAME') }}</th>
        <th>{{ trans('messages.EMPLOYEE_ID') }}</th>
        <th>{{ trans('messages.DOB') }}</th>
        <th>{{ trans('messages.CONTACT_NUMBER') }}</th>
        <th>{{ trans('messages.ADDRESS') }}</th>
        <th>{{ trans('messages.EMAIL') }} </th>
        <th>{{ trans('messages.ACTIONS') }}</th>
      </tr>
    </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($employee as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td><input id="box{{$x}}" type="checkbox" />
					{{ $item->name }}</td>
                    <td>{{ $item->employeeId }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->primaryNumber }}</td>
					<td>{{ $item->addressLine1 }}</td>
					<td>{{ $item->email }}</td>
                    <td>
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
