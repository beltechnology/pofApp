<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class archiveController extends Controller
{
     public function index()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        return view('archiveData.create');
    }
	 
    public function store(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$sessionYear=$request['sessionYear'];
		$request->session()->put('activeSession',$sessionYear);	
        Session::flash('flash_message', 'Session changed!');
		return redirect('employee');
    }
	
	public function CheckUser()
	{
		
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(7));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
