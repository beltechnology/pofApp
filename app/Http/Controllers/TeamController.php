<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Team;
use App\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
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
		$team= \DB::table('teams')
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
        return view('team.create');
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

        return view('team.show', compact('team'));
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

        return view('team.edit', compact('team'));
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
