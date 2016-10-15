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
					if($stream == 'PMO'){$streamName = 'totalMarksPmo'; } else{ $streamName = 'totalMarksPso'; }
				//	$schoolInfo = DB::table('students')->where('deleted',0)->where('entityId',$studentEntityId)->get();
					$studentClassWiseList = DB::table('students')->where('deleted',0)->where('schoolEntityId',$schoolEntityId)->orderBy($streamName, 'DESC')->where($stream,1)->get();
					$rank = 1;
					$tempMarks = 0;
					foreach($studentClassWiseList as $studentClassList){
						if($studentClassList->entityId == $studentInfo[0]->entityId){
							$schookRank = $rank;
						}
						if($stream == 'PMO'){
							if($tempMarks != $studentClassList->totalMarksPmo){
								$tempMarks = $studentClassList->totalMarksPmo;
								$rank++;
							}
						}else{
							if($tempMarks != $studentClassList->totalMarksPso){
								$tempMarks = $studentClassList->totalMarksPso;
								$rank++;
							}
						}
					}
					
					
					$cityId = DB::table('addresses')->where('deleted',0)->where('entityId',$schoolEntityId)->value('cityId');
					$studentCityWiseList = DB::raw("select * from students,schools , addresses where schools.entityId= addresses.entityId and addresses.cityId = 19 and students.classId = 2");
					// DB::table('students, schools , addresses')
										// ->where('schools.entityId','=','addresses.entityId')
										// ->where('students.classId',$classId)
										// ->where('students.deleted',0)
										// ->where('addresses.cityId',$cityId)
										// // ->where('students.'.$stream,1)
										// // ->orderBy('students.'.$streamName, 'DESC')
										//->get();
				
					var_dump($studentCityWiseList);



				
				}
		
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
