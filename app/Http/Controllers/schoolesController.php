<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\schoole;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class schoolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $schooles = schoole::paginate(15);

        return view('schooles.index', compact('schooles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('schooles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        //$this->validate($request, ['session' => 'required', 'distributionDate' => 'required', 'clossingDate' => 'required', 'formNo' => 'required', 'schoolCode' => 'required', 'uniqueSchoolCode' => 'required', 'teamcode' => 'requried', 'employeeNo' => 'required', 'employeeConNo' => 'requried', 'principalName' => 'required', 'pmo_psoIncharge' => 'required', 'pmoExmDate' => 'required', 'psoExmDate' => 'required', ]);

        schoole::create($request->all());

        Session::flash('flash_message', 'schoole added!');

        return redirect('schooles');
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
        $schoole = schoole::findOrFail($id);

        return view('schooles.show', compact('schoole'));
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
        $schoole = schoole::findOrFail($id);

        return view('schooles.edit', compact('schoole'));
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
        //$this->validate($request, ['session' => 'required', 'distributionDate' => 'required', 'clossingDate' => 'required', 'formNo' => 'required', 'schoolCode' => 'required', 'uniqueSchoolCode' => 'required', 'teamcode' => 'requried', 'employeeNo' => 'required', 'employeeConNo' => 'requried', 'principalName' => 'required', 'pmo_psoIncharge' => 'required', 'pmoExmDate' => 'required', 'psoExmDate' => 'required', ]);

        $schoole = schoole::findOrFail($id);
        $schoole->update($request->all());

        Session::flash('flash_message', 'schoole updated!');

        return redirect('schooles');
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
        schoole::destroy($id);

        Session::flash('flash_message', 'schoole deleted!');

        return redirect('schooles');
    }
}
