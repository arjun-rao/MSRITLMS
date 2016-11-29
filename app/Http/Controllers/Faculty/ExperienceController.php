<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyExperience;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all experience details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','experience')->find(Auth::user()->username);
            $experience = $me->experience;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.experience.index', ['experiences' => $experience, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $experience = FacultyExperience::findorFail($id);
        if($experience->faculty_id == Auth::user()->username)
            return view('faculty.experience.edit',['current' => $experience]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $experience = FacultyExperience::findorFail($id);
        if($experience->faculty_id == Auth::user()->username) {
            $experience->delete();
            return redirect('/faculty/experience/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.experience.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyExperience::create(Input::all());

        return redirect('/faculty/experience/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $experience = FacultyExperience::findorFail(Input::get('id'));
        if($experience->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update 'type','role', 'description', 'duration','organization'

        //update experience details
        if(Input::get('organization') != $experience->organization)
            $experience->organization = Input::get('organization');
        if(Input::get('description') != $experience->description)
            $experience->description = Input::get('description');
        if(Input::get('duration') != $experience->duration)
            $experience->duration = Input::get('duration');
        if(Input::get('type') != $experience->type)
            $experience->type = Input::get('type');
        if(Input::get('role') != $experience->role)
            $experience->role = Input::get('role');

        $experience->save();

        return redirect('/faculty/experience/index');




    }
}
