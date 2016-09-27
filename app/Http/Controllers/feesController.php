<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\fee;
use App\studentCount;
use App\school;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
class feesController extends Controller
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

        $fees = fee::paginate(15);

        return view('fees.index', compact('fees'));
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

        return view('fees.create');
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



        $this->validate($request, ['teamId' => 'required', ]);

        fee::create($request->all());

        Session::flash('flash_message', 'fee added!');

        return redirect('fees');
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

        $fee = fee::findOrFail($id);
        return view('fees.show', compact('fee'));
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

        $fee = fee::findOrFail($id);
		$noofstudentPMO = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('noofstudentPMO');
		$noofstudentPSO = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('noofstudentPSO');
		$handicapped = DB::table('student_counts')->where('student_counts.entityId',$id)->sum('handicapped');
		$totalStudents=($noofstudentPMO+$noofstudentPSO)-$handicapped;
        return view('fees.edit', compact('fee'))->with('totalStudents',$totalStudents);
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

		$updateCounters=Input::get('updateCounter')+1;
		$updateCounterdata = DB::table('fees')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
			$examLevelId=$request->input('examLevelId');
			$totalAmount=$request->input('totalAmount');
			$studentsFees=$request->input('studentsFees');
			$restAmount=$request->input('restAmount');
			$otherExpenses=$request->input('otherExpenses');
			$receivedAmount=$request->input('receivedAmount');
			DB::table('fees')->where('entityId', $id)->update(['examLevelId' =>$examLevelId,'totalAmount' =>$totalAmount,'otherExpenses' =>$otherExpenses,'studentsFees'=>$studentsFees,'restAmount'=>$restAmount,'receivedAmount'=>$receivedAmount,'updateCounter' => $updateCounters]);
			Session::flash('flash_message', 'fee updated!');
			return redirect('fees/'.$id.'/edit');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('fees/'.$id.'/edit');
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

		DB::table('schools')->where('entityId', $id)->update(['status' => 1]);
        Session::flash('flash_message', 'fee deleted!');

        return redirect('fees/'.$id.'/edit');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(15));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
	
}
