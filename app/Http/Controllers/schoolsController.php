<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\school;
use App\User;
use App\address;
use App\entity;
use App\emailaddress;
use App\phone;
use App\State;
use App\District;
use App\City;
use App\BookDetail;
use App\ClassName;
use App\studentCount;
use App\payment;
use App\fee;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class schoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
    //    $schools = school::paginate(15);
			$schools= DB::table('schools')
                        ->join('entitys','entitys.entityId','=','schools.entityId')
                        ->join('addresses','addresses.entityId','=','schools.entityId')
						->join('phones','phones.entityId','=','schools.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','schools.entityId')
						->join('citys','citys.id','=','addresses.cityId')
						->join('districts','districts.id','=','addresses.districtId')
						->where('schools.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->groupBy('schools.entityId')
						->orderBy('schools.entityId','desc')
						->paginate(10);
        return view('schools.index', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $districts = DB::table('districts')->where('districts.deleted',0)->where('districts.state_id',session()->get('currentStateId'))->lists('name', 'id');
       $employee= DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->lists('employees.employeeCode', 'employeeId');
       $team= DB::table('teams')
                        ->join('locations','locations.id','=','teams.teamId')
						->where('teams.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
						->lists('teams.teamCode', 'teamId');						
						return view('schools.create',['employee' => $employee,'districts'=>$districts,'team'=>$team]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['posterDistributionDate' => 'required', 'closingDate' => 'required', 'formNo' => 'required', 'schoolName' => 'required', 'principalName' => 'required', 'principalMobile' => 'required', 'principalEmail' => 'required', 'firstCoordinatorName' => 'required', 'firstCoordinatorMobile' => 'required', 'firstCoordinatorEmail' => 'required', 'PMOExamDate' => 'required', 'PSOExamDate' => 'required', 'schoolcode' => 'required', 'teamCode' => 'required', 'employeeCode' => 'required', 'schoolTotalStrength' => 'required', 'classStrength' => 'required', 'followUpDate' => 'required', 'callStatus' => 'required', 'posterDistributed' => 'required', 'KMS' => 'required', ]);

    //    school::create($request->all());
        User::create([
            'designationId' => "",
            'name' => $request['schoolName'],
            'username' => $request['schoolName'],
            'email' => $request['emailAddress'],
            'password' => bcrypt('secret123#'),
        ]);
		 entity::create([
            'entityId' => $request['entityId'],
            'name' => $request['schoolName'],
            'entityType' => '',
        ]);
        school::create([
			'entityId' => $request['entityId'],
            'posterDistributionDate' => $request['posterDistributionDate'],
            'closingDate' => $request['closingDate'],
            'formNo' => $request['formNo'],
            'schoolName' => $request['schoolName'],
            'principalName' => $request['principalName'],
			'principalMobile' => $request['principalMobile'],
            'principalEmail' => $request['principalEmail'],
            'firstCoordinatorName' => $request['firstCoordinatorName'],
            'firstCoordinatorMobile' => $request['firstCoordinatorMobile'],
            'firstCoordinatorEmail' => $request['firstCoordinatorEmail'],
            'secondCoordinator' => $request['secondCoordinator'],
            'secondCoordinatorMobile' => $request['secondCoordinatorMobile'],
            'secondCoordinatorEmail' => $request['secondCoordinatorEmail'],
            'PMOExamDate' => $request['PMOExamDate'],
            'PSOExamDate' => $request['PSOExamDate'],
            'schoolcode' => $request['schoolcode'],
            'uniqueSchoolCode' => "SCHOOL".$request['entityId'],
            'teamCode' => $request['teamCode'],
            'employeeCode' => $request['employeeCode'],
            'schoolTotalStrength' => $request['schoolTotalStrength'],
            'classStrength' => $request['classStrength'],
            'followUpDate' => $request['followUpDate'],
            'callStatus' => $request['callStatus'],
            'posterDistributed' => $request['posterDistributed'],
            'KMS' => $request['KMS'],
            'remarks' => $request['remarks'],
            'sessionYear' => date('Y').'-'.(date('Y')+1),
        ]);
		payment::create(['entityId' => $request['entityId'],
		'schoolId' => $request['schoolCode'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
		]);
		fee::create(['entityId' => $request['entityId'],
		'schoolId' => $request['schoolCode'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
		]);
		$classId = DB::table('class_names')->where('class_names.deleted',0)->where('class_names.status',0)->get();
		foreach($classId as $class_Id)
		{
		$classid=$class_Id->id;
		BookDetail::create(['entityId' => $request['entityId'],
		'classId' => $classid,
		'schoolId' => $request['schoolCode'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
		]);
		studentCount::create(['entityId' => $request['entityId'],
		'classId' => $classid,
		'schoolId' => $request['schoolCode'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
		]);
		}
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
            'primaryNumber' => $request['primaryNumber'],
            'secondaryNumber' => $request['secondaryNumber'],
        ]);




        Session::flash('flash_message', 'school added!');

        return redirect('schools');
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
        $school = school::findOrFail($id);

        return view('schools.show', compact('school'));
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
		
        $school = school::findOrFail($id);
		$entity = entity::findOrFail($id);
		$address = address::findOrFail($id);
		$emailaddress = emailaddress::findOrFail($id);
		$phone = phone::findOrFail($id);
		$districts = DB::table('districts')->where('districts.deleted',0)->lists('name', 'id');
		$citys = DB::table('citys')->where('citys.deleted',0)->lists('cityName', 'id');
		session()->put('entityId',$id);	
       $employee= DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->lists('employees.employeeCode', 'employeeId');
       $team= DB::table('teams')
                        ->join('locations','locations.id','=','teams.teamId')
						->where('teams.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
						->lists('teams.teamCode', 'teamId');						
			//			return view('schools.create',['employee' => $employee,'districts'=>$districts,'team'=>$team]);
		
		return view('schools.edit', ['school' => $school,'entity' => $entity,'address' => $address,'emailaddress' => $emailaddress,'phone' => $phone,'districts' => $districts,'citys' => $citys,'employee' => $employee,'team'=>$team]);
    
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
        $this->validate($request, ['posterDistributionDate' => 'required', 'closingDate' => 'required', 'formNo' => 'required', 'schoolName' => 'required', 'principalName' => 'required','principalMobile' => 'required', 'principalEmail' => 'required', 'firstCoordinatorName' => 'required', 'firstCoordinatorMobile' => 'required', 'firstCoordinatorEmail' => 'required', 'secondCoordinator' => 'required', 'PMOExamDate' => 'required', 'PSOExamDate' => 'required', 'schoolcode' => 'required', 'teamCode' => 'required', 'employeeCode' => 'required', 'schoolTotalStrength' => 'required', 'classStrength' => 'required', 'followUpDate' => 'required', 'callStatus' => 'required', 'posterDistributed' => 'required', 'KMS' => 'required', ]);

        $school = school::findOrFail($id);
        $school->update($request->all());
		
		$address = address::findOrFail($id);	
        $address->update($request->all());
		
		$emailaddress = emailaddress::findOrFail($id);	
        $emailaddress->update($request->all());
		
		$phone = phone::findOrFail($id);	
        $phone->update($request->all());
		
		$entity = entity::findOrFail($id);	
        $entity->update($request->all());

        Session::flash('flash_message', 'school updated!');

        return redirect('schools');
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
	    DB::table('schools')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('addresses')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('entitys')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('emailaddresses')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('phones')->where('entityId', $id)->update(['deleted' => 1]);
        Session::flash('flash_message', 'school deleted!');

        return redirect('schools');
    }
}
