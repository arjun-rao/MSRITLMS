<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use Validator;
use App\Models\Course;
use App\Models\Question;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     *
     * Handle requests to /courses/{code}/questions/
     *
     */

    /**
     * Allow faculty to view,answer,delete questions.
     * Allow students to view,ask questions
     *
     * @return QuestionController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('faculty',['except'=>['getIndex','getAsk','postAsk']]);

    }
    public function getIndex($coursecode)
    {
        $course = Course::with('questions')->findOrFail($coursecode);
        $questions = $course->questions;
        return view('edit.questions.index',['course'=>$course,'questions'=>$questions]);
    }

    public function getAsk($coursecode)
    {
        $course = Course::findOrFail($coursecode);
        return view('edit.questions.ask',['course'=>$course]);
    }
    public function postAsk($coursecode)
    {
        //'text','studentname','studentemail', 'parent_code', 'answer','facultyname'

        if($coursecode == Input::get('parent_code'))
        {
            $v = Validator::make(Input::all(), [
                'text' => 'required|max:255',
                'studentname' => 'required|max:255',
                'studentemail' => 'required|email|max:255',
                'parent_code' => 'required|max:255|exists:courses,course_code',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/questions/ask')->withInput()->withErrors($v);
            }
            else{
                Question::create(Input::all());
                return Redirect::to('/courses/'.$coursecode.'/questions/');
            }
        }
        else
        {
            return Redirect::to('/courses/'.$coursecode.'/questions/ask')->withErrors(['Course Mismatch!']);
        }
    }

    public function getAnswer($coursecode,$qID = '0')
    {
        $course = Course::findOrFail($coursecode);
        if($qID != '0')//question exists
        {
            if($question = Question::where('parent_code',$coursecode)->where('id',$qID)->first())
                return view('edit.questions.answer',['question'=>$question,'course'=>$course]);
            else
                return Redirect::to('/courses/'.$coursecode.'/questions/');
        }
        else{
            return Redirect::to('/courses/'.$coursecode.'/questions/');
        }
    }
    public function postAnswer($coursecode)
    {
        if($coursecode != Input::get('parent_code'))
            return Redirect::to('/courses/'.$coursecode.'/questions/');
             $v = Validator::make(Input::all(), [
            'facultyname' => 'required|max:255|exists:users,name',
            'answer' => 'required|max:500',
            'id' => 'required|integer|exists:questions,id',
            'parent_code' => 'required|max:255|exists:courses,course_code',
        ]);
        if($v->fails())
            return Redirect::to('/courses/'.$coursecode.'/questions/answer/'.Input::get('id'))->withInput()->withErrors($v);
        else{
            if($question = Question::where('parent_code',$coursecode)->where('id',Input::get('id'))->first()) {
                $question->answer = Input::get('answer');
                $question->facultyname = Input::get('facultyname');
                $question->save();
                return Redirect::to('/courses/' . $coursecode . '/questions/');
            }
            else
                return Redirect::to('/courses/'.$coursecode.'/questions/answer/'.Input::get('id'))->withInput();

        }
    }

    public function getDelete($coursecode,$qid='0')
    {
        if($qid != '0')//question exists
        {
            $question = Question::with('course')->findOrFail($qid);
            return view('edit.questions.delete',['question'=>$question,'course'=>$question->course]);
        }
        else{
            return Redirect::to('/courses/' . $coursecode . '/questions/');
        }
    }

    public function postDelete($coursecode)
    {
        if($question = Question::where('parent_code',$coursecode)->where('id',Input::get('id'))->first()) {
                $question->delete();
            return Redirect::to('/courses/' . $coursecode.'/questions');
        }
        else
            abort('404');
    }
}
