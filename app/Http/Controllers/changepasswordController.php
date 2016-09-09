<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use App\User;
class changepasswordController extends Controller
{
     public function index()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
        return redirect('/changePassword/'.session()->get('userEntityId').'/edit');
    }
	 public function store(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

	}	
	 public function edit($id)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$user =User::findOrFail($id);
		return view('changePassword.edit',['user' => $user]);
    }
	  public function update($id, Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$this->validate($request, ['password' => 'required|min:6|confirmed', ]);
        $user = User::findOrFail($id);	
		$user->update([
		'password' => bcrypt($request['password']),
    ]);
        Session::flash('flash_message', 'password has been changed!');
		echo "<script> alert('Password has been changed') </script>";
        return redirect('/logout');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(12));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}

}
