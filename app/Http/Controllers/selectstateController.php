<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class selectstateController extends Controller
{
     public function index()
    {
        return view('stateList.create');
    }
	 
    public function store(Request $request)
    {
		$state_id=$request['state'];
		$request->session()->put('currentStateId',$state_id);	
        Session::flash('flash_message', 'Team added!');
		return redirect('employee');
    }
}
