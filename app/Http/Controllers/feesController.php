<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\fee;
use App\studentCount;
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
        return view('fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
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
       // $this->validate($request, ['totalAmount' => 'totalAmount', ]);
        //$fee = fee::findOrFail($id);
        //$fee->update($request->all());
			$examLevelId=$request->input('examLevelId');
			$totalAmount=$request->input('totalAmount');
			$restAmount=$request->input('restAmount');
			$otherExpenses=$request->input('otherExpenses');
			$receivedAmount=$request->input('receivedAmount');
			DB::table('fees')->where('entityId', $id)->update(['examLevelId' =>$examLevelId,'totalAmount' =>$totalAmount,'otherExpenses' =>$otherExpenses,'restAmount'=>$restAmount,'receivedAmount'=>$receivedAmount]);
			Session::flash('flash_message', 'fee updated!');
			return redirect('fees/'.$id.'/edit');
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
        fee::destroy($id);

        Session::flash('flash_message', 'fee deleted!');

        return redirect('fees');
    }
}
