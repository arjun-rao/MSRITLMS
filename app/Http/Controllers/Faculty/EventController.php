<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyEvent;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use File;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all event details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','event')->find(Auth::user()->username);
            $event = $me->event;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.event.index', ['events' => $event, 'courses' => $mycourses]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $event = FacultyEvent::findorFail($id);
        if($event->faculty_id == Auth::user()->username)
            return view('faculty.event.edit',['current' => $event]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $event = FacultyEvent::findorFail($id);
        if($event->faculty_id == Auth::user()->username) {
            $event->delete();
            return redirect('/faculty/event/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.event.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyEvent::create(Input::all());

        return redirect('/faculty/events/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $event = FacultyEvent::findorFail(Input::get('id'));
        if($event->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update

        //update event details
        if(Input::get('degree') != $event->degree)
            $event->degree = Input::get('degree');
        if(Input::get('year') != $event->year)
            $event->year = Input::get('year');
        if(Input::get('university') != $event->university)
            $event->university = Input::get('university');
        if(Input::get('discipline') != $event->discipline)
            $event->discipline = Input::get('discipline');


        $event->save();

        return redirect('/faculty/events/index');




    }
}
