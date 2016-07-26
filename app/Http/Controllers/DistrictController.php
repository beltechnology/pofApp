<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\District;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$district= \DB::table('districts')
					->where('districts.deleted',0)
					->where('districts.state_id',session()->get('currentStateId'))
					->groupBy('districts.id')
					->paginate(15);
        return view('district.index', compact('district'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:districts,name,null,id,deleted,0', ]);

        District::create($request->all());

        Session::flash('flash_message', 'District added!');

        return redirect('district');
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
        $district = District::findOrFail($id);

        return view('district.show', compact('district'));
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
        $district = District::findOrFail($id);
		$states = \DB::table('states')->where('states.deleted',0)->lists('stateName', 'id');		
        return view('district.edit', compact('district'))->with('states', $states);
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
		$district = District::findOrFail($id);
        $this->validate($request, ['name' => 'required|unique:districts,name,'.$district->id.',id,deleted,0']);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('districts')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $district->update($request->all());
		DB::table('districts')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'District updated!');
        return redirect('district');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('district');
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
        \DB::table('districts')->where('id',$id)->update(['deleted' => 1]);

        Session::flash('flash_message', 'District deleted!');

        return redirect('district');
    }
}
