@extends('layouts.header')

@section('content')
<div class=" col-md-9 category">

    <h1>Add Team Member</h1>
    <hr/>
<div class="main-table col-md">
            <table border="0" bgcolor="#eeeeee">
            <thead bgcolor="#ffffff" style="color:#4b4b4b">
      <tr class="table-heading">
        <th width="200" class="emp-name"><span><i class="fa fa-square-o" aria-hidden="true"></i></span>{{ trans('messages.EMPLOYEE_NAME') }}</th>
        <th width="50" class="emp-id">{{ trans('messages.EMPLOYEE_ID') }}</th>
        <th width="80" class="emp-dob">{{ trans('messages.DOB') }}</th>
        <th width="110" class="emp-no">{{ trans('messages.CONTACT_NUMBER') }}</th>
        <th width="200" class="emp-location">{{ trans('messages.ADDRESS') }}</th>
        <th width="105" class="emp-team">{{ trans('messages.EMAIL') }} </th>
        <th width="120">{{ trans('messages.ACTIONS') }}</th>
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
                        <!--<a href="{{ url('/employee/' . $item->employeeId) }}" class="btn  btn-xs" title="View employee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/teammember/' . $item->entityId . '/edit') }}" class="btn  btn-xs" title="Select Member"><span class="glyphicon fa-check fa" aria-hidden="true"/></a>-->
						{!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/teammember', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class=" glyphicon fa-check fa" aria-hidden="true" title="Select Member" />', array(
                                    'type' => 'submit',
                                    'class' => '',
                                    'title' => 'Select Member',
                                    
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
