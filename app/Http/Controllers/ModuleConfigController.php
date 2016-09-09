<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ModuleConfig;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ModuleConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $moduleconfig = ModuleConfig::paginate(15);
        return view('module-config.index', compact('moduleconfig'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        return view('module-config.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        ModuleConfig::create($request->all());

        Session::flash('flash_message', 'ModuleConfig added!');

        return redirect('module-config');
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $moduleconfig = ModuleConfig::findOrFail($id);
        return view('module-config.show', compact('moduleconfig'));
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $moduleconfig = ModuleConfig::findOrFail($id);
        return view('module-config.edit', compact('moduleconfig'));
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');

        $moduleconfig = ModuleConfig::findOrFail($id);
        $moduleconfig->update($request->all());

        Session::flash('flash_message', 'ModuleConfig updated!');

        return redirect('module-config');
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
        ModuleConfig::destroy($id);

        Session::flash('flash_message', 'ModuleConfig deleted!');

        return redirect('module-config');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(12));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
