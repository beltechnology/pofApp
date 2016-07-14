<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\BookDetail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class BookDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
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
        return view('book-details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
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
        $bookdetail = BookDetail::findOrFail($id);

        return view('book-details.edit', compact('bookdetail'));
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
        $this->validate($request, ['entityId' => '', ]);

        $bookdetail = BookDetail::findOrFail($id);
        $bookdetail->update($request->all());

        Session::flash('flash_message', 'BookDetail updated!');

        return redirect('book-details');
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
        BookDetail::destroy($id);

        Session::flash('flash_message', 'BookDetail deleted!');

        return redirect('book-details');
    }
}
