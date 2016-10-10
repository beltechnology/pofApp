<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\masterQuestion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Input;
use Excel;
use DB;
use App\questionSet;
use App\answerKey;
use App\questionClassMapping;
use App\ClassNameController;
use App\studentResult;


class studentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $studentResult = DB::table('student_result')->where('deleted',0)->paginate(15);
        return view('student-result.index', compact('studentResult'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		
        return view('student-result.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['questionId' => 'primary', 'questionNumber' => 'requried', 'text' => 'requried', 'section' => 'requried', 'stream' => 'requried', 'marks' => 'requried', 'questionType' => 'questionType', ]);

    //    masterQuestion::create($request->all());
	
		if(Input::hasFile('import_file')){

			$path = Input::file('import_file')->getRealPath();

			$data = Excel::load($path, function($reader) {})->get();

			if(!empty($data) && $data->count()){
				
				 foreach ($data as $key => $value) {
					var_dump($value);
					}
				 }
			}
        Session::flash('flash_message', 'masterQuestion added!');
    //    return redirect('student-result');
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
        $masterquestion = masterQuestion::findOrFail($id);

        return view('student-result.show', compact('masterquestion'));
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
        $masterquestion = masterQuestion::findOrFail($id);

        return view('student-result.edit', compact('masterquestion'));
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
        $this->validate($request, ['questionId' => 'primary', 'questionNumber' => 'requried', 'text' => 'requried', 'section' => 'requried', 'stream' => 'requried', 'marks' => 'requried', 'questionType' => 'questionType', ]);

        $masterquestion = masterQuestion::findOrFail($id);
        $masterquestion->update($request->all());

        Session::flash('flash_message', 'masterQuestion updated!');

        return redirect('student-result');
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
    //    masterQuestion::destroy($id);
		DB::table('master_question')->where('master_question.questionId', $id)->update(['deleted' => 1]);
		DB::table('question_sets')->where('question_sets.questionId', $id)->update(['deleted' => 1]);
		DB::table('answer_key')->where('answer_key.questionId', $id)->update(['deleted' => 1]);
        Session::flash('flash_message', 'masterQuestion deleted!');

        return redirect('student-result');
    }
}
