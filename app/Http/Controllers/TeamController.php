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
use App\Team;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
use Illuminate\Support\Facades\Mail;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$team = DB::table('teams')
                        ->leftjoin('locations','locations.locationId','=','teams.teamLocation')
						->where('teams.deleted',0)
						->Where(function ($query) {
						$query->orwhere('locations.state_id', '=', session()->get('currentStateId'))
                      ->orwhere('teams.teamLocation', '=', 0);
            })
						->orderby('teams.teamId')
						->paginate(trans('messages.PAGINATE'));
						
		$employees= DB::table('teams')
						 ->join('employees','employees.teamId','=','teams.teamId')
						 ->join('entitys','entitys.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->get();
        return view('team.index',['team' => $team,'employees' => $employees]);
    }

	public function filter()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$q = Input::get ('q');
			$team = DB::table('teams')
                        ->leftjoin('locations','locations.locationId','=','teams.teamLocation')
						->where('teams.deleted',0)
						->Where(function ($query) {
						$query->orwhere('locations.state_id', '=', session()->get('currentStateId'))
						->orwhere('teams.teamLocation', '=', 0);
						})
						->where(function ($query) use ($q) {
							return $query->orWhere('teams.teamName', 'like', '%'.$q.'%')
							->orwhere('teams.teamCode', 'like', '%'.$q.'%')
							->orwhere('locations.location', 'like', '%'.$q.'%');
						})
						->orderby('teams.teamId')
						->paginate(trans('messages.PAGINATE'));
						$pagination = $team->appends ( array ('q' => Input::get ( 'q' )));	

							$employees= DB::table('teams')
						 ->join('employees','employees.teamId','=','teams.teamId')
						 ->join('entitys','entitys.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->get();
						        return view('team.index',['team' => $team,'employees' => $employees]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$employee= \DB::table('entitys')
                        ->join('addresses','addresses.entityId','=','entitys.entityId')
						->join('employees','employees.designation','=','entitys.entityType')
						->where('entitys.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))->lists('entitys.name', 'entitys.entityId');
			$citys = \DB::table('citys')->where('citys.state_id',session()->get('currentStateId'))->where('citys.deleted',0)->lists('cityName', 'id');			
			return view('team.create', compact('employee'))->with('citys',$citys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['teamName' => 'required','teamCode' => 'required|unique:teams,teamCode,null,teamId,deleted,0', 'teamCreationDate' => 'required',  ]);
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		team::create([
     	'teamName' => $request['teamName'],
		'cityId' => $request['city'],
		'teamLocation' => $request['teamLocation'],
        'teamCreationDate' => $request['teamCreationDate'],
        'teamEndDate' => $request['teamEndDate'],
		'teamLeader' => $request['teamLeader'],
		'teamCode'=>$request['teamCode']
					]);
		$teamName = Input::get ( 'teamName' );
		if($request['teamLeader'] != ""){
	//	$entityId = DB::table('employees')->where('employeeId',$request['teamLeader'])->value('entityId');
		$phones = DB::table('phones')->where('entityId',$request['teamLeader'])->value('primaryNumber');
		$api_key = trans('messages.API_KEY');
		$contacts = $phones;
		$from = trans('messages.FROM');
		$sms_text = urlencode("Team ".$teamName." has been created and you have been allocated the same . Please get in touch with your manager for details ");
		$routeid = trans('messages.ROUTEID');
		$api_url= "http://smsw.co.in/API/WebSMS/Http/v1.0a/index.php?username=POFIND&password=pof123&sender=POFCOM&to=".$contacts."&message=".$sms_text."&reqid=#&format={json|text}&route_id=28callback=#&unique=1";
		$response=@json_encode(file_get_contents($api_url));

	$email = DB::table('emailaddresses')->where('entityId',$request['teamLeader'])->value('email');
		
		Mail::send('emails.teamCreation', ['teamName'=>$teamName,], function ($message)use ($email) {$message->to($email);	});
		}
        Session::flash('flash_message', 'Team added!');

        return redirect('team');
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
		
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $team = Team::findOrFail($id);

        return view('teammember.index', compact('team'));
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $team = Team::findOrFail($id);
		
		$employee= \DB::table('entitys')
                        ->join('addresses','addresses.entityId','=','entitys.entityId')
						->join('employees','employees.designation','=','entitys.entityType')
						->where('entitys.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))->lists('entitys.name', 'entitys.entityId');
						
		$locations=\DB::table('locations')->where('locations.state_id',session()->get('currentStateId'))->where('locations.deleted',0)->lists('location','locationId');				
		
		$citys = \DB::table('citys')->where('citys.state_id',session()->get('currentStateId'))->where('citys.deleted',0)->lists('cityName', 'id');
		return view('team.edit', ['team' => $team,'employee' => $employee,'locations'=>$locations,'citys'=>$citys]);
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
        $this->validate($request, ['teamName' => 'required', 'teamCreationDate' => 'required', ]);
		
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('teams')->where('teamId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
		$teamLeaderId = DB::table('teams')->where('teamId',$id)->value('teamLeader');
        $team = Team::findOrFail($id);
        $team->update($request->all());
		DB::table('teams')->where('teamId',$id)->update(['updateCounter' => $updateCounters]);
		
        Session::flash('flash_message', 'Team updated!');
		
		$teamName = Input::get ( 'teamName' );
		if($request['teamLeader'] != "" && $teamLeaderId != $request['teamLeader'] ){
	//	$entityId = DB::table('employees')->where('employeeId',$request['teamLeader'])->value('entityId');
		$emailAddress = DB::table('emailaddresses')->where('entityId',$request['teamLeader'])->value('email');
		$phones = DB::table('phones')->where('entityId',$request['teamLeader'])->value('primaryNumber');
		$api_key = trans('messages.API_KEY');
		$contacts = $phones;
		$from = trans('messages.FROM');
		$sms_text = urlencode("Team ".$teamName." has been created and you have been allocated the same . Please get in touch with your manager for details ");
		$routeid = trans('messages.ROUTEID');
		$api_url= "http://smsw.co.in/API/WebSMS/Http/v1.0a/index.php?username=POFIND&password=pof123&sender=POFCOM&to=".$contacts."&message=".$sms_text."&reqid=#&format={json|text}&route_id=28callback=#&unique=1";
		$response=@json_encode(file_get_contents($api_url));

		Mail::send('emails.teamCreation', ['teamName'=>$teamName,], function ($message)use ($emailAddress) {$message->to($emailAddress)->subject("Pof india");	});
		}

		
        return redirect('team');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('team');
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
			
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

		$employeesTeamId = DB::table('employees')->where('teamId',$id)->value('teamId');
       DB::table('teams')->where('teamId', $id)->update(['deleted' => 1]);
	   DB::table('employees')->where('teamId', $id)->update(['teamId' => 0]);
	   DB::table('schools')->where('teamCode', $id)->update(['teamCode' => 0]);

        Session::flash('flash_message', 'Team deleted!');

        return redirect('team');
		}
		
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(8));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
