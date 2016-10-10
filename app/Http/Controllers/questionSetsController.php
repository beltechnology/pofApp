<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\questionSet;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class questionSetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $questionsets = questionSet::paginate(15);

        return view('question-sets.index', compact('questionsets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('question-sets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['questionId' => 'required', 'set' => 'required']);

        questionSet::create($request->all());

        Session::flash('flash_message', 'questionSet added!');

        return redirect('question-sets');
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
        $questionset = questionSet::findOrFail($id);

        return view('question-sets.show', compact('questionset'));
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
        $questionset = questionSet::findOrFail($id);

        return view('question-sets.edit', compact('questionset'));
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
        $this->validate($request, ['setName' => 'required', 'sessionId' => 'required', 'stream' => 'required', ]);

        $questionset = questionSet::findOrFail($id);
        $questionset->update($request->all());

        Session::flash('flash_message', 'questionSet updated!');

        return redirect('question-sets');
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
        questionSet::destroy($id);

        Session::flash('flash_message', 'questionSet deleted!');

        return redirect('question-sets');
    }
}
