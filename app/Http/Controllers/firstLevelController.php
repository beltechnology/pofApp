<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\firstLevel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class firstLevelController extends Controller
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
		
        $firstlevel = firstLevel::paginate(15);

        return view('first-level.index', compact('firstlevel'));
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

        return view('first-level.create');
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

        firstLevel::create($request->all());

        Session::flash('flash_message', 'firstLevel added!');

        return redirect('first-level');
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

        $firstlevel = firstLevel::findOrFail($id);

        return view('first-level.show', compact('firstlevel'));
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

        $firstlevel = firstLevel::findOrFail($id);

        return view('first-level.edit', compact('firstlevel'));
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

		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('first_levels')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
			$examLevelId=$request->input('examLevelId');
			$reportTime=$request->input('reportTime');
			$examStartTime=$request->input('examStartTime');
			$examEndTime=$request->input('examEndTime');
			DB::table('first_levels')->where('entityId', $id)->update(['examLevelId' =>$examLevelId,'reportTime' =>$reportTime,'examStartTime' =>$examStartTime,'examEndTime'=>$examEndTime,'updateCounter' => $updateCounters]);
			Session::flash('flash_message', 'firstLevel updated!');
        return redirect('first-level/'.$id.'/edit');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('first-level/'.$id.'/edit');
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

        firstLevel::destroy($id);

        Session::flash('flash_message', 'firstLevel deleted!');

        return redirect('first-level');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(17));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
