<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Location;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class LocationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $locations = \DB::table('locations')
				->join('districts','districts.id','=','locations.district_id')
				->join('citys','citys.id','=','locations.city_id')
			->where('locations.deleted',0)
			->where('locations.state_id',session()->get('currentStateId'))
			->paginate(15);

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$districts = \DB::table('districts')->where('districts.deleted',0)->where('districts.state_id',session()->get('currentStateId'))->lists('name', 'id');
    return view('locations.create', compact('districts'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 'district' => 'required', 'city' => 'required','location' => 'required|unique:locations', ]);

		Location::create([
			'state_id' => $request['state'],
            'district_id' => $request['district'],
			'city_id' => $request['city'],
            'location' => $request['location'],
           				]);	 

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
		$districts = \DB::table('districts')->where('districts.deleted',0)->lists('name', 'id');
		$citys = \DB::table('citys')->where('citys.deleted',0)->lists('cityName', 'id');
		return view('locations.edit', ['location' => $location,'districts' => $districts,'citys' => $citys]);
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
		
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('locations')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $location = Location::findOrFail($id);
        $location->update($request->all());
		DB::table('locations')->where('id', $id)->update(['updateCounter' => $updateCounters]);
        Session::flash('flash_message', 'Location updated!');

        return redirect('locations');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('locations');
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
        \DB:: table('locations')->where('id',$id)->update(['deleted'=>1]);

        Session::flash('flash_message', 'Location deleted!');

        return redirect('locations');
    }
}
