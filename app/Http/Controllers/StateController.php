<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\State;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class StateController extends Controller
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

        $state =\DB::table('states')->where('states.deleted',0)->groupBy('states.id')
		->paginate(trans('messages.PAGINATE'));

        return view('state.index', compact('state'));
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

        return view('state.create');
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

        $this->validate($request, ['stateName' => 'required|unique:states,stateName,null,id,deleted,0', ]);

        State::create($request->all());

        Session::flash('flash_message', 'State added!');

        return redirect('state');
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

        $state = State::findOrFail($id);

        return view('state.show', compact('state'));
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

        $state = State::findOrFail($id);

        return view('state.edit', compact('state'));
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

		$state = State::findOrFail($id);
        $this->validate($request, ['stateName' => 'required|unique:states,stateName,'.$state->id.',id,deleted,0', ]);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('states')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $state->update($request->all());
		DB::table('states')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'State updated!');
        return redirect('state');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('state');
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

        \DB::table('states')->where('id', $id)->update(['deleted' => 1]);

        Session::flash('flash_message', 'State deleted!');

        return redirect('state');
    }
	
	public function CheckUser()
	{

		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(1));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
