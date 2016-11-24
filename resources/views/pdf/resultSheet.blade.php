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
<div>
	<div>
		School : {{$schools[0]->schoolName}}<br>
		({{$schools[0]->uniqueSchoolCode}}) {{$schools[0]->addressLine1}} {{$schools[0]->addressLine2}} ,  {{$schools[0]->cityName}} <br>
		{{$schools[0]->name}} , {{$schools[0]->stateName}}
	</div>
 <br>
</div>
<table>
<thead>
	<tr>
		<th style="border:1px solid #000;">SR.No</th>
		<th style="border:1px solid #000;">Roll No.</th>
		<th style="border:1px solid #000;">Name of student</th>
		<th style="border:1px solid #000;">Total Marks</th>
		<th style="border:1px solid #000;">School Rank</th>
		<th style="border:1px solid #000;">State Rank</th>
		<th style="border:1px solid #000;">National Rank</th>
		<th style="border:1px solid #000;">Qualified for level 2</th>
	</tr>
</thead>
<tbody>
 {{--*/$x=0;/*--}}
@foreach($student as $studentDetail)
 {{-- */$x++;/* --}}
 @if($stream == 'pso')
<tr>
	<td style="width:5%; border:1px solid #000;">{{ $x }}</td>
	<td style="width:20%; border:1px solid #000;">{{ $studentDetail->rollNo}}</td>
	<td style="width:20%;  border:1px solid #000;">{{ $studentDetail->studentName}}</td>
	<td style="width:5%; border:1px solid #000;">{{ $totalMarks =  $studentDetail->totalMarksPso}}</td>
	<td style="width:5%; border:1px solid #000;">{{$schoolrank = DB::table('students')
						->where('students.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',$studentDetail->classId)
						->where('students.totalMarksPso','>',$studentDetail->totalMarksPso)
						->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">{{ DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('students.deleted',0)
								->where('students.sessionYear',session()->get('activeSession'))
								->where('addresses.stateId',$schools[0]->stateId)
								->where('students.totalMarksPso','>',$studentDetail->totalMarksPso)
								->where('students.classId','=',$studentDetail->classId)
								
								->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">{{  DB::table('students')
								->where('students.deleted',0)
								->where('students.sessionYear',session()->get('activeSession'))
								->where('students.totalMarksPso','>',$studentDetail->totalMarksPso)
								->where('students.classId','=',$studentDetail->classId)
								
								->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">@if($schoolrank <= 3 && $totalMarks > 40) Yes @else No @endif</td>

</tr>
 @endif	
 @if($stream == 'pmo')
<tr>
	<td style="width:5%; border:1px solid #000;">{{ $x }}</td>
	<td style="width:20%; border:1px solid #000;">{{ $studentDetail->rollNo}}</td>
	<td style="width:20%;  border:1px solid #000;">{{ $studentDetail->studentName}}</td>
	<td style="width:5%; border:1px solid #000;">{{$totalMarks =  $studentDetail->totalMarksPmo}}</td>
	<td style="width:5%; border:1px solid #000;">{{$schoolrank = DB::table('students')
						->where('students.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',$studentDetail->classId)
						->where('students.totalMarksPmo','>',$studentDetail->totalMarksPmo)
						->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">{{ DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('students.deleted',0)
								->where('students.sessionYear',session()->get('activeSession'))
								->where('addresses.stateId',$schools[0]->stateId)
								->where('students.totalMarksPmo','>',$studentDetail->totalMarksPmo)
								->where('students.classId','=',$studentDetail->classId)
								->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">{{  DB::table('students')
								->where('students.deleted',0)
								->where('students.sessionYear',session()->get('activeSession'))
								->where('students.totalMarksPmo','>',$studentDetail->totalMarksPmo)
								->where('students.classId','=',$studentDetail->classId)
								->count()+1}}</td>
	<td style="width:5%; border:1px solid #000;">@if($schoolrank <= 3 && $totalMarks > 40) Yes @else No @endif</td>

</tr>
 @endif	
 
@endforeach
</tbody>
</table>
</body>
</html>
