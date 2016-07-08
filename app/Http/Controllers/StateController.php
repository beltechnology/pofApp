<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\State;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {

        $state =\DB::table('states')->where('states.deleted',0)->groupBy('states.id')
		->paginate(15);

        return view('state.index', compact('state'));
    }	

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['stateName' => 'required|unique:states,stateName,null,id,deleted,0', ]);

        State::create($request->all());

        Session::flash('flash_message', 'State added!');

        return redirect('state');
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
        $state = State::findOrFail($id);

        return view('state.show', compact('state'));
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
        $state = State::findOrFail($id);

        return view('state.edit', compact('state'));
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
		        $state = State::findOrFail($id);

        $this->validate($request, ['stateName' => 'required|unique:states,stateName,'.$state->id.',id,deleted,0', ]);

        $state->update($request->all());

        Session::flash('flash_message', 'State updated!');

        return redirect('state');
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
        \DB::table('states')->where('id', $id)->update(['deleted' => 1]);

        Session::flash('flash_message', 'State deleted!');

        return redirect('state');
    }
}
