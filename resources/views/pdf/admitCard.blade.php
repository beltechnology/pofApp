<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap-datetimepicker.min.css"/>
<link rel="stylesheet" type="text/css" href="../../css/style.css"/>
<link rel="stylesheet" type="text/css" href="../../../public/css/media.css" />
<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">

<!-- jQuery library -->
<script src="../../js/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="../../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
 <script type="text/javascript" src="../../js/bootstrap.js"></script>
<script type="text/javascript" src="../../js/moment.js"></script>
<script type="text/javascript" src="../../js/bootstrap-datetimepicker.min.js"></script>
   <script type="text/javascript" src="../../js/commonFunctions.js"></script>
<style>
.olympiad-foundation p{text-align:center;}

.exam-date p{text-align:right;}

.school-name-code{text-align:left;}

.pdf-table{border:1px solid #000;}

.pdf-tr{border-bottom:1px solid #000 !important;}

table{width:100%; font-size:11px;}

td span{color:red;}
td{line-height:15px;}
</style>
</head>

<body>
<?php $i= 0; 
$j = 0;
?>

@foreach($student as $studentDetail)
<table style="height:320px; border-bottom:1px dashed #000">
<tr align="center">
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;">
		<h4>ROLL NUMBER CUM ADMIT CARD</h4>
		<h6>MAY BE USED FOR LEVEL 1</h6>
	</td>
	<td style="width:25%;">&nbsp;</td>
</tr>
<tr align="center">
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;">
			<table>
				<tr>
					<td>Name :</td>
					<td colspan="3">{{$studentDetail->studentName}}</td>
				</tr>
				<tr>
					<td>Class : </td>
					<td colspan="3">
					@foreach($classess as $studentClass)
					@if($studentClass->id === $studentDetail->classId)
					{{$studentClass->name}}
					@endif	
					@endforeach
					</td>
				</tr>
				<tr>
					<td>Parent's Name :</td>
					<td>{{$studentDetail->fatherName}}</td>
					<td>Roll No. :</td>
					<td>{{$studentDetail->rollNo}}</td>
				</tr>
				<tr>
					<td>School Name : </td>
					<td colspan="2">{{$schools[0]->schoolName}}</td>
				</tr>
				<tr>
					<td>School City :</td>
					<td>{{$districts}} , {{$citys}} </td>
					<td>State :</td>
					<td>{{$states}}</td>
				</tr>
			</table>
	</td>
	
	<td style="width:25%;">&nbsp;</td>
</tr>
<tr>
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;">&nbsp;</td>
	<td style="width:25%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;"><span>*</span> This admit card may be used for level 1 - exams.</td>
	<td style="width:25%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;">Level one exam/s</td>
	<td style="width:25%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:25%;">&nbsp;</td>
	<td style="width:50%;">
		 <table>
				<tr>
					<td><span>*</span> Date mentioned above.</td>
					<td><span>*</span>Venue your school.</td>
					<td><span>*</span> Time : school hours.</td>
				</tr>
		 </table>
	</td>
	<td style="width:25%;">&nbsp;</td>

</tr>
</table>

@endforeach

</body>
</html>
