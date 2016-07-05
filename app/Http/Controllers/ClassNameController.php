<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassName;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $classname = \DB::table('class_names')->where('deleted',0)->paginate(15);

        return view('class-name.index', compact('classname'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('class-name.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        
        ClassName::create($request->all());

        Session::flash('flash_message', 'ClassName added!');

        return redirect('class-name');
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
        $classname = ClassName::findOrFail($id);

        return view('class-name.show', compact('classname'));
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
        $classname = ClassName::findOrFail($id);

        return view('class-name.edit', compact('classname'));
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
        
        $classname = ClassName::findOrFail($id);
        $classname->update($request->all());

        Session::flash('flash_message', 'ClassName updated!');

        return redirect('class-name');
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
        \DB::table('class_names')->where('id',$id)->update(['deleted'=>1]);

        Session::flash('flash_message', 'ClassName deleted!');

        return redirect('class-name');
    }
}
