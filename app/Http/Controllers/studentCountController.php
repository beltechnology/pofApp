<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\studentCount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class studentCountController extends Controller
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
		
        $studentcount = studentCount::paginate(15);
        return view('student-count.index', compact('studentcount'));
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

        return view('student-count.create');
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

        studentCount::create($request->all());

        Session::flash('flash_message', 'studentCount added!');

        return redirect('student-count');
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

        $studentcount = studentCount::findOrFail($id);
        return view('student-count.show', compact('studentcount'));
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

		$studentcount = studentCount::findOrFail($id);
		$studentcounts = DB::table('student_counts')->join('class_names','class_names.id','=','student_counts.classId')->where('student_counts.deleted',0)->where('student_counts.entityId',$id)->get();
		$noofstudentPMO = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('noofstudentPMO');
		$noofstudentPSO = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('noofstudentPSO');
		$handicapped = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('handicapped');
        return view('student-count.edit', compact('studentcount'))->with('studentcounts',$studentcounts)->with('noofstudentPMO',$noofstudentPMO)->with('noofstudentPSO',$noofstudentPSO)->with('handicapped',$handicapped);
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

		$this->validate($request, ['entityId' => '', ]);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('student_counts')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $i= 0;
		foreach($request->input('classId') as $classId)
		{
			$noofstudentPMO=$request->input('noofstudentPMO')[$i];
			$noofstudentPSO=$request->input('noofstudentPSO')[$i];
			$handicapped=$request->input('handicapped')[$i];
			DB::table('student_counts')->where('entityId', $id)->where('classId', $classId)->update(['noofstudentPMO' =>$noofstudentPMO,'noofstudentPSO' =>$noofstudentPSO,'handicapped' =>$handicapped,'updateCounter' => $updateCounters]);
			$i++;
		}
        Session::flash('flash_message', 'studentCount updated!');

        return redirect('student-count/'.$id.'/edit');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('student-count/'.$id.'/edit');
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
		
        studentCount::destroy($id);

        Session::flash('flash_message', 'studentCount deleted!');

        return redirect('student-count');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(13));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
