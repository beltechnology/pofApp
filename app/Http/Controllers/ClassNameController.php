<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassName;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class ClassNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $classname = \DB::table('class_names')->where('deleted',0)->paginate(trans('messages.PAGINATE'));

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
        $this->validate($request, ['name' => 'required|unique:class_names',]);
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
        
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('class_names')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $classname = ClassName::findOrFail($id);
		$this->validate($request, ['name' => 'required|unique:class_names,name,'.$classname->id.',id,deleted,0']);
        $classname->update($request->all());
		DB::table('class_names')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'ClassName updated!');
        return redirect('class-name');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('class-name');
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
        \DB::table('class_names')->where('id',$id)->update(['deleted'=>1]);

        Session::flash('flash_message', 'ClassName deleted!');

        return redirect('class-name');
    }
}
