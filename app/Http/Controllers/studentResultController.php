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
        $studentResult = DB::table('student_result')
                        ->join('master_question','master_question.questionId','=','student_result.questionId')
						 ->join('master_answer','master_answer.answerId','=','student_result.answerId')
						->where('student_result.deleted',0)
						->paginate(30);
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
				//	var_dump($value);
					$masterSetId = $value->testid+1;
					$classId = DB::table('class_names')->where('class_names.deleted',0)->where('class_names.name',$value->class)->value('id');
					$studentRollNumber = $value->state_code.$value->school_code."-0".$value->class."-".$value->roll_no;
					$schoolCode = $value->state_code.$value->school_code;
					$schoolEntityId = DB::table('schools')->where('schools.deleted',0)->where('schools.uniqueSchoolCode',$schoolCode)->value('entityId');
					$studentsEntityId = DB::table('students')->where('students.deleted',0)->where('students.schoolEntityId',$schoolEntityId)->where('students.rollNo',$studentRollNumber)->value('entityId');
					$totalMarks	= 0;
					$answerArray = ["q1"=>$value->q1, "q2"=>$value->q2, "q3"=>$value->q3, "q4"=>$value->q4, "q5"=>$value->q5, "q6"=>$value->q6, "q7"=>$value->q7,"q8"=>$value->q8, "q9"=>$value->q9, "q10"=>$value->q10, 
					"q11"=>$value->q11,"q12"=>$value->q12, "q13"=>$value->q13, "q14"=>$value->q14, "q15"=>$value->q15, "q16"=>$value->q16, "q17"=>$value->q17, "q18"=>$value->q18, "q19"=>$value->q19, "q20"=>$value->q20,
					"q21"=>$value->q21, "q22"=>$value->q22, "q23"=>$value->q23, "q24"=>$value->q24, "q25"=>$value->q25, "q26"=>$value->q26, "q27"=>$value->q27, "q28"=>$value->q28, "q29"=>$value->q29, "q30"=>$value->q30,
					"q31"=>$value->q31, "q32"=>$value->q32, "q33"=>$value->q33, "q34"=>$value->q34, "q35"=>$value->q35, "q36"=>$value->q36, "q37"=>$value->q37, "q38"=>$value->q38, "q39"=>$value->q39, "q40"=>$value->q40,
					"q41"=>$value->q41, "q42"=>$value->q42, "q43"=>$value->q43, "q44"=>$value->q44, "q45"=>$value->q45, "q46"=>$value->q46, "q47"=>$value->q47, "q48"=>$value->q48, "q49"=>$value->q49, "q50"=>$value->q50,
					"q51"=>$value->q51, "q52"=>$value->q52, "q53"=>$value->q53, "q54"=>$value->q54, "q55"=>$value->q55, "q56"=>$value->q56, "q57"=>$value->q57, "q58"=>$value->q58, "q59"=>$value->q59, "q60"=>$value->q60,];
						for($i=1;$i<= 60;$i++){						
							$classMapId = DB::table('questionclassmapping')->where('questionclassmapping.deleted',0)->where('questionclassmapping.order',$i)->where('questionclassmapping.masterSetId',$masterSetId)->where('questionclassmapping.classId',$classId)->where('questionclassmapping.stream',$value->stream)->value('classMapId');	
							$questionId = DB::table('questionclassmapping')->where('questionclassmapping.deleted',0)->where('questionclassmapping.classMapId',$classMapId)->value('questionId');



					//	echo $questionId."_".$value->stream."_".$classMapId."<br>";	
						if($answerArray['q'.$i])
						{
							$answerId = DB::table('master_answer')->where('master_answer.deleted',0)->where('master_answer.answerText',$answerArray['q'.$i])->value('answerId');
						}
						else{
							$answerId =DB::table('master_answer')->where('master_answer.deleted',0)->where('master_answer.answerText','')->value('answerId');
						}
						
						$answerQuestionId = DB::table('answer_key')->where('answer_key.deleted',0)->where('answer_key.questionId',$questionId)->where('answer_key.classMapId',$classMapId)->value('answerId');
						$answerKeyId = DB::table('answer_key')->where('answer_key.deleted',0)->where('answer_key.questionId',$questionId)->where('answer_key.answerId',$answerId)->where('answer_key.classMapId',$classMapId)->value('answerKeyId');
						$answerResponse = false;
						if($answerKeyId){
							$answerResponse = true;
							$questionMarks = DB::table('master_question')->where('master_question.deleted',0)->where('master_question.questionId',$questionId)->value('marks');
							$totalMarks = $totalMarks+$questionMarks;
						}
							$studentResult = ['questionId'=>$questionId, 'studentId'=>$studentsEntityId, 'answerId'=>$answerQuestionId, 'correct'=>$answerResponse, 'stream'=>$value->stream, 'order'=>$i, 'studentAnswerId'=>$answerId,];
							studentResult::create($studentResult);
							
						}
							
							if($value->stream == 'PSO'){
							DB::table('students')->where('students.entityId', $studentsEntityId)->update(['totalMarksPso' => $totalMarks,'resultDeclared'=>1]);
							}
							elseif($value->stream == 'PMO'){
							DB::table('students')->where('students.entityId', $studentsEntityId)->update(['totalMarksPmo' => $totalMarks,'resultDeclared'=>1]);
							}
					}
				 }
			}
			
        Session::flash('flash_message', 'masterQuestion added!');
        return redirect('student-result');
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
