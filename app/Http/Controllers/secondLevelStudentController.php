<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\student;
use App\entity;
use App\school;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class secondLevelStudentController extends Controller
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
	//echo session()->get('SecondLevelSchoolId');
		$studentClass = DB::table('class_names')->where('deleted',0)->get();
	    $student= DB::table('secondlevelstudent')
                        ->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
                        ->join('class_names','class_names.id','=','students.classId')
						->where('secondlevelstudent.deleted',0)
						->where('students.deleted',0)
						->where('students.resultDeclared',2)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->where('secondlevelstudent.SecondLevelSchoolId',session()->get('SecondLevelSchoolId'))
						->orderBy('students.rollNo','asc')
						->paginate(30);
        return view('secondlevelstudent.index', compact('student'))->with('studentClass',$studentClass);
    }

    public function secondLevelStudentResult()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
	    $student= DB::table('secondlevelstudent')
                        ->join('students','students.entityId','=','secondlevelstudent.studentEntityId')
                        ->join('class_names','class_names.id','=','students.classId')
                        ->join('schools','schools.entityId','=','secondlevelstudent.SecondLevelSchoolId')
						->where('secondlevelstudent.deleted',0)
						->where('students.deleted',0)
						->where('students.resultDeclared',2)
						->where('secondlevelstudent.studentAttendance',1)
						->where('class_names.deleted',0)
						->where('students.sessionYear',session()->get('activeSession'))
						->orderBy('class_names.name','asc')
					//	->where('secondlevelstudent.totalMarks', '>', 40)
						->select('students.studentName', 'students.fatherName', 'secondlevelstudent.stream', 'class_names.name', 'secondlevelstudent.totalMarks', 'students.rollNo', 'schools.schoolName', 'students.classId')
						->paginate(30);
					//	var_dump( $student);
        return view('secondlevelstudent.secondLevelStudentResult', compact('student'));
    }



	public function secondLevelAttendance(){
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		foreach(Input::get('attendance') as $attendance){
		 DB::table('secondlevelstudent')->where('studentEntityId', $attendance)->update(['studentAttendance' => Input::get('attendanceBtn')]);
		}
		return Redirect::back();
	}


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
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

		DB::table('students')->where('entityId', $id)->update(['resultDeclared' => 1]);
        Session::flash('flash_message', 'student deleted!');
        return Redirect::back();
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
