<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>

<style>
.olympiad-foundation p{text-align:center;}

.exam-date p{text-align:right;}

.school-name-code{text-align:left;}

.pdf-table{border:1px solid #000;}

.pdf-tr{border-bottom:1px solid #000 !important;}

table{width:100%; font-size:12px;}

</style>
</head>

<body>

<div class="Container">
@foreach($schools as $school)
<?php 

//$studentCountArray = array();
if($_GET['subject']== "pso")
{
	
	$examdate =  $second_level_exams[0]->dateOfExam;
	$subType = "SCIENCE";
}
elseif($_GET['subject']== "pmo")
{
	$examdate =  $second_level_exams[0]->dateOfExam;
   $subType = "MATHEMATICS";
}
else{
	$examdate =  $second_level_exams[0]->dateOfExam;
   $subType = "MATHEMATICS";
}
  ?>
  
  
<table>
</table>

</br>

@endforeach

</div>

<div style=" height:590px;">
<table border="" class="table table-striped pdf-table" style="width:100%;">
<thead style="width:100%;">
	<tr>
		<th colspan="6"><strong>PLANET OLYMPIAD FOUNDATION <br>PLANET {{$subType}} OLYMPIAD <br>(Level-II Selected Student Exam Attendance Sheet)</strong></th>
	</tr>
	<tr>
		<th colspan="6"><p>Center Code : ({{$school->uniqueSchoolCode}})  {{$school->schoolName}}</p></th>
	</tr>
	<tr>
		<th colspan="2">Date of Exam :{{$examdate}}</th>
		<th colspan="2">Reporting Time :{{$second_level_exams[0]->reportingTime}} </th>
		<th colspan="2">Time OF Exam :{{$second_level_exams[0]->examTime}} To {{$second_level_exams[0]->tillTime}} </th>
	</tr>
</thead>

  <thead  style="border:1px solid #000;">
    <tr class="pdf-tr">
      <th style="border:1px solid #000;">S.NO.</th>
      <th style="border:1px solid #000;"> &nbsp; &nbsp;  ROLL NO &nbsp; &nbsp; </th>
      <th style="border:1px solid #000;"> SCHOOL NAME</th>
      <th style="border:1px solid #000;"> NAME OF THE STUDENT</th>
      <th style="border:1px solid #000;">PARENT'S NAME</th>
      <th style="border:1px solid #000;">SIGNATURE</th>
    </tr>
  </thead>
  <tbody>
<?php $i = 0;
		$j = 0;
 ?>
@foreach($student as $studentDetail)
<tr style="border-bottom:1px solid #000;">
	<td style="border:1px solid #000;"><?php echo ++$i; $j++; ?></td>
	<td style="border:1px solid #000;">{{$studentDetail->rollNo}}</td>
	<td style="border:1px solid #000;">{{$studentDetail->schoolName}}</td>
	<td style="border:1px solid #000;">{{$studentDetail->studentName}}</td>
	<td style="border:1px solid #000;">{{$studentDetail->fatherName}}</td>
	<td style="border:1px solid #000;">&nbsp;</td>
</tr>
<?php
if($j == 23){ ?>
	<tr>
		<td colspan="3">&nbsp;</td>
		<td colspan="3" align="right"><br><hr>Signature of the Teacher/Invigilator</td>
	</tr>
<?php
$j=0;
}
?>
@endforeach
<?php
if($j < 23){ ?>
	<tr>
		<td colspan="3">&nbsp;</td>
		<td colspan="3" align="right"><br><hr>Signature of the Teacher/Invigilator</td>
	</tr>
<?php
$j=0;
}
?>

</tbody>
</table>
</div>


<!-- attendance summary -->
</div>

</body>
</html>
