<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Designation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class DesignationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $designations = \DB::table('designations')->where('deleted',0)->paginate(15);

        return view('designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('designations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['designation' => 'required|unique:designations']);

        Designation::create($request->all());

        Session::flash('flash_message', 'Designation added!');

        return redirect('designations');
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
        $designation = Designation::findOrFail($id);

        return view('designations.show', compact('designation'));
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
        $designation = Designation::findOrFail($id);

        return view('designations.edit', compact('designation'));
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
     //   $this->validate($request, ['designation' => 'required', ]);

        $designation = Designation::findOrFail($id);
		$this->validate($request, ['designation' => 'required|unique:designations,designation,'.$designation->id.',id,deleted,0']);
        $designation->update($request->all());

        Session::flash('flash_message', 'Designation updated!');

        return redirect('designations');
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
       \DB::table('designations')->where('id',$id)->update(['deleted'=>1]);
        Session::flash('flash_message', 'Designation deleted!');

        return redirect('designations');
    }
}
