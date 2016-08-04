<?php

namespace App\Http\Controllers;
use Mail;
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
use App\firstLevel;
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
						->where('schools.sessionYear',session()->get('activeSession'))
						->where('addresses.stateId',session()->get('currentStateId'))
						->groupBy('schools.entityId')
						->orderBy('schools.entityId','desc')
						->paginate(trans('messages.PAGINATE'));
        return view('schools.index', compact('schools'));
    }
	
	public function filter()
    {		$q = Input::get ( 'q' );
			$schools= DB::table('schools')
                        ->join('entitys','entitys.entityId','=','schools.entityId')
                        ->join('addresses','addresses.entityId','=','schools.entityId')
						->join('phones','phones.entityId','=','schools.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','schools.entityId')
						->join('citys','citys.id','=','addresses.cityId')
						->join('districts','districts.id','=','addresses.districtId')
						->where('schools.deleted',0)
						->where('schools.sessionYear',session()->get('activeSession'))
						->where('addresses.stateId',session()->get('currentStateId'))
						->where('formNo', 'like', '%'.$q.'%')
						->orwhere('schoolName', 'like', '%'.$q.'%')
						->orwhere('schoolcode', 'like', '%'.$q.'%')
						->orwhere('uniqueSchoolCode', 'like', '%'.$q.'%')
						->orwhere('cityName', 'like', '%'.$q.'%')
						->orwhere('principalName', 'like', '%'.$q.'%')
						->groupBy('schools.entityId')
						->orderBy('schools.entityId','desc')
						->paginate(trans('messages.PAGINATE'));
						$pagination = $schools->appends ( array ('q' => Input::get ( 'q' )));						
						return view('schools.index', compact('schools'));
		//	return redirect('schools');				

    }
	public function activateSchool()
    {
			$schools= DB::table('schools')
                        ->join('entitys','entitys.entityId','=','schools.entityId')
                        ->join('addresses','addresses.entityId','=','schools.entityId')
						->join('phones','phones.entityId','=','schools.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','schools.entityId')
						->join('citys','citys.id','=','addresses.cityId')
						->join('districts','districts.id','=','addresses.districtId')
						->where('schools.deleted',0)
						->where('schools.sessionYear',session()->get('activeSession'))
						->where('addresses.stateId',session()->get('currentStateId'))
						->groupBy('schools.entityId')
						->orderBy('schools.entityId','desc')
						->paginate(trans('messages.PAGINATE'));
			if(Input::get('activationSchool'))
			{ 	
				foreach(Input::get('activationSchool') as $activationSchool)
				{
						 DB::table('schools')->where('entityId', $activationSchool)->update(['activationSchool' => Input::get('activateSchool')]);
						 if(Input::get('activateSchool') === trans('messages.ZERO')){
							// school
							$email = DB::table('schools')->where('entityId',$activationSchool)->value('principalEmail');
							Mail::send('emails.schoolActivation', ['school'=>'school',], function ($message)use ($email) {$message->to($email);	});
							$api_key = trans('messages.API_KEY');
							$phones = DB::table('schools')->where('entityId',$activationSchool)->value('principalMobile');
							$contacts = $phones;
							$from = trans('messages.FROM');
							$routeid = trans('messages.ROUTEID');
							$sms_text = urlencode("Hi , fee for first leavel POF exam has been received. you will receive details by mail . thanks for your interest & support.");
							$api_url = "http://www.logonutility.in/app/smsapi/index.php?key=".$api_key."&campaign=1&routeid=".$routeid."&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
							$response = file_get_contents( $api_url);
						 }
				}
						
			}			
		return redirect('schools');				
    //    return view('schools.index', compact('schools'));
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
						->lists('employees.employeeCode', 'employees.entityId');
       $team= DB::table('teams')
                        ->join('locations','locations.locationId','=','teams.teamLocation')
						->where('teams.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
						->lists('teams.teamCode', 'teamId');	
		 $sessionYear= DB::table('session_years')->where('session_years.deleted',0)->lists('session_years.sessionYear', 'id');	
						return view('schools.create',['employee' => $employee,'districts'=>$districts,'team'=>$team,'sessionYear'=>$sessionYear]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['posterDistributionDate' => 'required', 'closingDate' => 'required', 'formNo' => 'required', 'schoolName' => 'required', 'principalName' => 'required', 'principalMobile' => 'required', 'principalEmail' => 'required','principalGift'=>'required', 'firstCoordinatorName' => 'required', 'firstCoordinatorMobile' => 'required', 'firstCoordinatorEmail' => 'required', 'coordinatorGift' => 'required', 'PMOExamDate' => 'required', 'PSOExamDate' => 'required', 'schoolcode' => 'required', 'teamCode' => 'required', 'employeeCode' => 'required', 'employeeMobileType' => 'required', 'schoolTotalStrength' => 'required', 'classStrength' => 'required', 'followUpDate' => 'required', 'callStatus' => 'required', 'posterDistributed' => 'required', 'KMS' => 'required', ]);
		$stateSymbol =  DB::table('states')->where('id',session()->get('currentStateId'))->value('stateName');
		$stateSymbol=explode('(',$stateSymbol);
		$stateSymbol=$stateSymbol[1];
		$stateSymbol=explode(')',$stateSymbol);
		$stateSymbol=$stateSymbol[0];
		$school_code='';
	$entityId = DB::table('entitys')->max('entityId')+1;	$schoolCode = DB::table('schools')->max('id')+1;
		
		if($schoolCode<10)
		{	
		$school_code=$stateSymbol.'POF00'.$schoolCode;
		}
		else if($schoolCode<100)
		{
		$school_code =$stateSymbol.'POF0'.$schoolCode;
		}	
		else
		{
		$school_code =$stateSymbol.'POF'.$schoolCode;
		}	
	
        User::create([
            'designationId' => "",
            'name' => $request['schoolName'],
            'username' => $request['schoolName'],
            'email' => $request['emailAddress'],
            'password' => bcrypt('secret123#'),
        ]);
		 entity::create([
            'entityId' => $entityId,
            'name' => $request['schoolName'],
            'entityType' => '',
        ]);
        school::create([
			'entityId' => $entityId,
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
            'uniqueSchoolCode' => $school_code,
            'teamCode' => $request['teamCode'],
            'employeeCode' => $request['employeeCode'],
            'schoolTotalStrength' => $request['schoolTotalStrength'],
            'classStrength' => $request['classStrength'],
            'followUpDate' => $request['followUpDate'],
            'callStatus' => $request['callStatus'],
            'posterDistributed' => $request['posterDistributed'],
            'KMS' => $request['KMS'],
            'remarks' => $request['remarks'],
			'principalGift' => $request['principalGift'],
			'coordinatorGift' => $request['coordinatorGift'],
			'employeeMobileType' => $request['employeeMobileType'],
            'sessionYear' => $request['sessionYear'],
        ]);
		payment::create(['entityId' => $entityId,
		'schoolId' => $schoolCode,
		'sessionYear' => $request['sessionYear'],
		]);
		fee::create(['entityId' => $entityId,
		'schoolId' => $schoolCode,
		'sessionYear' => $request['sessionYear'],
		]);
		firstLevel::create(['entityId' => $entityId,
		'schoolId' => $schoolCode,
		'sessionYear' => $request['sessionYear'],
		]);
		$classId = DB::table('class_names')->where('class_names.deleted',0)->where('class_names.status',0)->get();
		foreach($classId as $class_Id)
		{
		$classid=$class_Id->id;
		BookDetail::create(['entityId' => $entityId,
		'classId' => $classid,
		'schoolId' => $schoolCode,
		'sessionYear' => $request['sessionYear'],
		]);
		studentCount::create(['entityId' => $entityId,
		'classId' => $classid,
		'schoolId' => $schoolCode,
		'sessionYear' => $request['sessionYear'],
		]);
		}
        address::create([
            'entityId' => $entityId,
            'stateId' => $request['state'],
            'districtId' => $request['district'],
            'cityId' => $request['city'],
            'addressLine1' => $request['address'],
            'pincode' => $request['pinCode'],
        ]);
        emailaddress::create([
            'entityId' => $entityId,
            'email' => $request['emailAddress'],
        ]);
        phone::create([
            'entityId' => $entityId,
            'primaryNumber' => $request['primaryNumber'],
            'secondaryNumber' => $request['secondaryNumber'],
        ]);
		
		
		
		$phones = DB::table('phones')->where('entityId',$request['teamLeader'])->value('primaryNumber');
		$api_key = trans('messages.API_KEY');
		$contacts = "'".$request['principalMobile'].",".$request['firstCoordinatorMobile'].",".$request['secondCoordinatorMobile']."'";
		$from = trans('messages.FROM');
		$sms_text = urlencode(trans('messages.COORDINATOR'));
		$routeid = trans('messages.ROUTEID');
		$api_url = "http://www.logonutility.in/app/smsapi/index.php?key=".$api_key."&campaign=1&routeid=".$routeid."&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
		$response = file_get_contents( $api_url);
		
		

		$emails = [$request['principalEmail'],$request['firstCoordinatorEmail'],$request['secondCoordinatorEmail'],trans('messages.OFFICEEMAILID')];
		
		Mail::send('emails.schoolCreation', ['schoolName'=>$request['schoolName'],], function ($message)use ($emails) {$message->to($emails);	});
		
		// employee
		$email = DB::table('emailaddresses')->where('entityId',$request['employeeCode'])->value('email');
		Mail::send('emails.schoolCreationEmp', ['schoolName'=>$request['schoolName'],], function ($message)use ($email) {$message->to($email);	});
		
		$phones = DB::table('phones')->where('entityId',$request['employeeCode'])->value('primaryNumber');
		$contacts = $phones;
		$sms_text = urlencode("Your lead school ".$request['schoolName']." has been added to our system . to will be updated with next task by message");
		$api_url = "http://www.logonutility.in/app/smsapi/index.php?key=".$api_key."&campaign=1&routeid=".$routeid."&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
		$response = file_get_contents( $api_url);

		
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
						->lists('employees.employeeCode', 'employees.entityId');
       $team= DB::table('teams')
                        ->join('locations','locations.locationId','=','teams.teamLocation')
						->where('teams.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
						->lists('teams.teamCode', 'teamId');						
		 $sessionYear= DB::table('session_years')->where('session_years.deleted',0)->lists('session_years.sessionYear', 'id');
		return view('schools.edit', ['school' => $school,'entity' => $entity,'address' => $address,'emailaddress' => $emailaddress,'phone' => $phone,'districts' => $districts,'citys' => $citys,'employee' => $employee,'team'=>$team,'sessionYear'=>$sessionYear]);
    
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
         $this->validate($request, ['posterDistributionDate' => 'required', 'closingDate' => 'required', 'formNo' => 'required', 'schoolName' => 'required', 'principalName' => 'required', 'principalMobile' => 'required', 'principalEmail' => 'required','principalGift'=>'required', 'firstCoordinatorName' => 'required', 'firstCoordinatorMobile' => 'required', 'firstCoordinatorEmail' => 'required', 'coordinatorGift' => 'required', 'PMOExamDate' => 'required', 'PSOExamDate' => 'required', 'schoolcode' => 'required', 'teamCode' => 'required', 'employeeCode' => 'required', 'employeeMobileType' => 'required', 'schoolTotalStrength' => 'required', 'classStrength' => 'required', 'followUpDate' => 'required', 'callStatus' => 'required', 'posterDistributed' => 'required', 'KMS' => 'required', ]);

		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('schools')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $school = school::findOrFail($id);
        $school->update($request->all());
		DB::table('schools')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
		$address = address::findOrFail($id);	
        $address->update($request->all());
		DB::table('addresses')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
		$emailaddress = emailaddress::findOrFail($id);	
        $emailaddress->update($request->all());
		DB::table('emailaddresses')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
		$phone = phone::findOrFail($id);	
        $phone->update($request->all());
		DB::table('phones')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
		$entity = entity::findOrFail($id);	
        $entity->update($request->all());
		DB::table('entitys')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);

		

        Session::flash('flash_message', 'school updated!');
        return redirect('schools');
		}
       else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('schools');
	   }   
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
		DB::table('students')->where('schoolEntityId', $id)->update(['deleted' => 1]);
		DB::table('book_details')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('first_levels')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('fees')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('payments')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('student_counts')->where('entityId', $id)->update(['deleted' => 1]);
        Session::flash('flash_message', 'school deleted!');
		return redirect('schools');
    }
}
