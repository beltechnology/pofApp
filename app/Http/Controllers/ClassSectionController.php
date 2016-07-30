<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClassSection;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use DB;
class ClassSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $classSection = \DB::table('class_sections')->where('deleted',0)->paginate(trans('messages.PAGINATE'));

        return view('class-section.index', compact('classSection'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('class-section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:class_sections',]);
        ClassSection::create($request->all());

        Session::flash('flash_message', 'ClassSection added!');

        return redirect('class-section');
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
        $classSection = ClassSection::findOrFail($id);

        return view('class-section.show', compact('classSection'));
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
        $classSection = ClassSection::findOrFail($id);

        return view('class-section.edit', compact('classSection'));
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
		$updateCounterdata = DB::table('class_sections')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $classSection = ClassSection::findOrFail($id);
		$this->validate($request, ['name' => 'required|unique:class_sections,name,'.$classSection->id.',id,deleted,0']);
        $classSection->update($request->all());
		DB::table('class_sections')->where('id', $id)->update(['updateCounter' => $updateCounters]);

        Session::flash('flash_message', 'ClassSection updated!');
        return redirect('class-section');
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('class-section');
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
        \DB::table('class_sections')->where('id',$id)->update(['deleted'=>1]);

        Session::flash('flash_message', 'ClassSection deleted!');

        return redirect('class-section');
    }
}
