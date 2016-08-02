<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class archiveController extends Controller
{
     public function index()
    {
        return view('archiveData.create');
    }
	 
    public function store(Request $request)
    {
		
		$sessionYear=$request['sessionYear'];
		$request->session()->put('activeSession',$sessionYear);	
        Session::flash('flash_message', 'Session changed!');
		return redirect('employee');
    }
}
