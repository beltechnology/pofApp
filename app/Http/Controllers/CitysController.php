<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


use App\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $citys = \DB::table('districts')
				->join('citys','citys.district_id','=','districts.id')
				->where('citys.deleted',0)
				->where('citys.state_id',session()->get('currentStateId'))
				->paginate(trans('messages.PAGINATE'));

        return view('citys.index', compact('citys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $districts = \DB::table('districts')->where('districts.deleted',0)->where('districts.state_id',session()->get('currentStateId'))->lists('name', 'id');
        return view('citys.create', compact('districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
         $this->validate($request, ['district_id' => 'required','cityName' => 'required|unique:citys,cityName,null,id,deleted,0', ]);

        City::create($request->all());

        Session::flash('flash_message', 'City added!');

        return redirect('citys');
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
        $city = City::findOrFail($id);

        return view('citys.show', compact('city'));
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

        $city = City::findOrFail($id);
		$state_id = \DB::table('citys')->where('citys.id', '=', $id)->get();
		foreach($state_id as $statesid)
		{
			$states_id=$statesid->state_id;
		$states = \DB::table('states')->where('states.deleted',0)->lists('stateName', 'id');
		$district = \DB::table('districts')->where('districts.state_id',$states_id)->where('districts.deleted',0)->lists('name', 'id');
        return view('citys.edit', compact('city'))->with('states', $states)->with('district', $district);
		}
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
		$city = City::findOrFail($id);
        $this->validate($request, ['cityName' => 'required|unique:citys,cityName,'.$city->id.',id,deleted,0', ]);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('citys')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $city->update($request->all());
		DB::table('citys')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'City updated!');
        return redirect('citys');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('citys');
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
		\DB::table('citys')->where('id', $id)->update(['deleted' => 1]);

        Session::flash('flash_message', 'City deleted!');

        return redirect('citys');
    }
}
