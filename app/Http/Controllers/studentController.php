<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\student;
use App\entity;
use App\school;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$studentClass = DB::table('class_names')->where('deleted',0)->get();
	   $student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->paginate(30);
        return view('student.index', compact('student'))->with('studentClass',$studentClass);
    }

    public function searchFilter()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		if(Input::get('filterClass') == 0 && Input::get('subject') == "ALL" )
		{
				   $student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('students.deleted',0)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('students.schoolEntityId',session()->get('entityId'))
						->orderBy('students.rollNo','asc')
						->paginate(30);
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
						->paginate(30);

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
					$student= DB::table('students')
                        ->join('class_names','class_names.id','=','students.classId')
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
		
	   $studentClass = DB::table('class_names')->where('deleted',0)->get();
						
					$student->appends(array(
						'filterClass' => Input::get('filterClass'),
						'subject'   => Input::get('subject'),
					));	
        return view('student.index', compact('student'))->with('studentClass',$studentClass);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$schoolSessionYear = DB::table('schools')->where('schools.deleted',0)->where('schools.entityId',session()->get('entityId'))->value('sessionYear');
		$classes = DB::table('class_names')->where('class_names.deleted',0)->lists('name', 'id');
		$classSections= DB::table('class_sections')->where('class_sections.deleted',0)->lists('class_sections.name', 'id');
        return view('student.create',['classes' => $classes,'schoolSessionYear' => $schoolSessionYear,'classSections'=>$classSections]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
        $this->validate($request, ['studentName' => 'required', 'fatherName' => 'required', 'dob' => 'required', 'classId' => 'required', 'pmo' => 'required', 'pso' => 'required', 'handicapped' => 'required', ]);
		$entityId = DB::table('entitys')->max('entityId')+1;
		$stateSymbol =  DB::table('states')->where('id',session()->get('currentStateId'))->value('stateName');
		$stateSymbol=explode('(',$stateSymbol);
		$stateSymbol=$stateSymbol[1];
		$stateSymbol=explode(')',$stateSymbol);
		$stateSymbol=$stateSymbol[0];
		$classId = DB::table('class_names')->where('id',$request['classId'])->where('class_names.deleted',0)->value('name');
		$schoolId = DB::table('schools')->where('entityId',session()->get('entityId'))->where('schools.deleted',0)->value('uniqueSchoolCode');
		$maxRollNo = DB::table('students')->where('schoolEntityId',session()->get('entityId'))->where('classId',$request['classId'])->count()+1;

	
		if($maxRollNo<10)
		{	$roll_id='00'.$maxRollNo; }
		else if($maxRollNo<100)
		{ $roll_id ='0'.$maxRollNo; }	
		else
		{ $roll_id =$maxRollNo; }	
	
	if($classId<10)
		{$class_id='0'.$classId; }
		else
		{ $class_id =$classId; }	
		
		$rollNo= $schoolId.'-'.$class_id.'-'.$roll_id;
		entity::create([
		'entityId' => $entityId,
		'name' => $request['studentName'],
		'entityType' => 'student',
    ]);
        student::create([
		'entityId'=>$entityId,
		'schoolEntityId'=>session()->get('entityId'),
		'sessionYear'=> $request['sessionYear'],
		'studentName'=>$request['studentName'],
		'fatherName'=>$request['fatherName'],
		'dob'=>$request['dob'],
		'classId'=>$request['classId'],
		'section'=>$request['section'],
		'pmo'=>$request['pmo'],
		'pso'=>$request['pso'],
		'handicapped'=>$request['handicapped'],
		'rollNo'=>$rollNo,
	]);

        Session::flash('flash_message', 'student added!');

        return redirect('student');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $student = student::findOrFail($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $student = student::findOrFail($id);
		$classes = DB::table('class_names')->where('class_names.deleted',0)->lists('name', 'id');
		$classSections= DB::table('class_sections')->where('class_sections.deleted',0)->lists('class_sections.name', 'id');
        return view('student.edit',['student'=>$student,'classes'=>$classes,'classSections'=>$classSections]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $this->validate($request, ['studentName' => 'required', 'fatherName' => 'required', 'dob' => 'required', 'classId' => 'required','pmo' => 'required', 'pso' => 'required', 'handicapped' => 'required', 'rollNo' => 'required', ]);
		
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('students')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $student = student::findOrFail($id);
        $student->update($request->all());
		DB::table('entitys')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
		$entity = entity::findOrFail($id);	
        $entity->update($request->all());
		DB::table('students')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'student updated!');
        return redirect('student');
		}
       else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('student');
	   }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		DB::table('students')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('entitys')->where('entityId', $id)->update(['deleted' => 1]);
		

        Session::flash('flash_message', 'student deleted!');

        return redirect('student');
    }
	
    public function attendanceScreen()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		foreach(Input::get('attendance') as $attendance){
		 DB::table('students')->where('entityId', $attendance)->update(['attendance' => Input::get('attendanceBtn')]);
		}
		return redirect('student');
    }
	
	
	
    public function studentSecondLevel()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
			if(!empty(Input::get('secondLevelStudent'))){
			foreach(Input::get('secondLevelStudent') as $secondLevelStudent){
			$studentInfo =  DB::table('students')->where('entityId', $secondLevelStudent)->get();
			$stream = false;
			if($studentInfo[0]->pso){
				$stream = "pso";
			}
			if($studentInfo[0]->pmo){
				$stream = "pmo";
			}
			$exitstudentInfo =  DB::table('secondlevelstudent')->where('studentEntityId', $secondLevelStudent)->get();
				if(!$exitstudentInfo && $stream){
					$studentData = ['studentEntityId'=>$secondLevelStudent,'SecondLevelSchoolId'=>$studentInfo[0]->schoolEntityId,'stream'=>$stream];
					secondLevelStudent::create($studentData);
					DB::table('students')->where('entityId', $secondLevelStudent)->update(['resultDeclared' => 2]);
				}
			}
		}
	//	return redirect('student');
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
