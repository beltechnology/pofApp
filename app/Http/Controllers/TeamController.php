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
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		
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

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        
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
        $this->validate($request, ['teamName' => 'required', 'teamCreationDate' => 'required',  ]);
		$team_code='';
		$teamCode=$request['teamCode'];
		if($teamCode<10)
		{	
		$team_code='POFT00'.$teamCode;
		}
		else if($teamCode<100)
		{
		$team_code ='POFT0'.$teamCode;
		}	
		else
		{
		$team_code ='POFT'.$teamCode;
		}	
       team::create([
     	'teamName' => $request['teamName'],
		'cityId' => $request['city'],
		'teamLocation' => $request['teamLocation'],
        'teamCreationDate' => $request['teamCreationDate'],
        'teamEndDate' => $request['teamEndDate'],
		'teamLeader' => $request['teamLeader'],
		'teamCode'=>$team_code
					]);

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
        $this->validate($request, ['teamName' => 'required', 'teamCreationDate' => 'required', ]);
		
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('teams')->where('teamId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $team = Team::findOrFail($id);
        $team->update($request->all());
		DB::table('teams')->where('teamId',$id)->update(['updateCounter' => $updateCounters]);
		
        Session::flash('flash_message', 'Team updated!');
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
		$employeesTeamId = DB::table('employees')->where('teamId',$id)->value('teamId');
       DB::table('teams')->where('teamId', $id)->update(['deleted' => 1]);
	   DB::table('employees')->where('teamId', $id)->update(['teamId' => 0]);
	   DB::table('schools')->where('teamCode', $id)->update(['teamCode' => 0]);

        Session::flash('flash_message', 'Team deleted!');

        return redirect('team');
		}
}
