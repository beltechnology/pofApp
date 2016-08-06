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
        return redirect('/changePassword/'.session()->get('userEntityId').'/edit');
    }
	 public function store(Request $request)
    {
	}	
	 public function edit($id)
    {
		$user =User::findOrFail($id);
		return view('changePassword.edit',['user' => $user]);
    }
	  public function update($id, Request $request)
    {
		
		$this->validate($request, ['password' => 'required|min:6|confirmed', ]);
        $user = User::findOrFail($id);	
		$user->update([
		'password' => bcrypt($request['password']),
    ]);
        Session::flash('flash_message', 'password has been changed!');
		echo "<script> alert('Password has been changed') </script>";
        return redirect('/logout');
    }

}
