<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>

<style>
@page { margin: 0px; }
body { margin: 10px 0px 0px 35px; }

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

<body class="">
<?php $i= 0; 
$j = 0;
?>

@foreach($student as $studentDetail)

<?php 
$i++;

if($i!= '1' )
{
	?>
<table style="height:359px;">
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr><tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr><tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
	<?php
}
else if($i!= '2' )
{
	?>
<table style="height:359px;"  class="outer_proxy">
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr><tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
	<?php
}
else{
	?>
<table style="height:359px;" >

	<?php
}
if($i== 3){
	$i = 0;
}
?>
<tr align="center">
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">
		<h4>SECOND LEVEL ADMIT CARD</h4>
	</td>
	<td style="width:20%;">&nbsp;</td>
</tr>
<tr align="center">
	<td style=""><img src="http://test.pofindia.com/images/download.jpg"   height="100" /></td>
	<td style="width:60%;">
			<table>
				<tr>
					<td>Name :</td>
					<td>{{$studentDetail->studentName}}</td>
					<td>Exam date :</td>
					<td><?php
					$examType = "";
					$examDate = "";
					
					if(isset($_GET['subject']))
					{
						if($_GET['subject'] == 'pmo')
						{
							$examType = "PMO";
						}
						elseif($_GET['subject'] == 'pso')
						{
							$examType = "PSO";
						}
					}
						
						
					?>
					{{$second_level_exams[0]->dateOfExam}}
					</td>
				</tr>
				<tr>
					<td>Class : </td>
					<td>
					@foreach($classess as $studentClass)
					@if($studentClass->id === $studentDetail->classId)
					{{$studentClass->name}}
					@endif	
					@endforeach
					</td>
					<td>Exam type :</td>
					<td>{{$examType}}</td>
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
	
	<td style="width:20%;"><img src="http://test.pofindia.com/images/download.jpg"   height="100" /></td>
</tr>
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:20%;"><img src="http://test.pofindia.com/images/download.jpg"   height="35" /></td>
	<td style="width:60%;">Center of Examination : {{$schoolCenter[0]->schoolName}}, {{$schoolCenter[0]->addressLine1}}<br> , {{$schoolCenter[0]->cityName}} , {{$schoolCenter[0]->name}}, {{$schoolCenter[0]->stateName}}</td>
	<td style="width:20%;"><img src="http://test.pofindia.com/images/download.jpg"   height="35" /></td>

</tr>
<tr>
	<td style="width:20%;"><img src="http://test.pofindia.com/images/download.jpg"   height="35" /></td>
	<td style="width:60%;">
		 <table>
				<tr>
					<td>Reporting Time : {{$second_level_exams[0]->reportingTime}}</td>
					<td colspan="2">Time of exam : {{$second_level_exams[0]->examTime}} To {{$second_level_exams[0]->tillTime}}</td>
					
				</tr>
		 </table>
	</td>
	<td style="width:20%;"><img src="http://test.pofindia.com/images/download.jpg"   height="35" /></td>

</tr>
</table>

@endforeach

</body>
</html>
