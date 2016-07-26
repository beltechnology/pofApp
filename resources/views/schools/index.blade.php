@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">
	         <div class=" col-md-12 top-filter">

            <div class=" col-md-3 category-name">
    <h1 class="school_category">{{ trans('messages.SCHOOLS') }}</h1>
	</div>
            <div class=" col-md-4 category-filter">
		<form action="search-school" method="get" role="search">
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search Schools , School Code , City Name or  Principal Name "> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
		            </div>

            <div class=" col-md-3 category-filter">
		<form action="activate-school" method="POST"  onsubmit="return confirm('Do you really want to activate school?');" id="activateSchoolForm">
		{{ csrf_field() }}
			<div class="input-group">
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary" name="activateSchool" value="0">Activate</button>
				</span>
				<span class="input-group-btn">
					<button type="submit" class="btn btn-primary" name="activateSchool" value="1">Deactivate</button>
				</span>
			</div>
		</form>
          
            
            </div>
            <div class="add-emp add-school col-md-2">
            <a href="{{ url('/schools/create') }}" title="Add New school"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
		</div>
		<h1 style="color:red;">  {{ session()->get('flash_message')}} </h1>
		<div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
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
					<th> {{ trans('messages.DELETE') }}</th>
					<th>{{ trans('messages.ACTIONS') }}<input type="checkbox" id="selectall" /></th>
                </tr>
            </thead>
            <tbody>
            @foreach($schools as $item)
					@if ($item->activationSchool === '1')
						 <tr class="danger">
					@else
						 <tr class="{{$item->activationSchool}}">
					@endif               
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
					<td><input type="checkbox" class="checkbox1" value='{{$item->entityId}}'  /> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schools->render() !!} </div>
    </div>

</div>
<script>
$(document).ready(function() {
    $('#selectall').click(function(event) {  //on click 
        if(this.checked) { // check select status
			$('input[type="hidden"][name="activationSchool[]"]').remove();
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1" 
				var val = $(this).val();
			$('<input>').attr({type: 'hidden', id: 'activationSchool_'+val, name: 'activationSchool[]', value:val }).appendTo('#activateSchoolForm'); 
		});
        }else{
            $('.checkbox1').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"  
				var value = $(this).val();
				$('input[type="hidden"][value="'+value+'"]').remove();	
            });         
        }
    });
	
	
	$('.checkbox1').click(function () 
	{
        if(this.checked) { // check select status
				var val = $(this).val();
			$('<input>').attr({type: 'hidden', id: 'activationSchool_'+val, name: 'activationSchool[]', value:val }).appendTo('#activateSchoolForm'); 
        }else{
				var value = $(this).val();
				$('input[type="hidden"][value="'+value+'"]').remove();	
        }
	});   
});
</script>
@endsection
