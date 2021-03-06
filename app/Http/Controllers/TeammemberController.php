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
use App\Teammember;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class TeammemberController extends Controller
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

        return view('teammember.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
		$employee= DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->where('employees.teamId',0)
						->where('employees.locationId',0)
						->where('addresses.stateId',session()->get('currentStateId'))
						->groupBy('employees.entityId')
						->paginate(trans('messages.PAGINATE'));
						
		$cities = DB::table('citys')->where('citys.deleted',0)->where('citys.state_id',session()->get('currentStateId'))->lists('cityName', 'id');			
        return view('teammember.create',['employee' => $employee,'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $this->validate($request, ['teamName' => 'required', 'teamLocation' => 'required','teamLeader'=>'required', 'teamCreationDate' => 'required', 'teamEndDate' => 'required', ]);
       team::create([
     		'teamName' => $request['teamName'],
		'teamLocation' => $request['teamLocation'],
        'teamCreationDate' => $request['teamCreationDate'],
        'teamEndDate' => $request['teamEndDate'],
		'teamLeader' => $request['teamLeader'],
		'teamCode' => 'TEAM'.$request['teamCode'],
					]);

        Session::flash('flash_message', 'Team Member added!');

        return redirect('teammember');
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

		$team= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
						->leftjoin('locations','locations.locationId','=','employees.locationId')
						->where('employees.deleted',0)
						->Where(function ($query) {
						$query->orwhere('locations.state_id', '=', session()->get('currentStateId'))->orwhere('employees.locationId', '=', 0);
						})
					//	->where('locations.state_id',session()->get('currentStateId'))
						->where('employees.teamId',$id)
						->paginate(10);
		session()->put('teamId',$id);				
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
		
      $employee = employee::findOrFail($id);
		$entity = entity::findOrFail($id);
		$address = address::findOrFail($id);
		$emailaddress = emailaddress::findOrFail($id);
		$phone = phone::findOrFail($id);		$locationId = DB::table('employees')->where('entityId',$id)->value('locationId');				$cityId = DB::table('locations')->where('locationId',$locationId)->where('locations.deleted',0)->value('city_id');		
		$citys = DB::table('citys')->where('citys.deleted',0)->where('citys.state_id',session()->get('currentStateId'))->lists('cityName','id');
		$locations = DB::table('locations')->where('locations.deleted',0)->where('locations.state_id',session()->get('currentStateId'))->lists('location', 'locationId');		
		return view('teammember.edit', ['employee' => $employee,'entity' => $entity,'address' => $address,'emailaddress' => $emailaddress,'phone' => $phone,'citys' => $citys,'locations'=>$locations,'cityId'=>$cityId]);
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

		$teamId=session()->get('teamId');
		$locationId= $request['locationId'];
		DB::table('employees')->where('entityId',$id)->update(['teamId' => $teamId,'locationId' => $locationId]);
        Session::flash('flash_message', 'Team Member updated!');
		session()->forget('teamId');
        return redirect('teammember/'.$teamId);
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

		$teamId=session()->get('teamId');
        DB::table('employees')->where('entityId',$id)->update(['teamId' =>0,'locationId' =>0]);
        Session::flash('flash_message', 'Team member deleted!');
           return redirect('teammember/'.$teamId);
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
