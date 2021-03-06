@extends('layouts.header')

@section('content')
<div class=" col-md-10 category">

         <div class=" col-md-12 top-filter">
            
            <div class=" col-md-3 category-name">
            <h1>{{ trans('messages.EMPLOYEE_CREATION') }}</h1>
            </div>
            
            <div class=" col-md-7 category-filter">
		<form action="search" method="get" role="search">
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search by Employee Name, School Name and Employee Location" required> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>

            
          
            
            </div>
            
            <div class="add-emp  col-md-2">
            <a href="{{ url('/employee/create') }}"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
            </div>
		 <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>	
        <div class="table">
            <table class="table table-bordered table-striped table-hover" >
            <thead>
      <tr>
		<th>{{trans('messages.S_NO')}}</th>
        <th>{{ trans('messages.EMPLOYEE_NAME') }}</th>
        <th>{{ trans('messages.EMPLOYEE_CODE') }}</th>
        <th>{{ trans('messages.DOB') }}</th>
        <th>{{ trans('messages.CONTACT_NUMBER') }}</th>
        <th>{{ trans('messages.EMPLOYEE_LOCATION') }}</th>
        <th>{{ trans('messages.TEAM_NAME') }} </th>
        <th>{{ trans('messages.ACTIONS') }}</th>
      </tr>
    </thead>
            <tbody>
            {{--*/$x=$employee->firstItem()-1;/*--}}
            @foreach($employee as $item)
                {{-- */$x++;/* --}}
                <tr>
					<td>{{ $x }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->employeeCode }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->primaryNumber }}</td>
					<td>@if($item->location=='')  -  @else {{ $item->location }} @endif</td>
					<td>@if($item->teamName=='')  -  @else {{ $item->teamName }} @endif</td>
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
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
      <div class="pagination-wrapper"> @if($employee){!! $employee->render() !!}@endif </div> 
    </div>

</div>
@endsection
