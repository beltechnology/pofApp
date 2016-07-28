@extends('layouts.header')

@section('content')
 <h1 class=""></h1>
<div class=" col-md-10 category">

	<div class="h1-two col-md-12">
	<h1 class="text-left school_category col-md-4"><a href="{{ url('/team') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_LIST') }} </a></h1>
    <h1 class="text-center col-md-4">{{ trans('messages.ADD_TEAM_MEMBER') }}</h1>
	<h1 class="text-left col-md-4"></h1>
	</div>
<div class="table">
            <table class='table table-bordered table-striped table-hover'>
            <thead>
      <tr>
		<th>{{trans('messages.S_NO')}}</th>
        <th>{{ trans('messages.MEMBER_NAME') }}</th>
        <th>{{ trans('messages.DOB') }}</th>
        <th>{{ trans('messages.CONTACT_NUMBER') }}</th>
        <th>{{ trans('messages.EMAIL') }} </th>
		<th>{{ trans('messages.SELECT_CITY') }}</th>
		<th>{{ trans('messages.LOCATION') }} </th>
        <th>{{ trans('messages.ACTIONS') }}</th>
      </tr>
    </thead>
            <tbody>
            {{--*/$x=$employee->firstItem()-1;/*--}}
            @foreach($employee as $item)
                {{-- */$x++;/* --}}
                <tr>
				{!! Form::open([
                            'method'=>'PATCH',
                            'action' => ['TeammemberController@update', $item->entityId],
                            'style' => 'display:inline'
                        ]) !!}
					 <td>{{ $x }}</td>	
                    <td>{{ $item->name }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->primaryNumber }}</td>
					<td>{{ $item->email }}</td>
					<td id='city_{{ $x }}'>{!! Form::select('city_id',$cities,null, ['class' => 'cityDropDown','placeholder' => 'Select City']) !!}</td>
					<td><select id='location_{{ $x }}'  name="locationId">
					 <option>Select Location </option>
					<option value=""></option>
					</select></td>
                    <td>
                        <!--<a href="{{ url('/employee/' . $item->employeeId) }}" class="btn  btn-xs" title="View employee"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/teammember/' . $item->entityId . '/edit') }}" class="btn  btn-xs" title="Select Member"><span class="glyphicon fa-check fa" aria-hidden="true"/></a>-->
						
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
<script>
$('.cityDropDown').on('change', function(e){
       var ele = $(this).parent().attr('id');
		var locationId = ele.split('_');
		var newEle = locationId[1];
        var city_id = e.target.value;
        $.get('{{ url('teammember') }}/create/city?city_id=' + city_id, function(data) {
            console.log(data);
            $('#location_'+newEle).empty();
            $.each(data, function(index,subCatObj){
                $('#location_'+newEle).append('<option value="'+subCatObj.locationId+'">'+subCatObj.location+'</option>');
            });
        });
    });
</script>
@endsection
