<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CourseFacultyController extends Controller
{
    /**
     *
     * Handle requests to /courses/{code}/faculty/
     *
     */

    /**
     * Only Allow HOD access
     *
     * @return CourseFacultyController
     */
    public function __construct()
    {
        $this->middleware('hod');

    }

    public function getIndex($coursecode)
    {
        if(Instructor::count() > 0) {
            $instructors = Instructor::all();
            $course = Course::with('links','instructors')->findOrFail($coursecode);
            return view('courses.faculty.index', ['instructors' => $instructors,'course'=>$course]);
        }
    }
    public function postAdd($coursecode)
    {
        if($coursecode == Input::get('course'))
        {
            $course = Course::findOrFail($coursecode);
            $user = User::findOrFail(Input::get('username'));
            if(Input::get('action') == 'attach' && $user->isFaculty())
            {
                $course->instructors()->attach($user->username);
                return redirect('/courses/' . $coursecode.'/faculty');
            }
            else
                return redirect('/courses/' . $coursecode.'/faculty');
        }
        else
            return redirect('/courses/' . $coursecode.'/faculty');
    }
    public function postRemove($coursecode)
    {
        if($coursecode == Input::get('course'))
        {
            $course = Course::with('instructors')->findOrFail($coursecode);
            $user = User::findOrFail(Input::get('username'));
            $instructor = Instructor::findOrFail($user->username);
            if(Input::get('action') == 'detach' && $user->isFaculty())
            {
                if($course->instructors->contains($instructor))
                $course->instructors()->detach($user->username);
                return redirect('/courses/' . $coursecode.'/faculty');
            }
            else
                return redirect('/courses/' . $coursecode.'/faculty');
        }
        else
            return redirect('/courses/' . $coursecode.'/faculty');
    }
}
