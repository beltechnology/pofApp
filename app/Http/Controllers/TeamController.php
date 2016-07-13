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
		
		$deleted=0;
		$team= DB::table('teams')
                        ->join('locations','locations.id','=','teams.teamLocation')
						->where('teams.deleted',0)
						->where('locations.state_id',session()->get('currentStateId'))
						->orderby('teams.teamId')
						->paginate(15);

        return view('team.index', compact('team'));
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
						->where('entitys.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))->lists('entitys.name', 'entitys.entityId');
			return view('team.create', compact('employee'));
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
						->where('entitys.deleted',0)
						->where('addresses.stateId',session()->get('currentStateId'))->lists('entitys.name', 'entitys.entityId');
						
		$locations=\DB::table('locations')->where('locations.state_id',session()->get('currentStateId'))->where('locations.deleted',0)->lists('location','id');				
		return view('team.edit', ['team' => $team,'employee' => $employee,'locations' => $locations]);
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
        $this->validate($request, ['teamName' => 'required', 'teamLocation' => 'required', 'teamCreationDate' => 'required', 'teamEndDate' => 'required', ]);
        $team = Team::findOrFail($id);
        $team->update($request->all());

        Session::flash('flash_message', 'Team updated!');

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

        Session::flash('flash_message', 'Team deleted!');

        return redirect('team');
    }
}
