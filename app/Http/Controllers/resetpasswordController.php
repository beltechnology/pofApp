<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
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

        //return redirect('/statelist');
		
				$designations =  DB::table('designations')->where('id',$user->designationId)->value('designation');
				$sessionYear =  DB::table('session_years')->where('status',0)->value('id');
				if($designations == "superAdmin")
				{
					$request->session()->put('userEntityId',$user->entityId);
					$request->session()->put('designationId',$user->designationId);
					session()->put('activeSession',$sessionYear);
					return redirect()->intended('/statelist');
				}
				else{
		 		$request->session()->put('userEntityId',$user->entityId);
		 		$request->session()->put('designationId',$user->designationId);
					$stateId =  DB::table('addresses')->where('entityId', $user->entityId)->value('stateId');
					$request->session()->put('currentStateId',$stateId);
					session()->put('activeSession',$sessionYear);
					return redirect()->intended('/dashboard');
				}
		
		
    }

}
