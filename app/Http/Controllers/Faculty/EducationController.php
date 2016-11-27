<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyEducation;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use File;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all education details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','education')->find(Auth::user()->username);
            $education = $me->education;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.education.index', ['education' => $education, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $education = FacultyEducation::findorFail($id);
        if($education->faculty_id == Auth::user()->username)
            return view('faculty.education.edit',['current' => $education]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $education = FacultyEducation::findorFail($id);
        if($education->faculty_id == Auth::user()->username) {
            $education->delete();
            return redirect('/faculty/education/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.education.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyEducation::create(Input::all());

        return redirect('/faculty/education/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $education = FacultyEducation::findorFail(Input::get('id'));
        if($education->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update 'faculty_id','degree','year','university','discipline'

        //update education details
        if(Input::get('degree') != $education->degree)
            $education->degree = Input::get('degree');
        if(Input::get('year') != $education->year)
            $education->year = Input::get('year');
        if(Input::get('university') != $education->university)
            $education->university = Input::get('university');
        if(Input::get('discipline') != $education->discipline)
            $education->discipline = Input::get('discipline');


        $education->save();

        return redirect('/faculty/education/index');




    }
}
