<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $student = student::paginate(15);

        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['studentName' => 'required', 'fatherName' => 'required', 'dob' => 'required', 'classId' => 'required', 'section' => 'required', 'pmo' => 'required', 'pso' => 'required', 'handicapped' => 'required', ]);

        student::create($request->all());

        Session::flash('flash_message', 'student added!');

        return redirect('student');
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
        $student = student::findOrFail($id);

        return view('student.show', compact('student'));
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
        $student = student::findOrFail($id);

        return view('student.edit', compact('student'));
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
        $this->validate($request, ['studentName' => 'required', 'fatherName' => 'required', 'dob' => 'required', 'class' => 'required', 'section' => 'required', 'pmo' => 'required', 'pso' => 'required', 'handicapped' => 'required', 'rollNo' => 'required', ]);

        $student = student::findOrFail($id);
        $student->update($request->all());

        Session::flash('flash_message', 'student updated!');

        return redirect('student');
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
        student::destroy($id);

        Session::flash('flash_message', 'student deleted!');

        return redirect('student');
    }
}
