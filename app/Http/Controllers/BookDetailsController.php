<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BookDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Carbon\Carbon;
use Session;
use DB;

class BookDetailsController extends Controller
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

        $bookdetails = BookDetail::paginate(15);

        return view('book-details.index', compact('bookdetails'));
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
     
		return view('book-details.create');
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

        $this->validate($request, ['entityId' => '', ]);

        BookDetail::create($request->all());

        Session::flash('flash_message', 'BookDetail added!');

        return redirect('book-details');
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

        $bookdetail = BookDetail::findOrFail($id);
        return view('book-details.show', compact('bookdetail'));
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
		
        $bookdetail = BookDetail::findOrFail($id);
		$bookdetails = DB::table('book_details')
						->join('class_names','class_names.id','=','book_details.classId')
						->where('book_details.deleted',0)
						->where('book_details.entityId',$id)
						->get();
        return view('book-details.edit', compact('bookdetail'))->with('bookdetails',$bookdetails);
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

        $this->validate($request, ['entityId' => '', ]);
		$updateCounters=Input::get ('updateCounter')+1;
		$updateCounterdata = DB::table('book_details')->where('entityId',$id)->value('updateCounter');
		if($updateCounterdata < $updateCounters)
		{
		$i= 0;
		foreach($request->input('classId') as $classId)
		{
			$noofBookFirstVisitPMO=$request->input('noofBookFirstVisitPMO')[$i];
			$noofBookFirstVisitPSO=$request->input('noofBookFirstVisitPSO')[$i];
			$noofBookLastVisitPMO=$request->input('noofBookLastVisitPMO')[$i];
			$noofBookLastVisitPSO=$request->input('noofBookLastVisitPSO')[$i];
			$returnBook=$request->input('returnBook')[$i];
			$total=$request->input('total')[$i];
			$other=$request->input('other')[$i];
			DB::table('book_details')->where('entityId', $id)->where('classId', $classId)->update(['noofBookFirstVisitPMO' =>$noofBookFirstVisitPMO,'noofBookFirstVisitPSO' =>$noofBookFirstVisitPSO,'noofBookLastVisitPMO' =>$noofBookLastVisitPMO,'noofBookLastVisitPSO' =>$noofBookLastVisitPSO,'returnBook' =>$returnBook,'other' =>$other,'total' =>$total,'updateCounter' => $updateCounters]);
			$i++;
		}
    
        Session::flash('flash_message', 'BookDetail updated!');
        return redirect('book-details/'.$id.'/edit');
		
		}
		else
	   {
		Session::flash('concurrency_message', 'Data has been changed by some other user');
		return redirect('book-details/'.$id.'/edit');
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

        BookDetail::destroy($id);

        Session::flash('flash_message', 'BookDetail deleted!');

        return redirect('book-details');
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
