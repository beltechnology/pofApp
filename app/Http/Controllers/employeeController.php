<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\employee;
use App\address;
use App\entity;
use App\emailaddress;
use App\phone;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$employee= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->groupBy('employees.entityId')
						// ->select('employees.*','entitys.name','employees.employeeId','employees.dateOfJoining','addresses.stateId','addresses.districtId','addresses.cityId','addresses.addressLine1','phones.phoneNumber','emailaddresses.email')
						->paginate(5);
        return view('employee.index', compact('employee'));
		
		 

    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('employee.create');
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		 $this->validate($request, ['employeeName' => 'required', 'dob' => 'required', 'address' => 'required', 'state' => 'required', 'district' => 'required', 'city' => 'required', 'pinCode' => 'required', 'primaryMobile' => 'required', 'emailAddress' => 'required', 'designation' => 'required', 'dateOfJoining' => 'required', ]);	
		 
	 employee::create([
        'employeeId' => $request['employeeId'],
		'entityId' => $request['entityId'],
        'dateOfJoining' => $request['dateOfJoining'],
        'state' => $request['state'],
		'district' => $request['district'],
		'city' => $request['city'],
		'designation' => $request['designation'],
		'dob' => $request['dob'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
					]);
	entity::create([
		'entityId' => $request['entityId'],
		'name' => $request['employeeName'],
    ]);
	address::create([
		'entityId' => $request['entityId'],
		'stateId' => $request['state'],
		'districtId' => $request['district'],
		'cityId' => $request['city'],
		'addressLine1' => $request['address'],
		'pincode' => $request['pinCode'],
    ]);
	emailaddress::create([
		'entityId' => $request['entityId'],
		'email' => $request['emailAddress'],
    ]);
	phone::create([
		'entityId' => $request['entityId'],
		'phoneNumber' => $request['primaryMobile'],
		'phoneType' => 'primary',
    ]);
	if($request['secondaryMobile']!=="")
	{
	phone::create([
		'entityId' => $request['entityId'],
		'phoneNumber' => $request['secondaryMobile'],
		'phoneType' => 'secondary',
    ]);
	}

        //employee::create($request->all());

        Session::flash('flash_message', 'employee added!');

        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function show($id)
    {
        $employee = employee::findOrFail($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function edit($id)
    {
		//$employee = employee::;
		$employee= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->where('entityId','=',$id)
						->groupBy('employees.entityId');
		return view('employee.edit', compact('employee'));
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function update($id, Request $request)
    {
		$this->validate($request, ['employeeName' => 'required', 'dob' => 'required', 'address' => 'required', 'state' => 'required', 'district' => 'required', 'city' => 'required', 'pinCode' => 'required', 'primaryMobile' => 'required', 'secondaryMobile' => 'required', 'emailAddress' => 'required', 'designation' => 'required', 'dateOfJoining' => 'required', ]);
        $employee = employee::findOrFail($id);
		
		employee::update([
        'employeeId' => $request['employeeId'],
        'dateOfJoining' => $request['dateOfJoining'],
        'employeeLocation' => $request['employeeLocation'],
		'employeeCode' => $request['employeeCode'],
		'description' => $request['description'],
    ]);
		entity::update([
		'name' => $request['employeeName'],
    ]);
		
        //$employee->update($request->all());

        Session::flash('flash_message', 'employee updated!');

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return void
     */
    public function destroy($id)
    {
        employee::destroy($id);

        Session::flash('flash_message', 'employee deleted!');

        return redirect('employee');
    }
	public function dropdown()
	{

	//$input = Input::get('option');
	//$districts = DB::table('districts')
	//->where('state_id', $input)
	//->orderBy('name', 'desc')
	//->lists('district','selectCity');

	//return Response::json($numbers);
	}
}
