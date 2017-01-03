<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\student;
use App\entity;
use App\school;
use Carbon\Carbon;
use Session;
use DB;
use raw;
use Illuminate\Support\Facades\Input;
class PDFController extends Controller
{
	
    public function secondLevelAttendanceSheet()
	{
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$schools= DB::table('schools')->where('deleted',0)->where('entityId',session()->get('schoolCenterId'))->get();
		$second_level_exams= DB::table('second_level_exams')->where('deleted',0)->where('examType',Input::get('subject'))->get();
		if(Input::get('subject') != "0" )
		{
				   $student= DB::table('secondlevelstudent')
                        ->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
                        ->join('class_names','class_names.id','=','students.classId')
                        ->join('schools','schools.entityId','=','secondlevelstudent.SecondLevelSchoolId')
						->where('secondlevelstudent.stream',Input::get('subject'))
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('class_names.id',Input::get('filterClass'))
						->where('students.sessionYear',session()->get('activeSession'))
						->where('schools.centerSchoolId',session()->get('schoolCenterId'))
						->orderBy('students.rollNo','asc')
						->get();
						
		}
		
		$pdf = PDF::loadView('pdf.secondLevelAttendance',['student'=>$student,'schools'=>$schools,'second_level_exams'=>$second_level_exams]);
//	return view('pdf.attendance', ['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
//	$pdf = PDF::loadView('pdf.attendance',['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
		return $pdf->stream('secondLevelAttendance.pdf');
	}	
	
    public function getPDF()
	{
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$schools= DB::table('schools')->where('deleted',0)->where('entityId',session()->get('entityId'))->get();
		if(Input::get('filterClass') == 0 && Input::get('subject') == "ALL" )
		{
				   $student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->get();
						
		}
		elseif(Input::get('filterClass') != 0 && Input::get('subject') == "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',Input::get('filterClass'))
						->orderBy('students.rollNo','asc')
						->get();

		}
		elseif(Input::get('filterClass') != 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',Input::get('filterClass'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						
						->get();

		}
		elseif(Input::get('filterClass') == 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						->get();

		}
		else{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->get();
		}
//var_dump($schools);
		$address = DB::table('addresses')->where('deleted',0)->where('entityId',session()->get('entityId'))->get();
		$states = DB::table('states')->where('deleted',0)->where('id',$address[0]->stateId)->value('stateName');
		$districts = DB::table('districts')->where('deleted',0)->where('id',$address[0]->districtId)->value('name');
		$citys = DB::table('citys')->where('deleted',0)->where('id',$address[0]->cityId)->value('cityName');
		$classess = DB::table('class_names')->where('deleted',0)->get();
		$pdf = PDF::loadView('pdf.attendance',['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
//	return view('pdf.attendance', ['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
//	$pdf = PDF::loadView('pdf.attendance',['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
		return $pdf->stream('attendance.pdf');
	}
	
	
	
	
	
    public function getAdmitPDF()
	{
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$schools= DB::table('schools')->where('deleted',0)->where('entityId',session()->get('entityId'))->get();
		if(Input::get('filterClass') == 0 && Input::get('subject') == "ALL" )
		{
				   $student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->get();
						
		}
		elseif(Input::get('filterClass') != 0 && Input::get('subject') == "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',Input::get('filterClass'))
						->orderBy('students.rollNo','asc')
						->get();

		}
		elseif(Input::get('filterClass') != 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',Input::get('filterClass'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						->paginate(30);
						

		}
		elseif(Input::get('filterClass') == 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('class_names')
                        ->join('students','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						->paginate(30);
						

		}
		else{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->paginate(30);
						
		}
//var_dump($schools);
		$address = DB::table('addresses')->where('deleted',0)->where('entityId',session()->get('entityId'))->get();
		$states = DB::table('states')->where('deleted',0)->where('id',$address[0]->stateId)->value('stateName');
		$districts = DB::table('districts')->where('deleted',0)->where('id',$address[0]->districtId)->value('name');
		$citys = DB::table('citys')->where('deleted',0)->where('id',$address[0]->cityId)->value('cityName');
		$classess = DB::table('class_names')->where('deleted',0)->get();
		$pdf = PDF::loadView('pdf.admitCard',['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
	//return view('pdf.admitCard', ['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,]);
		return $pdf->stream('admitCard.pdf');
	}	

	public function getStudentResult($studentEntityId,$stream){
				$studentInfo = DB::table('students')->where('deleted',0)->where('entityId',$studentEntityId)->get();
			if($studentInfo){
					$classId = $studentInfo[0]->classId;
					$schoolEntityId = $studentInfo[0]->schoolEntityId;
					if($stream == 'pmo'){$streamName = 'totalMarksPmo'; 
						$sectionData = ['analyticalReasoning'=>"",'everydayMathematicalReasoning'=>"",'standardMathematics'=>"",'questZone'=>""] ;								
					}
					else{ $streamName = 'totalMarksPso';
						$sectionData = ['analyticalReasoning'=>"",'everydayScience'=>"",'questZone'=>""] ;
					}
					$tempMarks = 0;	
					$tempStateMarks = 0;	
					$tempCityMarks = 0;	
					$tempSchoolMarks = 0;	
					

					
					$natnationRank = 0;
					$stateRank = 0;
					$cityRank = 0;
					$schoolRank = 0;

					
					
					$studentNatnationRank = 1;
					$studentSateRank = 1;
					$studentCityRank = 1;
					$studentSchoolRank = 1;
					$addressInfo = DB::table('addresses')->where('deleted',0)->where('entityId',$schoolEntityId)->get();
					$stateId = $addressInfo[0]->stateId;
					$cityId = $addressInfo[0]->cityId;
					$schoolInfo = DB::table('schools')
								->join('addresses','schools.entityId','=','addresses.entityId')
								->join('states','addresses.stateId','=','states.id')
								->join('districts','addresses.districtId','=','districts.id')
								->join('citys','addresses.cityId','=','citys.id')
								->where('schools.deleted',0)
								->where('schools.entityId',$schoolEntityId)
								->get();
								
					
					$studentList =	DB::select(DB::raw('select stud.*, sch.entityId sch , sch.schoolName, addr.stateId,addr.cityId from students stud , schools sch, addresses addr where stud.deleted = 0 and stud.attendance = 1 and stud.classId = '.$classId.'  and stud.schoolEntityId = sch.entityId and sch.entityId = addr.entityId  order by stud.'.$streamName.' desc'));
					
							if($stream == 'pmo'){
								$analyticalReasoning = 0;
								$everydayMathematicalReasoning = 0;
								$standardMathematics = 0;
								$questZone = 0;

								$studentResultInfo =	DB::table('student_result')
								->where('studentId',$studentInfo[0]->entityId)
								->where('stream',$stream)
								->where('correct',1)
								->get();
								
								if($studentResultInfo){
									foreach($studentResultInfo as $studentResultData){
									$section =	DB::table('master_question')
										->where('questionId',$studentResultData->questionId)
										->value('section');
										//echo $section."<br>";
										if($section == 'Analytical Reasoning'){
											$analyticalReasoning ++;
										}
										if($section == 'Everyday Mathmatical Reasoning'){
											$everydayMathematicalReasoning ++;
										}
										if($section == 'Standard Mathematics'){
											$standardMathematics ++;
										}
										if($section == 'Quest Zone'){
											$questZone ++;
										}
									}
									$sectionData = ['analyticalReasoning'=>$analyticalReasoning,'everydayMathematicalReasoning'=>$everydayMathematicalReasoning,'standardMathematics'=>$standardMathematics,'questZone'=>$questZone] ;								
								}	
								}else{
								$analyticalReasoning = 0;
								$everydayScience = 0;
								$questZone = 0;

								$studentResultInfo =	DB::table('student_result')
								->where('studentId',$studentInfo[0]->entityId)
								->where('stream',$stream)
								->where('correct',1)
								->get();
								if($studentResultInfo){
									foreach($studentResultInfo as $studentResultData){
									$section =	DB::table('master_question')
										->where('questionId',$studentResultData->questionId)
										->value('section');
										if($section == 'Analytical Reasoning'){
											$analyticalReasoning ++;
										}
										if($section == 'Everyday Science'){
											$everydayScience ++;
										}
										if($section == 'Quest Zone'){
											$questZone ++;
										}
									}
									$sectionData = ['analyticalReasoning'=>$analyticalReasoning,'everydayScience'=>$everydayScience,'questZone'=>$questZone] ;									
								}								
							}



			if($studentList){
					foreach($studentList as $studentListData){
						//	 echo $schoolRank."________".$studentListData->entityId."******".$studentInfo[0]->entityId."-------".$schoolEntityId."========".$studentListData->schoolEntityId."<br>";
							if($stream == 'pmo'){
								// if($tempMarks != $studentListData->totalMarksPmo){
									// $tempMarks = $studentListData->totalMarksPmo;
									// $natnationRank++;
									// if($stateId == $studentListData->stateId){ $stateRank++;}
									// if($cityId == $studentListData->cityId ){ $cityRank++; }
									// if($schoolEntityId == $studentListData->schoolEntityId){ $schoolRank++; }								
								// }
								if($tempMarks != $studentListData->totalMarksPmo){
									$tempMarks = $studentListData->totalMarksPmo;
									$natnationRank++;

								}
								if($tempStateMarks != $studentListData->totalMarksPmo && $stateId== $studentListData->stateId ){$tempStateMarks=$studentListData->totalMarksPmo; $stateRank++;}
								if($tempCityMarks != $studentListData->totalMarksPmo && $cityId== $studentListData->cityId ){$tempCityMarks=$studentListData->totalMarksPmo; $cityRank++;}
								if($tempSchoolMarks != $studentListData->totalMarksPmo && $schoolEntityId== $studentListData->schoolEntityId ){$tempSchoolMarks = $studentListData->totalMarksPmo; $schoolRank++;}
								
							}else{
								if($tempMarks != $studentListData->totalMarksPso){
									$tempMarks = $studentListData->totalMarksPso;
									$natnationRank++;

								}
								if($tempStateMarks != $studentListData->totalMarksPso && $stateId== $studentListData->stateId ){$tempStateMarks=$studentListData->totalMarksPso; $stateRank++;}
								if($tempCityMarks != $studentListData->totalMarksPso && $cityId== $studentListData->cityId ){$tempCityMarks=$studentListData->totalMarksPso; $cityRank++;}
								if($tempSchoolMarks != $studentListData->totalMarksPso && $schoolEntityId== $studentListData->schoolEntityId ){$tempSchoolMarks = $studentListData->totalMarksPso; $schoolRank++;}
							}
							
							if($studentListData->entityId == $studentInfo[0]->entityId){
								if($natnationRank >0){$studentNatnationRank = $natnationRank;}
								if($stateRank >0){$studentSateRank = $stateRank;}
								if($cityRank >0){$studentCityRank = $cityRank;}
								if($schoolRank >0){$studentSchoolRank = $schoolRank;}								
							}
					}
				}
				
					$questionInfo = DB::table('student_result')
								->join('master_question','student_result.questionId','=','master_question.questionId')
								->join('master_answer','student_result.answerId','=','master_answer.answerId')
								->where('student_result.deleted',0)
								->where('student_result.stream',strtoupper($stream))
								->where('student_result.studentId',$studentEntityId)
								->orderBy('student_result.order', 'asc')
								->get();
					
				//	var_dump($questionInfo );
			}
			$totalClass = DB::table('students')->where('classId',$classId)->where('deleted',0)->where('schoolEntityId',$schoolEntityId)->sum('totalMarksPso');
			
		return View('pdf.studentResult',['studentInfo'=>$studentInfo,'sectionData'=>$sectionData,'schoolInfo'=>$schoolInfo, 'studentNatnationRank'=>$studentNatnationRank, 'studentSateRank'=>$studentSateRank, 'studentCityRank'=>$studentCityRank, 'studentSchoolRank'=>$studentSchoolRank, 'stream'=>$stream, 'questionInfo'=>$questionInfo]);
	//	$pdf = PDF::loadView('pdf.studentResult',['studentInfo'=>$studentInfo,'sectionData'=>$sectionData,'schoolInfo'=>$schoolInfo, 'studentNatnationRank'=>$studentNatnationRank, 'studentSateRank'=>$studentSateRank, 'studentCityRank'=>$studentCityRank, 'studentSchoolRank'=>$studentSchoolRank, 'stream'=>$stream, 'questionInfo'=>$questionInfo]);
	//	return $pdf->stream('studentResult.pdf');
	}

//  student result sheet pdf start code----

	public function getResultSheetData(){
		
		$schoolInfo = DB::table('schools')
					->join('addresses','schools.entityId','=','addresses.entityId')
					->join('states','addresses.stateId','=','states.id')
					->join('districts','addresses.districtId','=','districts.id')
					->join('citys','addresses.cityId','=','citys.id')
					->where('schools.deleted',0)
					->where('schools.entityId',session()->get('entityId'))
					->get();
	
		if(Input::get('filterClass') != 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.classId','=',Input::get('filterClass'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						->get();
						

		}
		elseif(Input::get('filterClass') == 0 && Input::get('subject') != "ALL" )
		{
					$student= DB::table('class_names')
                        ->join('students','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->where('students.'.Input::get('subject'),'=',1)
						->orderBy('students.rollNo','asc')
						->get();
						

		}
		else{
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->get();						
		}

						
					$stream = Input::get('subject');	
					//	var_dump($schools);
					$pdf = PDF::loadView('pdf.resultSheet',['student'=>$student,'schools'=>$schoolInfo, 'stream'=>$stream,]);
					return $pdf->stream('resultSheet.pdf');
	//	return View('pdf.resultSheet',['student'=>$student]);
}

/// second level Student admin card 


    public function secondLevelAdmitCard()
	{
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		if(Input::get('subject'))
		{
		$schools= DB::table('schools')->where('deleted',0)->where('entityId',session()->get('SecondLevelSchoolId'))->get();
		$schoolCenter= DB::table('schools')
						->join('entitys','entitys.entityId','=','schools.entityId')
                        ->join('addresses','addresses.entityId','=','schools.entityId')
						->join('states','states.id','=','addresses.stateId')
						->join('phones','phones.entityId','=','schools.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','schools.entityId')
						->join('citys','citys.id','=','addresses.cityId')
						->join('districts','districts.id','=','addresses.districtId')
						->where('schools.entityId',session()->get('schoolCenterId'))
						->where('schools.deleted',0)
						->get();
		$second_level_exams= DB::table('second_level_exams')->where('deleted',0)->where('examType',Input::get('subject'))->get();
		
	    $student= DB::table('secondlevelstudent')
                        ->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('secondlevelstudent.deleted',0)
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('secondlevelstudent.SecondLevelSchoolId',session()->get('SecondLevelSchoolId'))
						->where('secondlevelstudent.stream',Input::get('subject'))
						->orderBy('students.rollNo','asc')
						->get();

						
		$address = DB::table('addresses')->where('deleted',0)->where('entityId',session()->get('entityId'))->get();
		$states = DB::table('states')->where('deleted',0)->where('id',$address[0]->stateId)->value('stateName');
		$districts = DB::table('districts')->where('deleted',0)->where('id',$address[0]->districtId)->value('name');
		$citys = DB::table('citys')->where('deleted',0)->where('id',$address[0]->cityId)->value('cityName');
		$classess = DB::table('class_names')->where('deleted',0)->get();
		
	//var_dump($schoolCenter);	
		$pdf = PDF::loadView('pdf.secondLevelAdmitCard',['student'=>$student,'schools'=>$schools,'address'=>$address[0]->addressLine1." ".$address[0]->addressLine2 ,'states'=>$states,'districts'=>$districts,'citys'=>$citys,'classess'=>$classess,'schoolCenter'=>$schoolCenter,'second_level_exams'=>$second_level_exams,]);
		return $pdf->stream('secondLevelAdmitCard.pdf');
		}
		else{
			return	view('errors.404');
		}
	}	

    public function secondLevelStudentResultSheet()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
	    $student= DB::table('secondlevelstudent')
                        ->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
                        ->join('class_names','class_names.id','=','students.classId')
                        ->join('schools','schools.entityId','=','secondlevelstudent.SecondLevelSchoolId')
						->where('secondlevelstudent.deleted',0)
						->where('students.deleted',0)
						->where('secondlevelstudent.studentAttendance',1)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->orderBy('class_names.name','asc')
						->where('secondlevelstudent.totalMarks', '>', 75)
						->where('secondlevelstudent.stream', Input::get('subject'))
						->select('students.studentName', 'students.fatherName', 'secondlevelstudent.stream', 'class_names.name', 'secondlevelstudent.totalMarks', 'students.rollNo', 'schools.schoolName', 'students.classId')
						->get();
					//	var_dump( $student);
					$pdf = PDF::loadView('pdf.secondLevelStudentResultSheet',['student'=> $student]);
					return $pdf->stream('secondLevelStudentResultSheet.pdf');
    //    return view('pdf.secondLevelStudentResultSheet', compact('student'));
    }


	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(16));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
	
}
