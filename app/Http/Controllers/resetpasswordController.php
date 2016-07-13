<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\User;
class resetpasswordController extends Controller
{
     public function index()
    {
        return view('resetPassword.edit');
    }
	 public function store(Request $request)
    {
	}	
	 public function edit($id)
    {
		$user =User::findOrFail($id);
		return view('resetPassword.edit',['user' => $user]);
		
    }
	  public function update($id, Request $request)
    {
		
		$this->validate($request, ['password' => 'required|min:6|confirmed', ]);
        $user = User::findOrFail($id);	
		$user->update([
		'password' => bcrypt($request['password']),
    ]);
        Session::flash('flash_message', 'password updated!');

        return redirect('/statelist');
    }

}
