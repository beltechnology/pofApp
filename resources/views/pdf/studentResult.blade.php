<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POF India</title>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/jquery.canvasjs.min.js"></script>
<script type="text/javascript">
 
</script>
<style>
.main-pdf {
    padding: 0px 80px;
    text-align: center;
    border: 1px solid #ccc;
}
button#cmd {
    margin: 20px 50px 0px;
}

.main-pdf h5 {
    padding: 0px 50px;
	margin:5px 0 5px 0;
}

.top-para {
    padding: 0px 50px;
    text-align: justify;
}

.top-para p {
    font-size: 20px;
    line-height: 30px;
}

.performance-pdf h3 {
    background: #000;
    color: #fff;
    padding: 10px 50px;
}

.performance-content td {
    padding: 10px 12px;
}

.performance-content th {
    padding: 10px 12px;
}

.performance-pdf h5 {
    background: #000;
    color: #fff;
    padding: 10px 50px;
}

.performance-pdf {
    padding-top: 00px;
	margin-top:350px;
}
.modal-backdrop {
    background-color: #000;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1040;
	opacity: 1;
}
.modal-backdrop.in {
    opacity: 0.5;
}
.modal-backdrop img{
	position:fixed;
	top:20%;
	left:40%;
}
</style>
</head>

<body>
<div class="Container" id="Container">
<div class="main-pdf">
@foreach($studentInfo as $student)
<div class="row">
<h5 align="left">Dear Parents, </h5>
<div class="top-para">
	<p>Rising stars will be honoured/ We have congratulated all the rising stars of 2016</p>
	<p>However, Parents whose Children did not score good grades should recall history in hurry  that one example of dedication is not  the sole criteria of student’s assessment specifically school grades .The gigantic corporates like Bill Gates and others were college dropouts. </p>
	<p>It  was A-level, B-level and C-level result today. No matter what grade your child scored , congratulations are in order—for all parents. Your son or daughter has achieved something big  by just by doing them</p>
	<p>---Now this is the time to convey my congratulations to all the parents of students  for the School Assessment Test. I always felt that Parents should be genuinely honoured  for their  unique son or daughter after declaration of result.</p>
	<p>However, We are thrilled by the amazing response of parents  to the Olympiad initiative We are proud to have gained national reputation in just one year.</p>
	<p>Olympiad’s Examination Assessment has revealed who has come top of the class in 2016.</p>

	</div>

	<div class="studentDetails " style="border:1px solid #000; margin:100px 50px 100px 50px;">
			<div>
			<h3 align="center">Class : {{DB::table('class_names')->where('class_names.deleted',0)->where('class_names.id',$student->classId)->value('name')}}</h3>
			</div>
			<div style="padding :20px;">
				<p><strong>Roll. No:</strong> <span>{{$student->rollNo}}</span></p>
				<p><strong>Student's Name:</strong> <span>{{DB::table('entitys')->where('entitys.deleted',0)->where('entitys.entityId',$student->entityId)->value('name')}}</span></p>
				<p><strong>Parent's Name:</strong> <span>{{$student->fatherName}}</span></p>
				<p><strong>School Name & Code:</strong> <span>{{$schoolInfo[0]->schoolName}} - {{$schoolInfo[0]->uniqueSchoolCode}} , {{$schoolInfo[0]->cityName}} {{$schoolInfo[0]->stateName}}</span></p>
				
			</div>
	</div>
	
<div class="top-para">
	<p>Outstanding Students will be put forward for the accolade by Olympiad</p>
	<p>This is a time to celebrate double-digit gains that student at Olympiad  showed on standardized tests. </p>
	
</div>
<div>

	<b><div class="top-para">However,  there is still a lot of hard work ahead.<br>
	Each student possesses a different list of skills.<br>
	Amongst the 2016 winners are inspirational stories..
	</div></b>
</div>

</div>

<div class="row">

<div class="performance-pdf">
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
</div>
<div class="row">
<div class="performance-content">
	<h5 align="center" style="font-size:18px;">CURRENT YEAR PERFORMANCE</h5>
	<h5 align="center" style="font-size:18px;">1st {{$stream}} {{$student->sessionYear}}</h5>
	<table align="center" style="width:=1000px">
	<tbody style="border:1px solid #000;">
		<tr>
			<td style="border:1px solid #000;">
				<span  style="width:115px">Roll No : </span>
				<span style="width:115px">{{$student->rollNo}}</span><br>
			</td>
			<td style="border:1px solid #000;  ">
				<span  style="float:left">School Rank : </span>
				<span style="float:right">{{$studentSchoolRank}}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">National Rank : </span>
				<span style="float:right">{{$studentNatnationRank}}</span><br>
			</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">
				<span  style="float:left;">Marks Scored:</span>
				<span style="float:right">{{$totalObtainMarks }}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">City Rank : </span>
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
				<span  style="float:left">State Rank : </span>
				<span style="float:right">{{$studentSateRank}}</span><br>
			</td>
			<td style="border:1px solid #000; ">
				<span  style="float:left">State : </span>
				<span style="float:right">{{$schoolInfo[0]->stateName}}</span><br>
			</td>
		</tr>
		
		<tr>
			<td style="border:1px solid #000;">
				<span  style="float:left;">Percentile Score : </span>
				<span style="float:right">{{  number_format($totalObtainMarks/$totalMarks*100,2) }}</span>
			</td>
			<td style="border:1px solid #000;  ">
			</td>
			<td style="border:1px solid #000;  ">
			</td>
		</tr>
		
	
	</table>
</div>
<div class="row"  style="margin-top:650px; padding-top:50px;">
	<div class="performance-content">
	<h5 align="center"  style="padding: 12px 0px 12px 0px; background:#000; color:#fff;">SECTION WISE PERFORMANCE STATE PERFORMANCE COMPARISON</h5>
	<h5 align="center" style="font-size:18px;">School Name : {{$schoolInfo[0]->schoolName}}</h5>
	<h5 align="center" style="font-size:18px;">Your State : {{$schoolInfo[0]->stateName}}</h5>
	<table align="center" style="width:900px; padding: 12px 100px 12px 0px;">
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
			<td style="border:1px solid #000;">30</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">80</td>
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
			<td style="border:1px solid #000;">40</td>
			<td style="border:1px solid #000;">{{$sectionData['standardMathematics']*2}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">4</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">30</td>
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
</div>
@endforeach
	<!-- questin wise PDF -->
		<div class="performance-content" style="margin-top:700px">
			<div align="center"><h5 style="padding: 8px 0px; background:#000; color:#fff;"> QUESTION WISE ANALYSIS</h5> </div>
			<table align="center" style="width:900px; padding: 12px 60px 12px 0px;">
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
							<h5 style="font-size:18px; ">Section {{$questions->section}}</h5>
						<td>
					</tr>
						<?php
					}
					if($count == 0){
							$stateStudentCount = DB::table('student_result')
								->join('students','student_result.studentId','=','students.entityId')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('student_result.stream',$stream)
								->where('student_result.questionId',$questions->questionId)
								->count();
							$nationStudentCount = DB::table('student_result')
								->where('student_result.deleted',0)
								->where('student_result.stream',$stream)
								->where('questionId',$questions->questionId)
								->count();
								}
					$count++;
					
					?>
					<tr>
						<td style="border:1px solid #000;">{{$questions->order}}</td>
						<td style="border:1px solid #000;"><?php echo mb_strimwidth($questions->text, 0, 15, "..."); ?></td>
						<td style="border:1px solid #000;">{{ $questions->answerText}}</td>
						<td style="border:1px solid #000;">{{ DB::table('master_answer')->where('master_answer.answerId',$questions->studentAnswerId)->where('master_answer.deleted',0)->value('answerText') }}</td>
						<td style="border:1px solid #000;">@if($questions->correct == 1)<img src="../../images/check.png" width="15" /></span> @else X @endif</td>
						<td style="border:1px solid #000;">{{DB::table('student_result')
								->join('students','student_result.studentId','=','students.entityId')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('student_result.stream',$stream)
								->where('student_result.questionId',$questions->questionId)
								->where('student_result.correct',1)
								->count()/$stateStudentCount*100}}
						</td>
						<td style="border:1px solid #000;">{{DB::table('student_result')
								->where('student_result.deleted',0)
								->where('student_result.stream',$stream)
								->where('questionId',$questions->questionId)
								->where('correct',1)
								->count()/$nationStudentCount*100}}
						</td>
					</tr>
					
					@endforeach

				<tbody>
					
				</tbody>
			</table>
		
		</div>
<!--    strat code for Topic wise analysis -->
<div class="row"  style="margin-top:300px;">
<div class="performance-content">
	<h5 align="center" style="padding: 12px 0px; background:#000; color:#fff;">TOPIC  WISE PERFORMANCE  ANALYSIS</h5>
	<table align="center" style="width:900px; padding: 12px 80px 12px 0px;">
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
			<td style="border:1px solid #000;">30</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3/30*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">80</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['everydayScience']+$sectionData['analyticalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3+$sectionData['everydayScience']+$sectionData['analyticalReasoning']/80*100,2)}}</td>
		</tr>
		</tbody>
<?php
        $dataPoints = array(
            array("y" => number_format($sectionData['analyticalReasoning']/15*100,2), "label" => "Analytical Reasoning"),
            array("y" => number_format($sectionData['everydayScience']/35*100,2), "label" => "Everyday Science"),
            array("y" => number_format($sectionData['questZone']*3/30*100,2), "label" => "Quest Zone")
        );
?>
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
			<td style="border:1px solid #000;">40</td>
			<td style="border:1px solid #000;">{{$sectionData['standardMathematics']*2}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['standardMathematics']*2/40*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">4</td>
			<td style="border:1px solid #000;">Quest Zone</td>
			<td style="border:1px solid #000;">30</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3/30*100,2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;"></td>
			<td style="border:1px solid #000;">Total</td>
			<td style="border:1px solid #000;">100</td>
			<td style="border:1px solid #000;">{{$sectionData['questZone']*3+$sectionData['analyticalReasoning']+($sectionData['standardMathematics']*2)+$sectionData['everydayMathematicalReasoning']}}</td>
			<td style="border:1px solid #000;">{{number_format($sectionData['questZone']*3+$sectionData['analyticalReasoning']+($sectionData['standardMathematics']*2)+$sectionData['everydayMathematicalReasoning']/100*100,2)}}</td>
		</tr>
	<tbody>
<?php
        $dataPoints = array(
            array("y" => number_format($sectionData['analyticalReasoning']/15*100,2), "label" => "Analytical Reasoning"),
            array("y" => number_format($sectionData['everydayMathematicalReasoning']/15*100,2), "label" => "Everyday Mathematical Reasoning"),
            array("y" => number_format($sectionData['standardMathematics']*2/40*100,2), "label" => "Standard Mathematics"),
            array("y" => number_format($sectionData['questZone']*3/30*100,2), "label" => "Quest Zone")
        );
?>
	@endif
	</table>
</div> 
</div>
<!--   graph-->
<div id="chartContainerPercentage" align="center" style="height: 600px; width: 900px; margin-top:500px"> </div>
</div>

<!--  end percentage graph-->
<!-- strat class wise graph-->
<div class="row"  style="margin-top:150px;">
<div class="performance-content">
	<h5 align="center" style="padding: 12px 0px; background:#000; color:#fff;">AVERAGE MARKS  ANALYSIS</h5>
	<table align="center" style="width:900px; padding: 12px 80px 12px 0px;">
	<thead style="border:1px solid #000;">
	<tr >
		<th style="border:1px solid #000;">Description</th>
		<th style="border:1px solid #000;">Average Marks</th>
	</tr>
	</thead>
	@if($stream == 'pso')
	<tbody style="border:1px solid #000;" >
		<tr>
			<td style="border:1px solid #000;">Your Marks</td>
			<td style="border:1px solid #000;">{{$totalObtainMarks}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">Class Average Marks</td>
			<td style="border:1px solid #000;">{{$classAvg = number_format(DB::table('students')->where('classId',$student->classId)->where('deleted',0)->where('schoolEntityId',$student->schoolEntityId)->sum('totalMarksPso')/DB::table('students')->where('classId',$student->classId)->where('deleted',0)->where('schoolEntityId',$student->schoolEntityId)->count(),2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">State Average Marks</td>
			<td style="border:1px solid #000;">{{$stateAvg =number_format(DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('students.classId',$student->classId)
								->where('students.deleted',0)
								->sum('totalMarksPso')/DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('students.classId',$student->classId)
								->where('students.deleted',0)
								->count(),2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">National Average Marks</td>
			<td style="border:1px solid #000;">{{$nationalAvg =number_format(DB::table('students')->where('classId',$student->classId)->where('deleted',0)->sum('totalMarksPso')/DB::table('students')->where('classId',$student->classId)->where('deleted',0)->count(),2)}}</td>
		</tr>
		</tbody>
<?php
        $dataPointsClass = array(
            array("y" =>$totalObtainMarks, "label" => "Your "),
			array("y"=>$classAvg, "label" => "Class Average "),
            array("y" => $stateAvg, "label" => "State Average "),
            array("y" => $nationalAvg, "label" => "National Average ")
        );
?>
	@elseif($stream == 'pmo')
	<tbody style="border:1px solid #000;" >
		<tr>
			<td style="border:1px solid #000;">Your Marks</td>
			<td style="border:1px solid #000;">{{$totalObtainMarks}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">Class Average Marks</td>
			<td style="border:1px solid #000;">{{$classAvg = number_format(DB::table('students')->where('classId',$student->classId)->where('deleted',0)->where('schoolEntityId',$student->schoolEntityId)->sum('totalMarksPmo')/DB::table('students')->where('classId',$student->classId)->where('deleted',0)->where('schoolEntityId',$student->schoolEntityId)->count(),2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">State Average Marks</td>
			<td style="border:1px solid #000;">{{$stateAvg = number_format(DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('students.classId',$student->classId)
								->where('students.deleted',0)
								->sum('totalMarksPmo')/DB::table('students')
								->join('schools','students.schoolEntityId','=','schools.entityId')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->where('addresses.stateId',$schoolInfo[0]->state_id)
								->where('students.classId',$student->classId)
								->where('students.deleted',0)
								->count(),2)}}</td>
		</tr>
		<tr>
			<td style="border:1px solid #000;">National Average Marks</td>
			<td style="border:1px solid #000;">{{$nationalAvg = number_format(DB::table('students')->where('classId',$student->classId)->where('deleted',0)->sum('totalMarksPmo')/DB::table('students')->where('classId',$student->classId)->where('deleted',0)->count(),2)}}</td>
		</tr>
		</tbody>
<?php
        $dataPointsClass = array(
            array("y" =>$totalObtainMarks, "label" => "Your "),
			array("y"=>$classAvg, "label" => "Class Average "),
            array("y" => $stateAvg, "label" => "State Average "),
            array("y" => $nationalAvg, "label" => "National Average ")
        );
?>
	@endif
	</table>


	<div id="chartContainer" style="height: 600px; width: 900px; margin-top:500px; padding: 12px 80px 12px 0px;"> </div>
</div>
</div>
<!-- end class wise graph-->
</div>
</div>
<script type="text/javascript">
 
            $(function () {
                var chart = new CanvasJS.Chart("chartContainerPercentage", {
                    theme: "theme2",
                    animationEnabled: true,
                    title: {
                        text: "Percentage"
                    },
                      axisX: {
				labelAngle: -30
			}, 
		 axisX:{
				labelFontSize: 12
			  },			
					axisY: {      
					minimum: 0,
					maximum: 100
					   },
                    data: [
							{
								type: "column",                
								dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>,
								indexLabel: "{y}"
							}
                    ]
                });
                chart.render();
				
				
                var chart = new CanvasJS.Chart("chartContainer", {
                    theme: "theme2",
                    animationEnabled: true,
                    title: {
                        text: "Average"
                    },
                    axisX: {
				labelAngle: -30
			},
					axisY: {      
					minimum: 0,
					maximum: 100
					   },
                    data: [
							{
								type: "line",                
								dataPoints: <?php echo json_encode($dataPointsClass, JSON_NUMERIC_CHECK); ?>,
								indexLabel: "{y}"
							}
                    ]
                });
                chart.render();
				
            });
			
		var printdata = 	function printdata()
			{
				$(".modal-backdrop").remove();
				print();
			}
			setTimeout(printdata, 2000);
			
</script>

<div class="modal-backdrop fade in"><img src="../../images/giphy.gif" align="center"  /></div>

</body>
</html>
