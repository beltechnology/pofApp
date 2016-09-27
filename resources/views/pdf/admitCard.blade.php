<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>

<style>
@page { margin: 0px; }
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
<table style="height:359px;">
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
<table style="height:359px;">

	<?php
}
if($i== 3){
	$i = 0;
}
?>
<tr align="center">
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">
		<h4>ROLL NUMBER CUM ADMIT CARD</h4>
		<h6>MAY BE USED FOR LEVEL 1 & LEVEL 2 </h6>
	</td>
	<td style="width:20%;">&nbsp;</td>
</tr>
<tr align="center">
	<td style="width:20%;">&nbsp;</td>
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
							$examDate = $schools[0]->PMOExamDate;	
						}
						elseif($_GET['subject'] == 'pso')
						{
							$examType = "PSO";
							$examDate = $schools[0]->PSOExamDate;
						}
					}
						
						echo $examDate;
					?>
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
	
	<td style="width:20%;">&nbsp;</td>
</tr>
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">&nbsp;</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;"><span>*</span> This admit card may be used for level 1 & level  2 - exams.</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">Level one exam/s</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
<tr>
	<td style="width:20%;">&nbsp;</td>
	<td style="width:60%;">
		 <table>
				<tr>
					<td><span>*</span> Date mentioned above.</td>
					<td><span>*</span>Venue your school.</td>
					<td><span>*</span> Time : school hours.</td>
				</tr>
		 </table>
	</td>
	<td style="width:20%;">&nbsp;</td>

</tr>
</table>

@endforeach

</body>
</html>
