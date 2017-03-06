<html>
<head>
<title>Pof India </title>
</head>
<style>
table{
   background: #fff;
}
table,thead,tbody,tfoot,tr, td,th{
  text-align: center;
  margin: auto;
  border:1px solid #dedede;
  padding: 1rem;
  width: 50%;
}
.table    { display: table; width: 50%; }
.tr       { display: table-row;  }
.thead    { display: table-header-group }
.tbody    { display: table-row-group }
.tfoot    { display: table-footer-group }
.col      { display: table-column }
.colgroup { display: table-column-group }
.td, .th   { display: table-cell; width: 50%; }
.caption  { display: table-caption }

.table,
.thead,
.tbody,
.tfoot,
.tr,
.td,
.th{
  text-align: center;
  margin: auto;
  padding: 1rem;
}
.table{
  background: #fff;
  margin: auto;
  border:none;
  padding: 0;
  margin-bottom: 5rem;
}

.tr{text-align:center;}

.th{
  font-weight: 700;
  border:1px solid #dedede;
  &:nth-child(odd){
    border-right:none;
  }
}
.td{
  font-weight: 300;
  border:1px solid #dedede;
  border-top:none;
  &:nth-child(odd){
    border-right:none;
  }
}
p{
text-align:center;
font-size:30px;
}

h2 {
    background-color: #000;
    color: #fff;
    padding: 18px 0px;
    text-align: center;
    margin-top: 50px;
}

h3{
font-size:36px;
text-align: center;
}

h4{
font-size:40px;
text-align: center;
}

.prize {
    color: #ffa500;
    font-size: 30px;
}

.prize p{
    color: #ffa500;
    font-size: 30px;
	text-align:left;
}
</style>
<body>
<div>
<h2>SECOND LEVEL EXAM RESULT</h2>
<p><strong>Class {{$student[0]->className}} </strong></p>
<p><strong>Roll No.: </strong> {{$student[0]->rollNo}}</p>
<p><strong>Students Name:</strong>  {{$student[0]->studentName}}</p>
<p><strong>Parent's Name:</strong>  {{$student[0]->	fatherName}} </p>
<p><strong>School Name & Code:</strong>  {{$student[0]->schoolName}} - {{$student[0]->uniqueSchoolCode}},<br />    {{$student[0]->districtName}}, {{$student[0]->stateName}}</p>
<?php
if($stream == 'pso'){
	$total = 80;
}
else{
	$total = 100;
}
?>
<p> {{$student[0]->sessionYear}}st  {{strtoupper($stream)}}</p>
<table>
    <thead>
      <tr>
       
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Marks Scored:{{$student[0]->totalMarks}}</td>
        <td>National Rank:{{$schoolrank = DB::table('secondlevelstudent')
						->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
						->where('secondlevelstudent.deleted',0)
						->where('students.sessionYear',$student[0]->sessionYear)
						->where('students.classId','=',$student[0]->classId)
						->where('secondlevelstudent.totalMarks','>',$student[0]->totalMarks)
						->where('secondlevelstudent.stream',$stream)
						->count()+1}}</td>
      </tr>
      <tr>
        <td>Total Marks:{{$total}}</td>
        <td>City:{{$student[0]->cityName}}</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td>Percentage Score:{{$student[0]->totalMarks/$total*100}}</td>
        <td>State:{{$student[0]->stateName}}</td>
      </tr>
    </tfoot>
  </table>
@if($schoolrank <= 3)
	<h3>Congratulation</h3>
<h4>ELIGIBLE TO WIN IN {{strtoupper($stream)}} EXAM</h4>

@else
<h3>GOOD JOB TRY NEXT TIME</h3>
<h4>NOT ELIGIBLE TO WIN IN {{strtoupper($stream)}} EXAM</h4>
@endif

<ol class="prize">
<p> <strong>POF Second Level Exam Criteria-</strong></p>
<li>Those students who will secure 91%-100% marks in second level POF exam will get 1st prize.</li>
<li>Those students who will secure 86%-90% marks in second level POF exam will get 2nd prize.</li>
<li>Those students who will secure 81%-85% marks in second level POF exam will get 3rd prize.</li>
<ol>
</div>
</body>
</html>