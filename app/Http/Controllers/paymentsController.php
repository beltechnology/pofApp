<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\payment;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
class paymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $payments = payment::paginate(15);

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['teamId' => 'required', ]);

        payment::create($request->all());

        Session::flash('flash_message', 'payment added!');

        return redirect('payments');
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
        $payment = payment::findOrFail($id);

        return view('payments.show', compact('payment'));
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
        $payment = payment::findOrFail($id);
		$payment_modes = DB::table('payment_modes')->where('payment_modes.deleted',0)->lists('paymentMode','id');
        return view('payments.edit', compact('payment'))->with('payment_modes',$payment_modes);
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
			$examLevelId=$request->input('examLevelId');
			$paymentModeId=$request->input('paymentModeId');
			$paymentDate=$request->input('paymentDate');
			$modeRefNo=$request->input('modeRefNo');
			$paymentStatus=$request->input('paymentStatus');
			DB::table('payments')->where('entityId', $id)->update(['examLevelId' =>$examLevelId,'paymentModeId' =>$paymentModeId,'paymentDate' =>$paymentDate,'modeRefNo' =>$modeRefNo,'paymentStatus'=>$paymentStatus]);

        //$payment = payment::findOrFail($id);
        //$payment->update($request->all());

        Session::flash('flash_message', 'payment updated!');

        return redirect('payments/'.$id.'/edit');
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
        payment::destroy($id);

        Session::flash('flash_message', 'payment deleted!');

        return redirect('payments');
    }
}
