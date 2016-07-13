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
		
        return view('teammember.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
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
						->paginate(5);
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
        //$team = Team::findOrFail($id);
		$team= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
						->join('locations','locations.id','=','employees.locationId')
						->where('employees.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
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
      $teamMember= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->where('employees.entityId',$id)
						->where('addresses.stateId',session()->get('currentStateId'));
						//->get();
						//var_dump($teamMember);
		$cities = \DB::table('citys')->where('citys.deleted',0)->where('citys.state_id',session()->get('currentStateId'))->lists('cityName', 'id');			
       return view('teammember.edit',['teamMember' => $teamMember,'cities' => $cities]);
   
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
		$teamId=session()->get('teamId');
		$locationId= $request['locationId'];
		DB::table('employees')->where('entityId',$id)->update(['teamId' => $teamId,'locationId' => $locationId]);
        Session::flash('flash_message', 'Team Member updated!');
		session()->forget('teamId');
        return redirect('team');
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
        Team::destroy($id);

        Session::flash('flash_message', 'Team member deleted!');

        return redirect('teammember');
    }

}
