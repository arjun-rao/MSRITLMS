<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyIndustry;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndustryController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all industry details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','industry')->find(Auth::user()->username);
            $industry = $me->industry;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.industry.index', ['industries' => $industry, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $industry = FacultyIndustry::findorFail($id);
        if($industry->faculty_id == Auth::user()->username)
            return view('faculty.industry.edit',['current' => $industry]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $industry = FacultyIndustry::findorFail($id);
        if($industry->faculty_id == Auth::user()->username) {
            $industry->delete();
            return redirect('/faculty/industry/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.industry.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyIndustry::create(Input::all());

        return redirect('/faculty/industry/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $industry = FacultyIndustry::findorFail(Input::get('id'));
        if($industry->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update'organization','description', 'duration', 'report_link'

        //update industry details
        if(Input::get('organisation') != $industry->organisation)
            $industry->organisation = Input::get('organisation');
        if(Input::get('description') != $industry->description)
            $industry->description = Input::get('description');
        if(Input::get('duration') != $industry->duration)
            $industry->duration = Input::get('duration');
        if(Input::get('report_link') != $industry->report_link)
            $industry->report_link = Input::get('report_link');


        $industry->save();

        return redirect('/faculty/industry/index');




    }
}
