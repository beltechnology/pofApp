<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SessionYear;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class SessionYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $sessionyear = \DB::table('session_years')->where('deleted',0)->paginate(trans('messages.PAGINATE'));

        return view('session-year.index', compact('sessionyear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('session-year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['sessionYear' => 'required|unique:session_years',]);
		DB::table('session_years')->update(['status' => 1]);
        SessionYear::create($request->all());

        Session::flash('flash_message', 'SessionYear added!');

        return redirect('session-year');
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
        $sessionyear = SessionYear::findOrFail($id);

        return view('session-year.show', compact('sessionyear'));
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
        $sessionyear = SessionYear::findOrFail($id);

        return view('session-year.edit', compact('sessionyear'));
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
        
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('session_years')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $sessionyear = SessionYear::findOrFail($id);
		$this->validate($request, ['sessionYear' => 'required|unique:session_years,sessionYear,'.$sessionyear->id.',id,deleted,0']);
        $sessionyear->update($request->all());
		DB::table('session_years')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'SessionYear updated!');
        return redirect('session-year');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('session-year');
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
        \DB::table('session_years')->where('id',$id)->update(['deleted'=>1]);

        Session::flash('flash_message', 'SessionYear deleted!');

        return redirect('session-year');
    }
}
