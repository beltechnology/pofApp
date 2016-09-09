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
	 <h1 class="text-left col-md-3"><a href="{{ url('/fees/'.session()->get('entityId').'/edit') }}" class="fa fa-angle-left  fa-2x"> {{ trans('messages.TABS_FEES') }}</a> </h1>
	  <h1 class="text-center col-md-6"> 
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

	   </h1>
	    <div class="add-emp add-school col-md-2">
            <a href="{{ url('/student/create') }}" title="Add New student"><p>{{ trans('messages.ADD') }} <span class="glyphicon glyphicon-plus" aria-hidden="true"/></p></a>
            </div>
			<div class=" col-md-3 category-filter">
			</div>
			<div class=" col-md-6 category-filter">
		<form action="search-student" method="get" role="search">
			<div class="input-group">
				<input type="text" class="form-control" name="q"
					placeholder="Search by Student Name,Class,Student Roll No." required> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</form>
            </div>
  </div>
	 
	</div>
    <h1 style="color:red;">  {{ session()->get('concurrency_message')}} </h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th>{{trans('messages.S_NO')}}</th> <th>{{ trans('messages.STUDENT_NAME') }}</th><th>{{ trans('messages.DOB') }}</th><th>{{ trans('messages.BOOKDETAIL_CLASS') }}</th><th>{{ trans('messages.ROLL_NO') }}</th><th> {{ trans('messages.HANDICAPPED') }}</th><th>{{ trans('messages.ACTIONS') }}<input type="checkbox"></th><th>{{ trans('messages.EDIT') }}</th><th>{{ trans('messages.DELETE') }}</th>
                </tr>
            </thead>
            <tbody>
           {{--*/$x=$student->firstItem()-1;/*--}}
            @foreach($student as $item)
                {{-- */$x++;/* --}}
                <tr>
					<td>{{ $x }}</td>
                    <td>{{ $item->studentName }}</td>
					<td>{{ $item->dob }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->rollNo }}</td>
					<td>@if($item->handicapped === trans('messages.ZERO'))  NO @else  Yes @endif</td>
					<td><input type="checkbox"></td>
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
		$("#searchFilter").submit();
	});
	
	$("#subject").change(function(){
		$("#searchFilter").removeAttr("target");
		$("#searchFilter").attr("action","searchFilter");
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
			
			$("#searchFilter").attr("action","getPDF");
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
			$("#searchFilter").submit();
			window.reload();

		}
		else{
			
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
});
</script>
@endsection
