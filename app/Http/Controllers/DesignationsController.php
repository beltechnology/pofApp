<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Designation;
use App\usermodule;
use Carbon\Carbon;
use Session;
use DB;

class DesignationsController extends Controller
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

        $designations = \DB::table('designations')->where('deleted',0)->paginate(trans('messages.PAGINATE'));
        return view('designations.index', compact('designations'));
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

		$module_configs = DB::table('module_configs')->where('deleted',0)->where('name','!=','Add Designation')->get();
        return view('designations.create', compact('module_configs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['designation' => 'required|unique:designations']);

		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		   
	 Designation::create([
        'designation' => $request['designation'],
		]);
		$i = 0;
		$designationId = Input::get('designationsId');
		if(isset($request['id']))
		{
			foreach($request['id'] as $module)
			{
				if($request->input('active'.$module))
				{
				$active = 	$request->input('active'.$module);
				}
				else{
					$active = 	"N";
				}
				
				
			 usermodule::create([
				'designationId' => $designationId,
				'moduleId' => $module,
				'active' => $active ,
				]);
			$i++;	
			}
		}
		
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
			$validUser = $this->CheckUser();
			if($validUser) return	view('errors.404');
		   
		
        $designation = Designation::findOrFail($id);
		
		$module_configs = DB::table('module_configs')
		->where('deleted',0)->where('name','!=','Add Designation')->get();
		
		$usermodule = DB::table('usermodule')
		->join('module_configs','module_configs.id','=','usermodule.moduleId')
		->where('usermodule.designationId',$id)
		->where('usermodule.deleted',0)->get();
        return view('designations.edit', compact('designation'))->with('module_configs', $module_configs)->with('usermodule', $usermodule);
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
		   

        $designation = Designation::findOrFail($id);
		$this->validate($request, ['designation' => 'required|unique:designations,designation,'.$designation->id.',id,deleted,0']);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('designations')->where('id',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
        $designation->update($request->all());
		DB::table('designations')->where('id',$id)->update(['updateCounter' => $updateCounters]);
		$i = 0;
		if(isset($request['id']))
		{
			foreach($request['id'] as $module)
			{
				if($request->input('active'.$module))
				{
					$active = 	$request->input('active'.$module);
					
				}
				else{
					$active = 	"N";
				}
				DB::table('usermodule')
				->where('designationId',$id)
				->where('moduleId',$module)
				->update(['active'=>$active]);
				$i++;	
				
			}
		}
		
		$i = 0;
		$designationId = $id;
		if(isset($request['CreateId']))
		{
			foreach($request['CreateId'] as $module)
			{
				if(isset($request->input('createActive')[$i]))
				{
				$active = 	$request->input('createActive')[$i];
				}
				else{
					$active = 	"N";
				}
			 usermodule::create([
				'designationId' => $designationId,
				'moduleId' => $module,
				'active' => $active ,
				]);
				$i++;	
			}
		}
        Session::flash('flash_message', 'Designation updated!');

        return redirect('designations');
		
		}
       else
	   {
		    Session::flash('concurrency_message', 'Data has been changed by some other user');
			  return redirect('designations');
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
		$validUser = $this->CheckUser();
		if($validUser) return	view('errors.404');
		
       \DB::table('designations')->where('id',$id)->update(['deleted'=>1]);
        Session::flash('flash_message', 'Designation deleted!');

        return redirect('designations');
    }
	
	public function CheckUser()
	{
		$userRole = new \App\library\myFunctions;
		$is_ok = ($userRole->is_ok(6));
		if($is_ok)
		{
			return true;   
		}
		else{
			return false; 
		}

	}
	
}
