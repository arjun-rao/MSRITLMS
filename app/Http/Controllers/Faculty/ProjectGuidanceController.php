<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyProjectGuidance;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectGuidanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all projectguidance details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','projectguidance')->find(Auth::user()->username);
            $projectguidance = $me->projectguidance;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.projectguidance.index', ['projectguidance' => $projectguidance, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $projectguidance = FacultyProjectguidance::findorFail($id);
        if($projectguidance->faculty_id == Auth::user()->username)
            return view('faculty.projectguidance.edit',['current' => $projectguidance]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $projectguidance = FacultyProjectguidance::findorFail($id);
        if($projectguidance->faculty_id == Auth::user()->username) {
            $projectguidance->delete();
            return redirect('/faculty/projectguidance/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.projectguidance.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyProjectguidance::create(Input::all());

        return redirect('/faculty/projectguidance/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $projectguidance = FacultyProjectGuidance::findorFail(Input::get('id'));
        if($projectguidance->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update 'title','area','type','count','year'

        //update projectguidance details

        if(Input::get('title') != $projectguidance->title)
            $projectguidance->title = Input::get('title');

        if(Input::get('area') != $projectguidance->area)
            $projectguidance->area = Input::get('area');

        if(Input::get('type') != $projectguidance->type)
            $projectguidance->type = Input::get('type');


        if(Input::get('count') != $projectguidance->count)
            $projectguidance->count = Input::get('count');

        if(Input::get('year') != $projectguidance->year)
            $projectguidance->year = Input::get('year');



        $projectguidance->save();

        return redirect('/faculty/projectguidance/index');




    }
}
