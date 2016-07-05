<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Team;

use App\employee;
use App\address;
use App\entity;
use App\emailaddress;
use App\phone;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class TeammemberController extends Controller
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
						->paginate(15);
        return view('teammember.index', compact('team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
       $deleted=0;
		$employee= \DB::table('employees')
                        ->join('entitys','entitys.entityId','=','employees.entityId')
                        ->join('addresses','addresses.entityId','=','employees.entityId')
						->join('phones','phones.entityId','=','employees.entityId')
						->join('emailaddresses','emailaddresses.entityId','=','employees.entityId')
						->where('employees.deleted',0)
						->groupBy('employees.entityId')
						->paginate(5);
        return view('teammember.create', compact('employee'));
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
        $team = Team::findOrFail($id);

        return view('teammember.show', compact('team'));
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

        return view('teammember.edit', compact('team'));
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

        Session::flash('flash_message', 'Team Member updated!');

        return redirect('teammember');
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
