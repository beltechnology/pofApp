<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\fee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class feesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $fees = fee::paginate(15);

        return view('fees.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('fees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['teamId' => 'required', ]);

        fee::create($request->all());

        Session::flash('flash_message', 'fee added!');

        return redirect('fees');
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
        $fee = fee::findOrFail($id);

        return view('fees.show', compact('fee'));
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
        $fee = fee::findOrFail($id);

        return view('fees.edit', compact('fee'));
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
        $this->validate($request, ['teamId' => 'required', ]);

        $fee = fee::findOrFail($id);
        $fee->update($request->all());

        Session::flash('flash_message', 'fee updated!');

        return redirect('fees');
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
        fee::destroy($id);

        Session::flash('flash_message', 'fee deleted!');

        return redirect('fees');
    }
}
