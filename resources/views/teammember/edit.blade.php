@extends('layouts.header')

@section('content')

<div class=" col-md-9 category">
    <h1>Edit Team Member Location</h1>
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
				{!! Form::model($employee->toArray()+$entity->toArray()+$address->toArray()+$emailaddress->toArray()+$phone->toArray(),['method' => 'PATCH','action' => ['TeammemberController@update', $entity->entityId],'class' => 'form-horizontal']) !!}
				
                    <td>{{ $entity->name }}</td>
					<td>{{ $employee->dob }}</td>
					<td>{{ $phone->primaryNumber }}</td>
					<td>{{ $emailaddress->email }}</td>
					<td id='city'>{!! Form::select('cityId',$citys,null, ['class' => 'cityDropDown']) !!}</td>
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

	
$('.cityDropDown').on('change', function(e){
        var city_id = e.target.value;
        $.get('{{ url('teammember') }}/edit/city?city_id=' + city_id, function(data) {
            console.log(data);
            $('#location').empty();
            $.each(data, function(index,subCatObj){
                $('#location').append('<option value="'+subCatObj.id+'">'+subCatObj.location+'</option>');
            });
        });
    });
});
</script>
@endsection
