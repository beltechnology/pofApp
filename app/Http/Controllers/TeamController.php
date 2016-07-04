<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Team;
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
        $team = Team::paginate(15);

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
        //$this->validate($request, ['teamId' => 'required', 'teamName' => 'required_with:teamName|alpha_num', 'teamLocation' => 'required', 'teamLeader' => 'required', 'teamCreationDate' => 'required', 'teamEndDate' => 'required', 'teamCode' => 'requried', 'description' => 'required', ]);

        Team::create($request->all());

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
        $this->validate($request, ['teamId' => 'required', 'teamName' => 'required_with:teamName|alpha_num', 'teamLocation' => 'required', 'teamLeader' => 'required', 'teamCreationDate' => 'required', 'teamEndDate' => 'required', 'teamCode' => 'requried', 'description' => 'required', ]);

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
