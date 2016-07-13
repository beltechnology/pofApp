@extends('layouts.header')

@section('content')

<div class=" col-md-9 category">
    <h1>Add Team Member</h1>
<div class="table">
            <table class='table table-bordered table-striped table-hover'>
            <thead>
      <tr>
        <th>Member Name</th>
        <th>{{ trans('messages.DOB') }}</th>
        <th>{{ trans('messages.CONTACT_NUMBER') }}</th>
        <th>{{ trans('messages.EMAIL') }} </th>
		<th>{{ trans('messages.SELECT_CITY') }}</th>
		<th>{{ trans('messages.LOCATION') }} </th>
        <th>{{ trans('messages.ACTIONS') }}</th>
      </tr>
    </thead>
            <tbody>
                <tr>
				{!! Form::model($teamMember,[
        'method' => 'PATCH',
       'action' => ['TeammemberController@update', $teamMember->entityId],
        'class' => 'form-horizontal'
    ]) !!}
				
                    <td>{{ $teamMember->name }}</td>
					<td>{{ $teamMember->dob }}</td>
					<td>{{ $teamMember->primaryNumber }}</td>
					<td>{{ $teamMember->email }}</td>
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
            </tbody>
        </table>
		 <div class="pagination-wrapper"> {!! $teamMember->render() !!} </div> 
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
                $('#location_'+newEle).append('<option value="'+subCatObj.id+'">'+subCatObj.location+'</option>');
            });
        });
    });
</script>
@endsection
