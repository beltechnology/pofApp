<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\masterAnswer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
class masterAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $masterAnswer = masterAnswer::paginate(15);

        return view('master-answer.index', compact('masterAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('master-answer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['questionId' => 'required', 'set' => 'required']);

        masterAnswer::create($request->all());

        Session::flash('flash_message', 'masterAnswer added!');

        return redirect('master-answer');
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
        $masterAnswer = masterAnswer::findOrFail($id);

        return view('master-answer.show', compact('masterAnswer'));
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
        $masterAnswer = masterAnswer::findOrFail($id);

        return view('master-answer.edit', compact('masterAnswer'));
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
        $this->validate($request, ['answerText' => 'required', ]);
        $masterAnswer = masterAnswer::findOrFail($id);
        $masterAnswer->update($request->all());

        Session::flash('flash_message', 'master-answer updated!');

        return redirect('master-answer');
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
        masterAnswer::destroy($id);

        Session::flash('flash_message', 'master-answer deleted!');

        return redirect('master-answer');
    }
}
