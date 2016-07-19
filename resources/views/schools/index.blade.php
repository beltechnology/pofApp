@extends('layouts.header')
@section('content')
    <div class=" col-md-9 category">


    <h1 class="school_category">Schools</h1>
	 
            <div class="add-emp add-school col-md-2">
            <a href="{{ url('/schools/create') }}" title="Add New school"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
		<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th> School Name </th>
					<th>Address </th>
					<th> City </th>
					<th> District</th>
					<th> Pincode </th>
					<th>Primary Mobile No.</th>
					<th> Email Id </th>
					<th> Principal Name</th>
					<th> Principal Mobile No.</th>
					<th> Edit</th>
					<th> Delete</th>
					<th>Actions<input type="checkbox" id="selectall" /></th>
                </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
                <tr>
                    <td>{{ $item->schoolName }}</td>
					<td>{{ $item->addressLine1 }}</td>
					<td>{{ $item->cityName }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->pincode }}</td>
					<td>{{ $item->primaryNumber }}</td>
					<td>{{ $item->email }}</td>	
					<td>{{ $item->principalName }}</td>
					<td>{{ $item->principalMobile }}</td>
                    <td>
                        <a href="{{ url('/schools/' . $item->entityId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit school"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> </td>
					<td>	
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/schools', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete school" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete school',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
					<td><input type="checkbox"  /> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schools->render() !!} </div>
    </div>

</div>
@endsection
