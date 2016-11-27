<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyProjectFunding;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectFundingController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all projectfunding details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','projectfunding')->find(Auth::user()->username);
            $projectfunding = $me->projectfunding;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.projectfunding.index', ['projectfunding' => $projectfunding, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $projectfunding = FacultyProjectfunding::findorFail($id);
        if($projectfunding->faculty_id == Auth::user()->username)
            return view('faculty.projectfunding.edit',['current' => $projectfunding]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $projectfunding = FacultyProjectfunding::findorFail($id);
        if($projectfunding->faculty_id == Auth::user()->username) {
            $projectfunding->delete();
            return redirect('/faculty/projectfunding/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.projectfunding.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyProjectfunding::create(Input::all());

        return redirect('/faculty/projectfunding/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $projectfunding = FacultyProjectFunding::findorFail(Input::get('id'));
        if($projectfunding->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update 'project_title','funding_agency','duration','amount'

        //update projectfunding details

        if(Input::get('project_title') != $projectfunding->project_title)
            $projectfunding->project_title = Input::get('project_title');

        if(Input::get('funding_agency') != $projectfunding->funding_agency)
            $projectfunding->funding_agency = Input::get('funding_agency');

        if(Input::get('duration') != $projectfunding->duration)
            $projectfunding->duration = Input::get('publisher');


        if(Input::get('amount') != $projectfunding->amount)
            $projectfunding->amount = Input::get('amount');



        $projectfunding->save();

        return redirect('/faculty/projectfunding/index');




    }
}
