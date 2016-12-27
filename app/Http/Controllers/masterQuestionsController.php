<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
class masterQuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
        $masterquestions = DB::table('master_question')->where('deleted',0)->paginate(15);
        return view('master-questions.index', compact('masterquestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
		
        return view('master-questions.create');
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
					if($value->stream != null) {
						 
						$exitData = DB::table('master_question')->where('master_question.deleted',0)->where('master_question.text',$value->question_text)->value('text');	
						if(!$exitData){
							$insert = ['text' => $value->question_text, 'section' => $value->section, 'stream' => $value->stream, 'marks' => $value->marks, 'questionType' => $value->question_type];
							$insertData	 = masterQuestion::create($insert);
							$lastInsertId = $insertData->questionId;
							$masterSetId = DB::table('master_set')->where('master_set.deleted',0)->where('master_set.setName',$value->paper_set)->value('masterSetId');	
							$questionSet = ['questionId'=>$lastInsertId, 'set'=>$masterSetId];
							$questionSet = questionSet::create($questionSet);
							$questionSetId = $questionSet->id;
							// class mapping
							$classId = DB::table('class_names')->where('class_names.deleted',0)->where('class_names.name',$value->class_name)->value('id');	
							
							$questionClassMapping = ['questionId'=>$lastInsertId, 'classId'=>$classId,'setId'=>$questionSetId, 'masterSetId'=>$masterSetId,'order'=>$value->question_no,'stream'=>$value->stream];
							$questionClassMappingData = questionClassMapping::create($questionClassMapping);
							$questionClassMappingId = $questionClassMappingData->classMapId;
							// answer key mapping 
							$answerId = DB::table('master_answer')->where('master_answer.deleted',0)->where('master_answer.answerText',$value->answer_key)->value('answerId');	
							$answerKey = ['questionId'=>$lastInsertId, 'answerId'=>$answerId,'classMapId'=>$questionClassMappingId,];
							if($value->question_type == 'single')
							{
								answerKey::create($answerKey);
							}
													
						}
						else{						
								$questionId = DB::table('master_question')->where('master_question.deleted',0)->where('master_question.text',$value->question_text)->value('questionId');	
								$classId = DB::table('class_names')->where('class_names.deleted',0)->where('class_names.name',$value->class_name)->value('id');	
								$masterSetId = DB::table('master_set')->where('master_set.deleted',0)->where('master_set.setName',$value->paper_set)->value('masterSetId');
								$setId = DB::table('question_sets')->where('question_sets.deleted',0)->where('question_sets.set',$masterSetId)->where('question_sets.questionId',$questionId)->value('id');	
								if(!$setId){
									// set mapping
									$questionSet = ['questionId'=>$questionId, 'set'=>$masterSetId];
									$questionSet = questionSet::create($questionSet);
									$setId = $questionSet->id;
								}
								$classMapId = DB::table('questionclassmapping')->where('questionclassmapping.deleted',0)->where('questionclassmapping.questionId',$questionId)->where('questionclassmapping.setId',$setId)->where('questionclassmapping.classId',$classId)->where('questionclassmapping.stream',$value->stream)->value('classMapId');	
									// class mapping
								//	echo $value->stream;
								if(!$classMapId && $setId)
								{
									$questionClassMapping = ['questionId'=>$questionId, 'classId'=>$classId,'setId'=>$setId, 'masterSetId'=>$masterSetId, 'order'=>$value->question_no,'stream'=>$value->stream] ;
									$questionClassMappingData = questionClassMapping::create($questionClassMapping);
									$classMapId = $questionClassMappingData->classMapId;
								}
									$answerId = DB::table('master_answer')->where('master_answer.deleted',0)->where('master_answer.answerText',$value->answer_key)->value('answerId');	
									$answerKeyId = DB::table('answer_key')->where('answer_key.deleted',0)->where('answer_key.questionId',$questionId)->where('answer_key.classMapId',$classMapId)->where('answer_key.answerId',$answerId)->value('answerKeyId');	
								if(!$answerKeyId && $questionId && $answerId && $classMapId){
									// answer key mapping 
									$answerKey = ['questionId'=>$questionId, 'answerId'=>$answerId,'classMapId'=>$classMapId,];
									if($value->question_type == 'single')
									{
										answerKey::create($answerKey);
									}
								}
							}
						}
					 }
				 }
			}
        Session::flash('flash_message', 'masterQuestion added!');
        return redirect('master-questions');
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

        return view('master-questions.show', compact('masterquestion'));
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

        return view('master-questions.edit', compact('masterquestion'));
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

        return redirect('master-questions');
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

        return redirect('master-questions');
    }
}
