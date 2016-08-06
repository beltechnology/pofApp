<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\User;
class dashboardController extends Controller
{
     public function index()
    {
         return view('dashboard.index');
		
    }
	 

}
