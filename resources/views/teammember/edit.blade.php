@extends('layouts.header')

@section('content')

<div class=" col-md-10 category">
<div class="h1-two col-md-12">
	 <h1 class="text-left col-md-4"><a href="{{ url('/teammember/'.session()->get('teamId')) }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TEAM_MEMBERS') }}</a></h1>
      <h1 class="text-center col-md-4">{{ trans('messages.EDIT_TEAM_MEMBER_LOCATION') }}</h1>
      <h1 class="text-left col-md-4"></h1>
      </div>
<div class="table">
            <table class='table table-bordered table-striped table-hover'>
            <thead>
      <tr>
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
                <tr>
				{!! Form::model($employee->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(),['method' => 'PATCH','action' => ['TeammemberController@update', $entity->entityId],'class' => 'form-horizontal']) !!}
				
                    <td>{{ $entity->name }}</td>
					<td>{{ $employee->dob }}</td>
					<td>{{ $phone->primaryNumber }}</td>
					<td>{{ $emailaddress->email }}</td>
					<td id='city'>{!! Form::select('cityId',$citys,null, ['class' => 'cityDropDown','id'=>'cityValue']) !!}</td>
					<td>{!! Form::select('locationId',$locations,null, ['id' => 'location']) !!}</td>
                    <td>
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
		
    </div>
</div>
<script>
 $(document).ready(function(){
        var city_id = $(".cityDropDown").val();
		alert(city_id);
		var teamLocation = $("#location").val();
	 $.get('{{ url('teammember') }}/edit/city?city_id=' + city_id, function(data) {
            console.log(data);
            $('#location').empty();
			$('#location').append('<option value="">'+'Select Location'+'</option>');
            $.each(data, function(index,subCatObj){
                $('#location').append('<option value="'+subCatObj.locationId+'">'+subCatObj.location+'</option>');
            });
			$("#cityValue").val(city_id);
			$("#location").val(teamLocation);
        });

        });	
	
$('.cityDropDown').on('change', function(e){
        var city_id = e.target.value;
        $.get('{{ url('teammember') }}/edit/city?city_id=' + city_id, function(data) {
            console.log(data);
            $('#location').empty();
            $.each(data, function(index,subCatObj){
                $('#location').append('<option value="'+subCatObj.locationId+'">'+subCatObj.location+'</option>');
            });
        });
    });

</script>
@endsection
