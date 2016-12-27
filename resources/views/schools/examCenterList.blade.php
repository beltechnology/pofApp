@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">
	         <div class=" col-md-12 top-filter">
	<div class="edit_school">	
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
    	<ul class="nav navbar-nav">
				<li  class="active"><a  >Center List</a></li>
    </ul>
  </div>
</nav>

	</div>

		</div>

		<h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
		<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
					<th>{{trans('messages.S_NO')}}</th>
					<th> {{ trans('messages.SCHOOL_NAME') }} </th>
					<th>{{ trans('messages.SCHOOL_ADDRESS') }} </th>
					<th>{{ trans('messages.SCHOOL_CITY') }} </th>
					<th> {{ trans('messages.SCHOOL_DISTRICT_NAME') }} </th>
					<th> {{ trans('messages.PINCODE') }}  </th>
					<th>{{ trans('messages.SCHOOL_PRIMARY_MOBILE') }} </th>
					<th>{{ trans('messages.SCHOOL_EMAIL') }}</th>
					<th>{{ trans('messages.SCHOOL_PRINCIPAL_NAME') }}</th>
					<th>{{ trans('messages.SCHOOL_PRINCIPAL_MOBILE') }}</th>
					<th> {{ trans('messages.EDIT') }}</th>
                </tr>
            </thead>
            <tbody>
			 {{--*/$x=$schools->firstItem()-1;/*--}}
            @foreach($schools as $item)
			{{-- */$x++;/* --}}
					@if ($item->activationSchool === '1')
						 <tr class="danger">
					@else
						 <tr class="{{$item->activationSchool}}">
					@endif  
					<td>{{ $x }}</td>
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
                        <a href="{{ url('/assignSchoolCenter/' . $item->entityId) }}" class="btn btn-primary btn-xs" title="Edit school"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a> </td>					
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schools->render() !!} </div>
    </div>

</div>
@endsection
