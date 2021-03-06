@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
	@foreach ($articles as $article)
		@if($article->moduleType == trans('messages.TWO'))	
			@if($article->muduleLink === "/student")
				<li   class="active" ><a  href="{{ url($article->muduleLink) }}">{{ $article->name }} </a></li>
			@else
				<li><a  href="{{ url($article->muduleLink.'/'.session()->get('entityId').'/edit') }}">{{ $article->name }} </a></li>
			@endif
		@endif
    @endforeach
    </ul>
  </div>
</nav>
 <div class="h1-two col-md-12">
	 <h1 class="text-left col-md-2"><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_FEES') }}</a> </h1>
      <h1 class="text-center col-md-8"> 
	  <form id="searchFilter" name="searchFilter" action="searchFilter" method="get">
	  <select name="filterClass" id="filterName">
	  <option value="0"> All Class</option>
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
	   
	  <select name="subject" id="subject">
		  <option value="ALL"> All</option>
	  	  <option value="pmo">PMO</option>
	  	  <option value="pso">PSO</option>
	   </select>
	   		  <button id="GetPDF">GetPDF</button>
	   		  <button id="admitCard">Admit Card</button>
	   		  <button id="resultSheet">Result Sheet</button>

	</form>
	<form method="get" id="attendanceForm" action="studentAttendance" class="pull-right">
	   		  <button id="present" class="attendanceBtn" type="submit" name="attendanceBtn" value="1" disabled>Present</button>
	   		  <button id="absent "  class="attendanceBtn" type="submit"  name="attendanceBtn" value="0" disabled>Absent </button>
	</form>
	<form method="get" id="secondLevel" action="studentSecondLevel" class="pull-right">
	   		  <button id="secondLevelButton"  class="attendanceBtn" type="submit"  name="secondLevelButton"  disabled>Second LevelStudent </button>
	</form>
	   </h1>
	    <div class="add-emp add-school col-md-2">
            <a href="{{ url('/student/create') }}" title="Add New student"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
  </div>
	 
	</div>
    <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>{{trans('messages.S_NO')}}</th> 
				   <th>{{ trans('messages.STUDENT_NAME') }}</th>
				   <th>{{ trans('messages.FATHER_NAME') }}</th>
				   <th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
				   <th>{{ trans('messages.ROLL_NO') }}</th>
				   <th> {{ trans('messages.HANDICAPPED') }}</th>
				   <th>{{ trans('messages.ACTIONS') }}<input type="checkbox" id="checkAll"></th><th>{{ trans('messages.EDIT') }}</th>
				   <th>{{ trans('messages.DELETE') }}</th>
				   <th>Pso Result</th>
				   <th>Pmo Result</th>
				   <th>PSO Rank</th>
				   <th>PMO Rank</th>
				   <th>Second Level</th>
                </tr>
            </thead>
            <tbody>
           {{--*/$x=$student->firstItem()-1;/*--}}
            @foreach($student as $item)
                {{-- */$x++;/* --}}
				<?php
					if($item->attendance == trans('messages.ZERO')){
						$class = "danger";
					}
					else{
						$class = "";
					}
				?>
                <tr class="{{$class}}">
					<td>{{ $x }}</td>
                    <td>{{ $item->studentName }}</td>
					<td>{{ $item->fatherName }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>@if($item->handicapped === trans('messages.ZERO'))  NO @else  Yes @endif</td>
					<td><input type="checkbox" class="attendance" name="attendance[]" value="{{$item->entityId}}"></td>
                    <td>
                        <a href="{{ url('/student/' . $item->entityId . '/edit') }}" class="btn btn-primary btn-xs" title="Edit student"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					</td>
					<td>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/student', $item->entityId],
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
                    <td>
					@if($item->pso && $item->resultDeclared )
                        <a href="{{ url('/getStudentResult/' . $item->entityId . '/pso') }}" class="btn btn-primary btn-xs" title="Edit student"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					@endif
					</td>
                    <td>
					@if($item->pmo  && $item->resultDeclared )
                        <a href="{{ url('/getStudentResult/' . $item->entityId . '/pmo') }}" class="btn btn-primary btn-xs" title="Edit student"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
					@endif
					</td>
					<td>
				@if($item->resultDeclared  && $item->pso == 1)
					{{$schoolrankPso = count(DB::table('students')
						->where('students.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',$item->classId)
						->where('students.pso','=',1)
						->where('students.totalMarksPso','>',$item->totalMarksPso)
						->groupBy('students.totalMarksPso')
						->select('students.studentName')
						->get())+1
						}}
				@endif		
						</td>
					<td>
					@if($item->resultDeclared && $item->pmo == 1)
					{{$schoolrankPmo = count(DB::table('students')
						->where('students.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',$item->classId)
						->where('students.pmo','=',1)
						->where('students.totalMarksPmo','>',$item->totalMarksPmo)
						->groupBy('students.totalMarksPmo')
						->select('students.studentName')
						->get())+1
						}}
						@endif
						</td>
					<td>
					@if($item->resultDeclared == 1)
					@if($item->pso == 1)
					@if($schoolrankPso <= 3 && $item->totalMarksPso > trans('messages.PSO_PASSING_MARKS'))<input type="checkbox" class="pso" onclick="checkBoxForSecondLevelStudent(this);" value="{{$item->entityId}}" /> 			@endif
					@endif
					@if($item->pmo== 1)
					 @if($schoolrankPmo <= 3 && $item->totalMarksPmo > trans('messages.PMO_PASSING_MARKS'))<input type="checkbox" class="pso" onclick="checkBoxForSecondLevelStudent(this);" value="{{$item->entityId}}" /> @endif
				@endif
				@endif
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
	$("#filterName").change(function(){
		$("#searchFilter").removeAttr("target");
		$("#searchFilter").attr("action","searchFilter");
		$("#page").remove();
		$("#searchFilter").submit();
	});
	
	$("#subject").change(function(){
		$("#searchFilter").removeAttr("target");
		$("#searchFilter").attr("action","searchFilter");
		$("#page").remove();
		$("#searchFilter").submit();
	});
	
	$("#GetPDF").click(function(){
			$("#searchFilter").removeAttr("target");

	if($("#subject").val()== "ALL")
		{
			alert("Please select the exam type.");
		}
		else if($("#filterName").val()!= 0)
		{
			alert("Please select the all class option.");
		}
		else{
			$("#page").remove();
			$("#searchFilter").attr("action","getPDF");
			$("#searchFilter").attr("target","_blank");
			$("#searchFilter").submit();
			window.reload();
		}
	});
	
	$("#resultSheet").click(function(){
			$("#searchFilter").removeAttr("target");

	if($("#subject").val()== "ALL")
		{
			alert("Please select the exam type.");
		}
		// else if($("#filterName").val()!= 0)
		// {
			// alert("Please select the all class option.");
		// }
		else{
			$("#page").remove();
			$("#searchFilter").attr("action","getResultSheetData");
			$("#searchFilter").attr("target","_blank");
			$("#searchFilter").submit();
			window.reload();
		}
	});
	

	$("#admitCard").click(function(){
		$("#searchFilter").removeAttr("target");
		if($("#subject").val()== "ALL")
		{
			alert("Please select the exam type.");
		}
		else if($("#filterName").val()!= 0)
		{
			$("#searchFilter").attr("action","getAdmitPDF");
			$("#searchFilter").attr("target","_blank");
			<?php
			if(isset($_GET['page']))
			{?>
			$("#page").remove();
			$("#searchFilter").append('<input type="hidden" id="page" name="page" value="<?php echo $_GET["page"] ?>"/>');
			<?php
			}
			?>

			$("#searchFilter").submit();
			window.reload();
		}
		else{
			<?php
			if(isset($_GET['page']))
			{?>
			$("#page").remove();
			$("#searchFilter").append('<input type="hidden" id="page" name="page" value="<?php echo $_GET["page"] ?>"/>');
			<?php
			}
			?>
			
			$("#searchFilter").attr("action","getAdmitPDF");
			$("#searchFilter").attr("target","_blank");
			$("#searchFilter").submit();
			window.reload();
		}
	});
	
	<?php 
	if(isset($_GET['subject']))
	{
		?>
	$("#subject").val("<?php echo $_GET['subject']?>");
		<?php
	}?>
	
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


function checkBoxForSecondLevelStudent(ele){
	var secondLevel = $("#secondLevel");
			if($(ele).prop("checked") == true){
			secondLevel.append("<input type='hidden' name='secondLevelStudent[]' id='secondLevelStudent_"+$(ele).val()+"' value='"+$(ele).val()+"'>");
			}
			else if($(ele).prop("checked") == false){
			secondLevel.find("#secondLevelStudent_"+$(ele).val()).remove();
			}
	checkSecondLevelstudentLength();
}

function checkSecondLevelstudentLength()
{
	var secondLevel = $("#secondLevel");
		if(secondLevel.find("input[type='hidden']").length > 0)
		{
			$("#secondLevelButton").removeAttr('disabled');
		}
		else{
			$("#secondLevelButton").attr('disabled','disabled');
		}
}
</script>
@endsection
