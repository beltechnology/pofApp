<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return view('home');
    }
	  public function resetPassword()
    {	
		// $email= \DB::table('entitys')
						// ->join('emailaddresses','emailaddresses.entityId','=','entitys.entityId')
						// ->where('entitys.deleted',0)
						// ->groupBy('entitys.entityId');
       return view('resetpassword', compact('email'));
    }
}
