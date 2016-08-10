<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\employee;
use App\User;
use App\address;
use App\entity;
use App\emailaddress;
use App\phone;
use App\State;
use App\District;
use App\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Mail;
class employeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
			$employee= DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->leftjoin('locations','locations.locationId','=','employees.locationId')
						->leftjoin('teams','teams.teamId','=','employees.teamId')
						->where('employees.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->groupBy('employees.entityId')
						->paginate(trans('messages.PAGINATE'));
						if(session()->get('currentStateId')){
							return view('employee.index', compact('employee'));
						}else
						{
							return redirect('/logout');
						}
    }
	
	public function filter()
    {		$q = Input::get ( 'q' );
			$employee= DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->where('name', 'like', '%'.$q.'%')
						->groupBy('employees.entityId')
						->paginate(trans('messages.PAGINATE'));
						$pagination = $employee->appends ( array ('q' => Input::get ( 'q' )));						
						return view('employee.index', compact('employee'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$districts = DB::table('districts')->where('districts.deleted',0)->where('districts.state_id',session()->get('currentStateId'))->lists('name', 'id');
    return view('employee.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		 $this->validate($request, ['employeeName' => 'required', 'dob' => 'required','employeeCode' => 'required|unique:employees,employeeCode,null,employeeId,deleted,0', 'address' => 'required', 'state' => 'required', 'district' => 'required', 'city' => 'required', 'pinCode' => 'required', 'primaryNumber' => 'required', 'emailAddress' => 'required |unique:emailaddresses,email,null,id,deleted,0', 'designation' => 'required', 'dateOfJoining' => 'required', ]);	
		 $employee_code='';
		 $entityId = DB::table('entitys')->max('entityId')+1;

				
	 User::create([
			'designationId' => $request['designation'],
            'name' => $request['employeeName'],
			'username' => $request['employeeName'],
            'email' => $request['emailAddress'],
            'password' => bcrypt('secret123#'),	
			'entityId' => $entityId,
			]);	 
	 employee::create([
		'entityId' => $entityId,
		'employeeCode' =>$request['employeeCode'],
        'dateOfJoining' => $request['dateOfJoining'],
		'designation' => $request['designation'],
		'dob' => $request['dob'],
		'sessionYear' => date('Y').'-'.(date('Y')+1),
					]);
	
	entity::create([
		'entityId' => $entityId,
		'name' => $request['employeeName'],
		'entityType' => $request['designation'],
    ]);
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
	
	
	 $api_key = trans('messages.API_KEY');
	 $contacts = $request['primaryNumber'];
	 $from = trans('messages.FROM');
	 $sms_text = urlencode(trans('messages.SMS_TEXT_EMPLOYEE'));
	 $routeid = trans('messages.ROUTEID');
	 $api_url= "http://smsw.co.in/API/WebSMS/Http/v1.0a/index.php?username=POFIND&password=pof123&sender=POFCOM&to=".$contacts."&message=".$sms_text."&reqid=#&format={json|text}&route_id=28callback=#&unique=1";
	 $response=@json_encode(file_get_contents($api_url));
	 //$api_url = "http://www.logonutility.in/app/smsapi/index.php?key=".$api_key."&campaign=1&routeid=".$routeid."&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
//Submit to server
	//$response = file_get_contents( $api_url);
		$subject=trans('messages.SCHOOL_MAIL_SUBJECT_ACTIVATION');
       	Mail::send('emails.welcome', ['name'=>$request['employeeName'],], function ($message)use ($request) {		$message->to($request['emailAddress'])->subject($subject);	});
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
		$employee = employee::findOrFail($id);
		$entity = entity::findOrFail($id);
		$address = address::findOrFail($id);
		$emailaddress = emailaddress::findOrFail($id);
		$phone = phone::findOrFail($id);
		$designation=DB::table('designations')->where('designation','!=','superAdmin')->where('deleted',0)->lists('designation','id');
		$teamId=$employee->teamId;
		$locationId=$employee->locationId;
		$teamName = DB::table('teams')->where('teamId',$teamId)->value('teamName');
		$employeeLocation = DB::table('locations')->where('locationId',$locationId)->value('location');
		$districts = DB::table('districts')->where('districts.deleted',0)->lists('name', 'id');
		$citys = DB::table('citys')->where('citys.deleted',0)->lists('cityName', 'id');
		return view('employee.edit', ['employee' => $employee,'entity' => $entity,'address' => $address,'emailaddress' => $emailaddress,'phone' => $phone,'districts' => $districts,'citys' => $citys,'designation'=>$designation,'teamName'=>$teamName,'employeeLocation'=>$employeeLocation]);
		
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
		$this->validate($request, ['name' => 'required', 'dob' => 'required', 'addressLine1' => 'required', 'stateId' => 'required', 'pincode' => 'required', 'primaryNumber' => 'required', 'email' => 'required', 'designation' => 'required', 'dateOfJoining' => 'required',]);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('employees')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
		
        $employee = employee::findOrFail($id);	
        $employee->update($request->all());
		DB::table('employees')->where('entityId',$id)->update(['updateCounter' => $updateCounters]);
		
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
		 Session::flash('flash_message', 'Employee updated!');
		   return redirect('employee');
		}
       else
	   {
		    Session::flash('concurrency_message', 'Data has been changed by some other user');
			  return redirect('employee');
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
		$employeesCode = DB::table('employees')->where('entityId',$id)->value('employeeId');
        DB::table('employees')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('addresses')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('entitys')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('emailaddresses')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('phones')->where('entityId', $id)->update(['deleted' => 1]);
		DB::table('schools')->where('employeeCode', $employeesCode)->update(['employeeCode' =>0]);		
        Session::flash('flash_message', 'employee deleted!');
        return redirect('employee');
		}
	
}
