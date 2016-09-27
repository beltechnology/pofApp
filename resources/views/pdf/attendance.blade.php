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

table{width:100%; font-size:13px;}

</style>
</head>

<body>

@foreach($classess as $studentClass)
<div class="Container">
@foreach($schools as $school)
<?php 

//$studentCountArray = array();
if($_GET['subject']== "pso")
{
	
	$examdate =  $school->PSOExamDate;
	$subType = "SCIENCE";
}
elseif($_GET['subject']== "pmo")
{
   $examdate = $school->PMOExamDate;
   $subType = "MATHEMATICS";
}
else{
   $examdate = $school->PMOExamDate;
   $subType = "MATHEMATICS";
}
  ?>

<p align="center"><strong>PLANET OLYMPIAD FOUNDATION <br>PLANET {{$subType}} OLYMPIAD <br>( ATTENDANCE - SHEET )</strong></p>


</div>
<div class="col-lg-12">

<div class="col-lg-6">
</div>

<div class="col-lg-6 exam-date">
<p>Chosen Date of Exam :
{{$examdate}}
</p>
</div>
</div>

<div class="col-lg-12">

<div class="col-lg-6 school-name-code">
<p>SCHOOL CODE : ({{$school->uniqueSchoolCode}})  {{$school->schoolName}}<br> {{$address}}<br>
{{$districts}},{{$citys}}, {{$states}}</p>

</div>

<div class="col-lg-6">

</div>
</div>
@endforeach

</div>

<div style=" height:590px;">
<table border="" class="table table-striped pdf-table" style="width:100%;">
  <thead  style="border:1px solid #000;">
    <tr class="pdf-tr">
      <th style="border:1px solid #000;">S.NO.</th>
      <th style="border:1px solid #000;"> &nbsp; &nbsp;  ROLL NO &nbsp; &nbsp; </th>
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
@if($studentClass->id === $studentDetail->classId)
<tr style="border-bottom:1px solid #000;">
	<td style="border:1px solid #000;"><?php echo ++$i; $j++; ?></td>
	<td style="border:1px solid #000;">{{$studentDetail->rollNo}}</td>
	<td style="border:1px solid #000;">{{$studentDetail->studentName}}</td>
	<td style="border:1px solid #000;">{{$studentDetail->fatherName}}</td>
	<td style="border:1px solid #000;">&nbsp;</td>
</tr>
@endif
<?php if($j > 21)
{
	$j = 0;
	?>
</tbody>
</table>
</div>
<table>
  <tr>
	<td colspan="4">
		  <p>------------------------------------------------------------NOTE------------------------------------------------------------</p>
		  <p>* Please make Student's Name / Parent's name correction, if any, in attendance sheet. (IN BLOCK LETTERS)</p>
		  <p>* Please ensure that all the corrections are incorporated & attendance sheet dispatched with Answer-Sheets.</p>
		  <p>* If a student is absent, please mark clearly (ABSENT) in signature column</p>
	</td>
  </tr>
</table>

<div class="Container">
@foreach($schools as $school)


<p align="center"><strong>PLANET OLYMPIAD FOUNDATION <br>PLANET {{$subType}}  OLYMPIAD <br>( ATTENDANCE - SHEET )</strong></p>


</div>
<div class="col-lg-12">

<div class="col-lg-6">
</div>

<div class="col-lg-6 exam-date">
<p>Chosen Date of Exam :
{{$examdate}}
</p>
</div>
</div>

<div class="col-lg-12">

<div class="col-lg-6 school-name-code">
<p>SCHOOL CODE : ({{$school->uniqueSchoolCode}})  {{$school->schoolName}}<br> {{$address}}<br>
{{$districts}},{{$citys}}, {{$states}}</p>

</div>

<div class="col-lg-6">

</div>
</div>
@endforeach

</div>
</div>

<div style=" height:594px;">
<table border="" class="table table-striped pdf-table" style="width:100%;">
  <thead style="margin-top:-400px"  style="border:1px solid #000;">
    <tr class="pdf-tr" style="border:1px solid #000;">
      <th  style="border:1px solid #000;">S.NO.</th>
      <th  style="border:1px solid #000;"> &nbsp; &nbsp;  ROLL NO &nbsp; &nbsp; </th>
      <th  style="border:1px solid #000;"> NAME OF THE STUDENT</th>
      <th  style="border:1px solid #000;">PARENT'S NAME</th>
      <th  style="border:1px solid #000;">SIGNATURE</th>
    </tr>
  </thead>
  <tbody>
<?php
}
?>

@endforeach
</tbody>
</table>
</div>
<table>
  <tr>
	<td colspan="4">
		  <p>------------------------------------------------------------NOTE------------------------------------------------------------</p>
		  <p>* Please make Student's Name / Parent's name correction, if any, in attendance sheet. (IN BLOCK LETTERS)</p>
		  <p>* Please ensure that all the corrections are incorporated & attendance sheet dispatched with Answer-Sheets.</p>
		  <p>* If a student is absent, please mark clearly (ABSENT) in signature column</p>
	</td>
  </tr>
</table>
<?php  $studentCountArray[$studentClass->id] = $i; ?> 
@endforeach

<!-- attendance summary -->



<div class="Container">
@foreach($schools as $school)


<p align="center"><strong>PLANET OLYMPIAD FOUNDATION <br>PLANET {{$subType}}  OLYMPIAD</strong></p>


</div>
<div class="col-lg-12">

<div class="col-lg-6">
</div>

<div class="col-lg-6 exam-date">
<p>Chosen Date of Exam :
{{$examdate}}
</p>
</div>
</div>

<div class="col-lg-12">

<div class="col-lg-6 school-name-code">
<p>SCHOOL CODE : ({{$school->uniqueSchoolCode}})  {{$school->schoolName}}<br> {{$address}}<br>
{{$districts}} , {{$citys}} , {{$states}}</p>

</div>
<p align="center"><strong> &#60;&#60;&#60;&#60; CLASSWISE - ATTENDANCE SUMMARY  &#62;&#62;&#62;&#62;</strong></p>

<div class="col-lg-6">

</div>
</div>
@endforeach

</div>
</div>

<div style=" height:570px;">
<table border="" class="table table-striped pdf-table" style="width:100%;">
  <thead style="border:1px solid #000;">
    <tr class="pdf-tr" style="border:1px solid #000;">
      <th  style="border:1px solid #000;">CLASS</th>
      <th  style="border:1px solid #000;">TOTAL STUDENTS REGISTERED</th>
      <th  style="border:1px solid #000;"> NO. OF STUDENTS PRESENT</th>
      <th  style="border:1px solid #000;"> NO. OF STUDENTS ABSENT</th>
    </tr>
    <tr class="pdf-tr" >
      <th  align="left" colspan="3" >** QUESTION PAPER SET : ____________</th>
    </tr>
  </thead>
  <tbody>
  <?php $totalStudent = 0;?>
@foreach($classess as $studentClass)
<tr style="border-bottom:1px solid #000;">
	<td style="border:1px solid #000;">{{$studentClass->name}}</td>
	<td style="border:1px solid #000;"><?php  echo $studentCountArray[$studentClass->id]; $totalStudent = $totalStudent+$studentCountArray[$studentClass->id] ;?></td>
	<td style="border:1px solid #000;">&nbsp;</td>
	<td style="border:1px solid #000;">&nbsp;</td>
</tr>
@endforeach



</tbody>
</table>
</div>
<table>
  <tr colspan="3">
	<td>
		<table>
		  <tr><td class="pull-left">Total Students Registered : ({{$totalStudent}})</td><td  class="pull-right" align="right"><br><hr>Signature of the Teacher/Invigilator</td></tr></table>
	</td>
  </tr>
  <tr colspan="4">

	<td>		  <p>* Please despatch these Attendance Sheets and Attendance summary positively with the Answer Sheets.</p>
		  <p>** PLEASE   MENTION QUESTION PAPER SET AS MENTIONED ON THE QUESTION PAPERS RECEIVED</p>
</td>
  </tr>
</table>

</body>
</html>
