<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
class resetpasswordController extends Controller
{
     public function index()
    {
        return view('resetPassword.create');
    }
	  public function update($id, Request $request)
    {
		$this->validate($request, ['name' => 'required', 'dob' => 'required', 'addressLine1' => 'required', 'stateId' => 'required', 'pincode' => 'required', 'primaryNumber' => 'required', 'email' => 'required', 'designation' => 'required', 'dateOfJoining' => 'required', ]);
        $employee = employee::findOrFail($id);	
        $employee->update($request->all());
		
		$address = address::findOrFail($id);	
        $address->update($request->all());
		
		$emailaddress = emailaddress::findOrFail($id);	
        $emailaddress->update($request->all());
		
		$phone = phone::findOrFail($id);	
        $phone->update($request->all());
		
		$entity = entity::findOrFail($id);	
        $entity->update($request->all());
		
        Session::flash('flash_message', 'employee updated!');

        return redirect('employee');
    }

}
