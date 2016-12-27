@extends('layouts.header')
@section('content')
    <div class=" col-md-10 category">
	         <div class=" col-md-12 top-filter">
	<div class="edit_school">	
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
    	<ul class="nav navbar-nav">
				<li  class=""><a  href="/assignSchoolCenter/{{session()->get('schoolCenterId')}}">School List for assign Center</a></li>
				<li  class="active"><a  href="/examCenterList">Center Allotted School List </a></li>
    </ul>
  </div>
</nav>

	</div>
            <div class=" col-md-3 category-filter">
			{{ DB::table('schools')->where('schools.deleted',0)->where('schools.entityId',session()->get('schoolCenterId'))->value('schoolName')}}
			</div>
			<div class=" col-md-3 category-filter">
					<form action="/assignCenterToSchool" method="get"   id="schoolListForm">
					{{ csrf_field() }}
						<div class="input-group">
								<button type="submit" class="btn btn-primary btnFormSubmit" name="assignCenter" " value="0"  id="assignCenter" >Remove center</button>
						</div>
					</form>
            </div>
			
			 <div class=" col-md-6 category-filter">
					<form action="/secondLevelAttendanceSheet" method="get" target="_blank"  id="schoolListForm">
	  <select name="filterClass" id="filterName" required >
	  <option value=""> Select Class</option>
	  @foreach ($studentClass as $studentDropDown)
		<?php if(isset($_GET['filterClass']))
		{
			if($studentDropDown->id == $_GET['filterClass'])
			{?>
	  	  <option  selected ="selected" value="{{$studentDropDown->id}}">{{$studentDropDown->name}}</option>
			<?php
				
			}
			else{ ?>
	  	  <option value="{{$studentDropDown->id}}">{{$studentDropDown->name}}</option>
			<?php
			}
		}
		else{?>
	  	  <option value="{{$studentDropDown->id}}">{{$studentDropDown->name}}</option>
	<?php	}
	?>
	  @endforeach
	   </select>
							<select name="subject" id="subject" required>
								<option value=""> Select Subject</option>
								<option value="pmo">PMO</option>
								<option value="pso">PSO</option>
							</select>
								<button type="submit" class="btn btn-primary btnFormSubmit"  id="assignCenter" >Attendance Sheet </button>
					</form>
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
					<th> Assign Center</th>
					<th> Second Level Student</th>
                </tr>
            </thead>
            <tbody>
			 {{--*/$x=$schools->firstItem()-1;/*--}}
            @foreach($schools as $item)
			{{-- */$x++;/* --}}
				 <tr class="">
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
                    <td> <input type="checkbox" name="schoolList[]" class="schoolList"  id="schoolList_{{$item->entityId}}"  value="{{$item->entityId}}"   />           </td>
					<td><a href="/schools/{{$item->entityId}}">Show Students</a></td>
					
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $schools->render() !!} </div>
    </div>

</div>
<script>
$(document).ready(function() {
	$('.schoolList').click(function () 
	{
        if(this.checked) { // check select status
				var val = $(this).val();
			$('<input>').attr({type: 'hidden', id: 'schoolList_'+val, name: 'schoolList[]', value:val }).appendTo('#schoolListForm'); 
        }else{
				var value = $(this).val();
				$('input[type="hidden"][value="'+value+'"]').remove();	
        }
	});   
});
</script>

@endsection
