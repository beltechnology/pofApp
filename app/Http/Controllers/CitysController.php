<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\City;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CitysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $citys = \DB::table('citys')
		->where('citys.deleted',0)
		->groupBy('citys.id')
		->paginate(15);

        return view('citys.index', compact('citys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('citys.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['state_id' => 'required', 'cityName' => 'required|unique:citys', ]);

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
		$states = \DB::table('states')->lists('name', 'id');

        return view('citys.edit', compact('city'))->with('states', $states);;
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
        $this->validate($request, ['state_id' => 'required', 'cityName' => 'required', ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        Session::flash('flash_message', 'City updated!');

        return redirect('citys');
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
