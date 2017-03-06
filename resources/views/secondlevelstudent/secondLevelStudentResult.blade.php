@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
				<li>Second Level Student Result</li>
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-5"><a href="{{ url('/centerAllottedSchoolList') }}" class="fa fa-angle-left  fa-2x"> Center Allotted SchoolList</a> </h1>
      <h1 class="text-center col-md-7"> 
	  <form id="searchFilter" name="searchFilter" target="_blank" action="/secondLevelStudentResultSheet" method="get">
   
	  <select name="subject" id="subject" required>
		  <option value=""> Select Subject</option>
	  	  <option value="pmo">PMO</option>
	  	  <option value="pso">PSO</option>
	   </select>
	   		  <button id="admitCard" type="submit">Second Level Result Sheet</button>

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
				   <th>School Name</th>
				   <th>{{ trans('messages.STUDENT_NAME') }}</th>
				   <th>Father Name</th>
				   <th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
				   <th>{{ trans('messages.ROLL_NO') }}</th>
				   <th>Marks</th>
				   <th>Subject</th>
				   <th>Rank</th>
                </tr>
            </thead>
            <tbody>
           {{--*/$x=$student->firstItem()-1;/*--}}
            @foreach($student as $item)
                {{-- */$x++;/* --}}
                <tr >
					<td>{{ $x }}</td>
                    <td>{{ $item->schoolName }}</td>
                    <td>{{ $item->studentName }}</td>
                    <td>{{ $item->fatherName }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>{{$item->totalMarks}}</td>
					<td>{{$item->stream}}</td>
					<td>{{$schoolrank = DB::table('secondlevelstudent')
						->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
						->where('secondlevelstudent.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.classId','=',$item->classId)
						->where('secondlevelstudent.totalMarks','>',$item->totalMarks)
						->where('secondlevelstudent.stream',$item->stream)
						->count()+1}}</td>
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
