@extends('layouts.header')
@section('content')
<div class=" col-md-10 category">
 <div class="edit_school">
		
        <nav class="navbar navbar-default">
  		<div class="container-fluid">
   		
    	<ul class="nav navbar-nav">
	@foreach ($articles as $article)
		@if($article->moduleType === trans('messages.TWO'))	
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

	</form>
	<form method="get" id="attendanceForm" action="studentAttendance" class="">
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
				   <th>{{ trans('messages.ACTIONS') }}<input type="checkbox" id="checkAll"></th>
				   <th>{{ trans('messages.DELETE') }}</th>
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
					<td>{{ $item->dob }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>@if($item->handicapped === trans('messages.ZERO'))  NO @else  Yes @endif</td>
					<td><input type="checkbox" class="attendance" name="attendance[]" value="{{$item->studentEntityId}}"></td>
					<td>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/secondlevelstudent', $item->studentEntityId],
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
		else if($("#filterName").val()!= 0)
		{
			alert("Please select the all class option.");
		}
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


</script>
@endsection
