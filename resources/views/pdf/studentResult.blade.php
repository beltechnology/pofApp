<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>
<style>
@page { margin: 30px; }
</style>
</head>

<body>
<div class="Container">
@foreach($studentInfo as $student)
<div class="row">
<h5>Dear Parents, </h5>
<div>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
	when an unknown printer took a galley of type and scrambled it to make a type 
	specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release 
	of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
	when an unknown printer took a galley of type and scrambled it to make a type 
	specimen book.</p>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
	when an unknown printer took a galley of type and scrambled it to make a type 
	specimen book.</p>
</div><br><br><br><br><br>
	<div class="studentDetails" style="border:1px solid #000; margin:20px 50px 20px 50px;">
			<div>
			<h4 align="center">Class : {{DB::table('class_names')->where('class_names.deleted',0)->where('class_names.id',$student->classId)->value('name')}}</h4>
			</div>
			<div style="padding :20px;">
				<p>Roll. No: <span>{{$student->rollNo}}</span></p>
				<p>Student's Name: <span>{{DB::table('entitys')->where('entitys.deleted',0)->where('entitys.entityId',$student->entityId)->value('name')}}</span></p>
				<p >Parent's Name: <span>{{$student->fatherName}}</span></p>
				<p >School Name & Code: <span>{{$schoolInfo[0]->schoolName}} - {{$schoolInfo[0]->uniqueSchoolCode}} , {{$schoolInfo[0]->cityName}} {{$schoolInfo[0]->stateName}}</span></p>
				
			</div>
	</div>
<div>
	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
	Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
	when an unknown printer took a galley of type and scrambled it to make a type 
	specimen book.</p>
	
</div>
<div>
<br><br><br><br><br>
	<b><div>With Best Wises,<br>
	Vibhor Jain<br>
	Director
	</div></b>
</div>

</div>
<div class="row">
<?php
if($stream == 'pso'){
	$totalObtainMarks = $student->totalMarksPso;
	$totalMarks = 80;
}
elseif($stream == 'pmo'){
	$totalObtainMarks = $student->totalMarksPmo;
	$totalMarks = 100;
}
?>
	<h3 align="center">PERFORMANCE ANALYSIS</h3>
</div>
<div class="row">
	<h5 align="center">CURRENT YEAR PERFORMANCE</h5>
	<h5 align="center">1st {{$stream}} {{$student->sessionYear}}</h5>
	<table style="width:700px">
	<tbody style="border:1px solid #000;">
		<tr>
			<td style="border:1px solid #000;">
				<span  style="width:115px">Roll No:</span>
				<span style="width:115px">{{$student->rollNo}}</span><br>
			</td>
			<td style="border:1px solid #000;  ">
				<span  style="float:left">School Rank</span>
				<span style="float:right">{{$studentSchoolRank}}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">International Rank : </span>
				<span style="float:right">{{$studentNatnationRank}}</span><br>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">
				<span  style="float:left;">Marks Scored:</span>
				<span style="float:right">{{$totalObtainMarks }}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">City Rank</span>
				<span style="float:right">{{$studentCityRank}}</span><br>
			</td>
			<td style="border:1px solid #000;  ">
				<span  style="float:left">City : </span>
				<span style="float:right">{{$schoolInfo[0]->cityName}}</span><br>
			</td>
		</tr>
		
		<tr>
			<td style="border:1px solid #000;">
				<span  style="float:left;">Total Marks:</span>
				<span style="float:right">{{$totalMarks }}</span><br>
			</td>
			<td style="border:1px solid #000;  ">
				<span  style="float:left">State Rank</span>
				<span style="float:right">{{$studentSateRank}}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">State : </span>
				<span style="float:right">{{$schoolInfo[0]->stateName}}</span><br>
			</td>
		</tr>
		
		<tr>
			<td style="border:1px solid #000;">
				<span  style="float:left;">Percentale Score:</span>
				<span style="float:right">{{  number_format($totalObtainMarks/$totalMarks*100,2) }}</span>
			</td>
			<td style="border:1px solid #000;  ">
			</td>
			<td style="border:1px solid #000;  ">
			</td>
		</tr>
		
	
	</table>
</div>
<div class="row"  style="margin-top:200px;">
	<h5 align="center">SECTION WISE PERFORMANCE STATE PERFORMANCE COMPARISON</h5>
	<h5>School Name : {{$schoolInfo[0]->schoolName}}</h5>
	<h5>Your State : {{$schoolInfo[0]->stateName}}</h5>
	<table style="width:700px ;">
	<thead style="border:1px solid #000;">
	<tr >
		<th style="border:1px solid #000;">SR.No.</th>
		<th style="border:1px solid #000;">Section Name</th>
		<th style="border:1px solid #000;">Total Marks In Section </th>
		<th style="border:1px solid #000;">Your Marks In Section </th>
	</tr>
	</thead>
	@if($stream == 'pso')
	<tbody style="border:1px solid #000;" >
		<tr>
			<td style="border:1px solid #000;">1</td>
			<td style="border:1px solid #000;">Analytical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['analyticalReasoning']}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">2</td>
			<td style="border:1px solid #000;">Everyday Science</td>
			<td style="border:1px solid #000;">35</td>
			<td style="border:1px solid #000;">{{$sectionData['everydayScience']}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">3</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">10</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">60</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['everydayScience']+$sectionData['analyticalReasoning']}}</td>
		</tr>
		</tbody>
	@elseif($stream == 'pmo')
	<tbody style="border:1px solid #000;">
		<tr>
			<td style="border:1px solid #000;">1</td>
			<td style="border:1px solid #000;">Analytical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['analyticalReasoning']}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">2</td>
			<td style="border:1px solid #000;">Everyday Mathematical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['everydayMathematicalReasoning']}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">3</td>
			<td style="border:1px solid #000;">Standard Mathematics</td>
			<td style="border:1px solid #000;">20</td>
			<td style="border:1px solid #000;">{{$sectionData['standardMathematics']*2}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">4</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">10</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">100</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['analyticalReasoning']+($sectionData['standardMathematics']*2)+$sectionData['everydayMathematicalReasoning']}}</td>
		</tr>
	<tbody>
	@endif
	</table>
</div>
@endforeach
	<!-- questin wise PDF -->
		<div style="margin-top:300px">
			<div align="center"><h5> QUESTION WISE ANALYSIS</h5> </div>
			<table style="width:700px ;">
				<thead>
					<tr>
						<th style="border:1px solid #000;">SR.No</th>
						<th style="border:1px solid #000;">Questions</th>
						<th style="border:1px solid #000;">Answer Key</th>
						<th style="border:1px solid #000;">Your Answer</th>
						<th style="border:1px solid #000;">Answer<hr> Right/Wrong</th>
						<th style="border:1px solid #000;">Right Answer<hr>in State %</th>
						<th style="border:1px solid #000;">Right Answer<hr>in National %</th>
					</tr>
				</thead>
					<?php $num = "";
						  $count = 0;
					?>
					@foreach($questionInfo as $questions)
					<?php if($num != $questions->section){
						$num =  $questions->section;
						
						?>
					<tr>
						<td colspan="7" style="border:1px solid #000;">
							<caption align="center"><h5>Section <?php echo $questions->section; ?></h5> </caption>
						<td>
					</tr>
						<?php
					}
					$count++;
					?>
					<tr>
						<td style="border:1px solid #000;">{{$count}}</td>
						<td style="border:1px solid #000;"><?php echo mb_strimwidth($questions->text, 0, 15, "..."); ?></td>
						<td style="border:1px solid #000;">{{ $questions->answerText}}</td>
						<td style="border:1px solid #000;">{{ DB::table('master_answer')->where('master_answer.answerId',$questions->studentAnswerId)->where('master_answer.deleted',0)->value('answerText') }}</td>
						<td style="border:1px solid #000;">@if($questions->correct == 1)Right @else Wrong @endif</td>
						<td style="border:1px solid #000;">{{DB::table('student_result')
								->join('students','student_result.studentId','=','students.entityId')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('student_result.stream',$stream)
								->where('student_result.questionId',$questions->questionId)
								->where('student_result.correct',1)
								->count()/DB::table('student_result')
								->join('students','student_result.studentId','=','students.entityId')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('student_result.stream',$stream)
								->where('student_result.questionId',$questions->questionId)
								->count()*100}}
						</td>
						<td style="border:1px solid #000;">{{DB::table('student_result')
								->where('student_result.deleted',0)
								->where('student_result.stream',$stream)
								->where('questionId',$questions->questionId)
								->where('correct',1)
								->count()/DB::table('student_result')
								->where('student_result.deleted',0)
								->where('student_result.stream',$stream)
								->where('questionId',$questions->questionId)
								->count()*100}}
						</td>
					</tr>
					@endforeach

				<tbody>
					
				</tbody>
			</table>
		
		</div>
<!--    strat code for Topic wise analysis -->
<div class="row"  style="margin-top:150px;">
	<h5 align="center">TOPIC  WISE PERFORMANCE  ANALYSIS</h5>
	<table style="width:700px ;">
	<thead style="border:1px solid #000;">
	<tr >
		<th style="border:1px solid #000;">SR.No.</th>
		<th style="border:1px solid #000;">Section Name</th>
		<th style="border:1px solid #000;">Total Marks <br>(In Topic) </th>
		<th style="border:1px solid #000;">Obtained Marks  </th>
		<th style="border:1px solid #000;">Percentage </th>
	</tr>
	</thead>
	@if($stream == 'pso')
	<tbody style="border:1px solid #000;" >
		<tr>
			<td style="border:1px solid #000;">1</td>
			<td style="border:1px solid #000;">Analytical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['analyticalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['analyticalReasoning']/15*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">2</td>
			<td style="border:1px solid #000;">Everyday Science</td>
			<td style="border:1px solid #000;">35</td>
			<td style="border:1px solid #000;">{{$sectionData['everydayScience']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['everydayScience']/35*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">3</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">10</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3/10*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">60</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['everydayScience']+$sectionData['analyticalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3+$sectionData['everydayScience']+$sectionData['analyticalReasoning']/60*100,2)}}</td>
		</tr>
		</tbody>
	@elseif($stream == 'pmo')
	<tbody style="border:1px solid #000;">
		<tr>
			<td style="border:1px solid #000;">1</td>
			<td style="border:1px solid #000;">Analytical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['analyticalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['analyticalReasoning']/15*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">2</td>
			<td style="border:1px solid #000;">Everyday Mathematical Reasoning</td>
			<td style="border:1px solid #000;">15</td>
			<td style="border:1px solid #000;">{{$sectionData['everydayMathematicalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['everydayMathematicalReasoning']/15*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">3</td>
			<td style="border:1px solid #000;">Standard Mathematics</td>
			<td style="border:1px solid #000;">20</td>
			<td style="border:1px solid #000;">{{$sectionData['standardMathematics']*2}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['standardMathematics']*2/20*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">4</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">10</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3/10*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">100</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['analyticalReasoning']+($sectionData['standardMathematics']*2)+$sectionData['everydayMathematicalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3+$sectionData['analyticalReasoning']+($sectionData['standardMathematics']*2)+$sectionData['everydayMathematicalReasoning']/100*100,2)}}</td>
		</tr>
	<tbody>
	@endif
	</table>
</div>

</div>
</body>
</html>
