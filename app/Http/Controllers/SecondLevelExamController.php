<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SecondLevelExam;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class SecondLevelExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $secondlevelexam = SecondLevelExam::paginate(15);

        return view('second-level-exam.index', compact('secondlevelexam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('second-level-exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['examType' => 'required', 'dateOfExam' => 'required', 'reportingTime' => 'required', 'examTime' => 'required','tillTime'=>'required', ]);

        SecondLevelExam::create($request->all());

        Session::flash('flash_message', 'SecondLevelExam added!');

        return redirect('second-level-exam');
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
        $secondlevelexam = SecondLevelExam::findOrFail($id);

        return view('second-level-exam.show', compact('secondlevelexam'));
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
        $secondlevelexam = SecondLevelExam::findOrFail($id);

        return view('second-level-exam.edit', compact('secondlevelexam'));
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
        $this->validate($request, ['examType' => 'required', 'dateOfExam' => 'required', 'reportingTime' => 'required', 'examTime' => 'required','tillTime'=>'required', ]);

        $secondlevelexam = SecondLevelExam::findOrFail($id);
        $secondlevelexam->update($request->all());

        Session::flash('flash_message', 'SecondLevelExam updated!');

        return redirect('second-level-exam');
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
        SecondLevelExam::destroy($id);

        Session::flash('flash_message', 'SecondLevelExam deleted!');

        return redirect('second-level-exam');
    }
}
