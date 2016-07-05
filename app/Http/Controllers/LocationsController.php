<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $locations = Location::paginate(15);

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['location' => 'required', ]);

        Location::create($request->all());

        Session::flash('flash_message', 'Location added!');

        return redirect('locations');
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
        $location = Location::findOrFail($id);

        return view('locations.show', compact('location'));
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
        $location = Location::findOrFail($id);

        return view('locations.edit', compact('location'));
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
        $this->validate($request, ['location' => 'required', ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        Session::flash('flash_message', 'Location updated!');

        return redirect('locations');
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
        Location::destroy($id);

        Session::flash('flash_message', 'Location deleted!');

        return redirect('locations');
    }
}
