@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
				<li>Second Level Student List</li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-5"><a href="{{ url('/centerAllottedSchoolList') }}" class="fa fa-angle-left  fa-2x"> Center Allotted SchoolList</a> </h1>
      <h1 class="text-center col-md-7"> 
	  <form id="searchFilter" name="searchFilter" action="/secondLevelAdmitCard" method="get">
   
	  <select name="subject" id="subject" required>
		  <option value=""> Select Subject</option>
	  	  <option value="pmo">PMO</option>
	  	  <option value="pso">PSO</option>
	   </select>
	   		  <button id="admitCard" type="submit">Admit Card</button>

	</form>
	<form method="get" id="attendanceForm" action="secondLevelAttendance" class="">
	   	<button id="present" class="attendanceBtn" type="submit" name="attendanceBtn" value="1" disabled>Present</button>
	   	<button id="absent "  class="attendanceBtn" type="submit"  name="attendanceBtn" value="0" disabled>Absent </button>
	</form>
	   </h1>
	
  </div>
	 
	</div>
    <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>{{trans('messages.S_NO')}}</th> 
				   <th>{{ trans('messages.STUDENT_NAME') }}</th>
				   <th>{{ trans('messages.DOB') }}</th>
				   <th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
				   <th>{{ trans('messages.ROLL_NO') }}</th>
				   <th> {{ trans('messages.HANDICAPPED') }}</th>
				   <th>Subject</th>
				   <th>{{ trans('messages.ACTIONS') }}<input type="checkbox" id="checkAll"></th>
				   <th>{{ trans('messages.DELETE') }}</th>
                </tr>
            </thead>
            <tbody>
           {{--*/$x=$student->firstItem()-1;/*--}}
            @foreach($student as $item)
                {{-- */$x++;/* --}}
				<?php
					if($item->studentAttendance == trans('messages.ZERO')){
						$class = "danger";
					}
					else{
						$class = "";
					}
				?>
                <tr class="{{$class}}">
					<td>{{ $x }}</td>
                    <td>{{ $item->studentName }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>@if($item->handicapped === trans('messages.ZERO'))  NO @else  Yes @endif</td>
					<td>{{$item->stream}}</td>
					<td><input type="checkbox" class="attendance" name="attendance[]" value="{{$item->studentEntityId}}"></td>
					<td>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/secondLevelStudent', $item->studentEntityId],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete student" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete student',
                                    'onclick'=>'return confirm("Do you really  want to delete this?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $student->render() !!} </div>
    </div>

</div>


<script>
$(document).ready(function(){
	$("#admitCard").click(function(){
	});
	
	
	$("#checkAll").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
		if($(this).prop("checked") == true){
			checkBoxCheckValue(true);
		}
		else{
			checkBoxCheckValue(false);
		}
		
	});

		$(".attendance").change(function(){
			var attendanceForm = $("#attendanceForm");
			if($(this).prop("checked") == true){
			attendanceForm.append("<input type='hidden' name='attendance[]' id='attendance_"+$(this).val()+"' value='"+$(this).val()+"'>");
			}
			else if($(this).prop("checked") == false){
			attendanceForm.find("#attendance_"+$(this).val()).remove();
			}
			checkLength();
		});

		
});

function checkBoxCheckValue(response){
	var attendanceForm = $("#attendanceForm");
	if(response == true)
	{
		attendanceForm.find(".attendance").remove();
		$(".attendance").each(function() {
			if($(this).prop("checked") == true){
			attendanceForm.append("<input type='hidden' name='attendance[]'  id='attendance_"+$(this).val()+"' value='"+$(this).val()+"'>");
			}
		});
	}
	else{
		attendanceForm.find("input[type='hidden']").remove();
	}
	checkLength();
}

function checkLength()
{			var attendanceForm = $("#attendanceForm");
			if(attendanceForm.find("input[type='hidden']").length > 0)
			{
				$(".attendanceBtn").removeAttr('disabled');
			}
			else{
				$(".attendanceBtn").attr('disabled','disabled');
			}

}


</script>
@endsection
