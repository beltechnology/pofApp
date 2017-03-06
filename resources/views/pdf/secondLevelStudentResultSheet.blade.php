<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>

<style>
@page { margin: 30px; }
body { margin: 10px 0px 0px 35px;  }

.olympiad-foundation p{text-align:center;}

.exam-date p{text-align:right;}

.school-name-code{text-align:left;}

.pdf-table{border:1px solid #000;}

.pdf-tr{border-bottom:1px solid #000 !important;}

table{width:100%; font-size:11px;}

td span{color:red;}
td{line-height:16px;}
</style>
</head>

<body>
<div class="Container">
<?php 

//$studentCountArray = array();
if($_GET['subject']== "pso")
{
	
	$subType = "SCIENCE";
}
elseif($_GET['subject']== "pmo")
{
   $subType = "MATHEMATICS";
}
else{
   $subType = "MATHEMATICS";
}
  ?>

<p align="center"><strong>PLANET OLYMPIAD FOUNDATION <br>PLANET {{$subType}} OLYMPIAD <br>( RESULT - SHEET )</strong></p>


</div>

 <br>
</div>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                   <th  style="width:5%; border:1px solid #000;">{{trans('messages.S_NO')}}</th> 
				   <th  style="width:25%; border:1px solid #000;">School Name</th>
				   <th  style="width:20%; border:1px solid #000;">{{ trans('messages.STUDENT_NAME') }}</th>
				   <th  style="width:20%; border:1px solid #000;">Father Name</th>
				   <th  style="width:15%; border:1px solid #000;">{{ trans('messages.ROLL_NO') }}</th>
				   <th  style="width:5%; border:1px solid #000;">{{ trans('messages.BOOKDETAIL_CLASS') }}</th>
				   <th  style="width:5%; border:1px solid #000;">Marks</th>
				   <th  style="width:5%; border:1px solid #000;">Subject</th>
				   <th  style="width:5%; border:1px solid #000;">Rank</th>
                </tr>
            </thead>
            <tbody>
			<?php $srNo = 0; ?>
            @foreach($student as $item)
				<?php
				$schoolrank = DB::table('secondlevelstudent')
						->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
						->where('secondlevelstudent.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.classId','=',$item->classId)
						->where('secondlevelstudent.totalMarks','>',$item->totalMarks)
						->where('secondlevelstudent.stream',$item->stream)
						->count()+1;
						
						$srNo++;
				?>
				@if($schoolrank <=3)
                <tr >
					<td style="width:5%; border:1px solid #000;">{{$srNo}}</td>
                    <td style="width:25%; border:1px solid #000;">{{ $item->schoolName }}</td>
                    <td style="width:20%; border:1px solid #000;">{{ $item->studentName }}</td>
                    <td style="width:20%; border:1px solid #000;">{{ $item->fatherName }}</td>
					<td style="width:15%; border:1px solid #000;">{{ $item->rollNo }}</td>
					<td style="width:5%; border:1px solid #000;">{{ $item->name }}</td>
					<td style="width:5%; border:1px solid #000;">{{$item->totalMarks}}</td>
					<td style="width:5%; border:1px solid #000;">{{$item->stream}}</td>
					<td style="width:5%; border:1px solid #000;">{{$schoolrank}}</td>
                </tr>
				@endif
            @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

