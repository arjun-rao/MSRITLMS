<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Auth;
use Input;
use File;
use Redirect;
use App\Models\Course;
use Validator;
use App\Models\Page;
use App\Models\Announcement;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CourseController extends Controller
{
    /**
     *
     * Handle requests to /courses
     *
     */

    /**
     * Allow only HOD to view,add,edit, or delete courses,
     * Allow faculty to edit their associated course, and view all courses
     * Allow students to view courses belonging to their semester.
     *
     * @return CourseController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hod',['only'=>['getAdd','postAdd','getDelete','postDelete']]);
        $this->middleware('faculty',['only'=>['getSemester','getEdit','postEdit']]);

    }

    /**
     * handles /courses/ route.
     *
     */
    public function getIndex()
    {
        //getDepartment Links, Get deptAnnouncements, if faculty, get their courses.
        if(Course::count() > 0 or Auth::user()->role == 'hod')
        {
            $cUser = Auth::user();
            if($cUser->isFaculty())
            {
                $instructor = Instructor::find($cUser->username);
                $myCourses = $instructor->courses->pluck('course_code');
                $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('courses.index',['mycourses'=>$myCourses,'announcements'=>$announcements]);
            }
            else{
                $semCourses = Course::where('semester',$cUser->semester)->where('status','published')->select('course_code','title')->get();
                $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('courses.index',['courses'=>$semCourses,'announcements'=>$announcements]);
            }

        }
        else
            return redirect('/');
    }
    public function getSemester($sem = '0')
    {
        if($sem == '0') return redirect('/courses');
        if(Course::count() > 0)
        {
            $cUser = Auth::user();
            if($cUser->isFaculty())
            {
                $instructor = Instructor::find($cUser->username);
                $semCourses = Course::where('semester',$sem)->select('course_code','title')->get();
                $myCourses = $instructor->courses->pluck('course_code');
                $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('courses.index',['mycourses'=>$myCourses,'courses'=>$semCourses,'announcements'=>$announcements]);
            }

        }
        else
            return redirect('/');
    }

    /**
     * Add courses
     *
     */
    public function getAdd()
    {
        $cUser = Auth::user();
        $instructor = Instructor::find($cUser->username);
        $myCourses = $instructor->courses->pluck('course_code');
        return view('courses.add',['mycourses'=>$myCourses]);
    }
    public function postAdd()
    {
        //{{--'course_code', 'department_code', 'semester','title','credits','duration','status'--}}
        $v = Validator::make(Input::all(), [
            'course_code'=>'required|max:10|unique:courses,course_code',
            'description' => 'required',
            'semester' => 'required|integer|min:3|max:8',
            'title' => 'required|max:255',
            'duration' => 'required|max:255',
            'credits' => 'required|max:255',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/add')->withInput()->withErrors($v);
        else {
            $details = Input::all();
            $details['department_code'] = 'IS';
            Course::create($details);
            $page=[
                'title'=>'Home',
                'slug'=>'home',
                'parent_code'=>Input::get('course_code'),
                'content' => '<p class="alert alert-info">&nbsp;More information will be updated shortly.</p>',
                'menulink'=> 0,
                'creator' => Auth::user()->username,
                'status' =>'published'

            ];
            Page::create($page);
            mkdir( public_path() . '/uploads/' . Input::get('course_code'),0711);
            chmod( public_path() . '/uploads/' . Input::get('course_code'), 0711);
            return Redirect::to('/courses/edit/');
        }


    }
    public function getEdit($code = 'null')
    {
        if($code != 'null')//course exists
        {
            $course = Course::findOrFail($code);
            return view('courses.edit',['course'=>$course]);
        }
        else
        {
            $courses = Course::select('course_code','title','status','semester','credits')->get();
            return view('courses.list',['courses'=>$courses]);
        }
    }
    public function postEdit()
    {
        //{{--'course_code', 'department_code', 'semester','title','credits','duration','status'--}}
        $v = Validator::make(Input::all(), [
            'code'=>'required|max:10|exists:courses,course_code',
            'description' => 'required',
            'semester' => 'required|integer|min:3|max:8',
            'title' => 'required|max:255',
            'duration' => 'required|max:255',
            'credits' => 'required|max:255',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/edit/'.Input::get('code'))->withInput()->withErrors($v);
        else {
            $course = Course::findOrFail(Input::get('code'));
            if($course->description != Input::get('description'))
                $course->description = Input::get('description');
            if($course->semester != Input::get('semester'))
                $course->semester = Input::get('semester');
            if($course->title != Input::get('title'))
                $course->title = Input::get('title');
            if($course->duration != Input::get('duration'))
                $course->duration = Input::get('duration');
            if($course->credits != Input::get('credits'))
                $course->credits = Input::get('credits');
            if($course->status != Input::get('status'))
                $course->status = Input::get('status');
            $course->save();
            return Redirect::to('/courses/edit/');
        }


    }
    public function getDelete($code= 'null')
    {
        if($code == 'null') return redirect('/courses/edit');
        else{
            $course= Course::select('course_code')->findOrFail($code);
            return view ('courses.delete',['course' => $course]);
        }
    }
    public function postDelete()
    {
        $course = Course::findOrFail(Input::get('code'));
        $directory = public_path() . '/uploads/' . Input::get('code');
        if(File::deleteDirectory($directory))
        {
            $course->delete();
        }
        return Redirect::to('/courses/edit/');
    }

    public function postSearch()
    {

        $cUser = Auth::user();
        if($cUser->isFaculty())
        {
            $instructor = Instructor::find($cUser->username);
            $myCourses = $instructor->courses->pluck('course_code');
            if($course = Course::find(Input::get('searchterm')))
                return redirect('/courses/'.Input::get('searchterm'));
            else{
                $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('courses.index',['mycourses'=>$myCourses,'announcements'=>$announcements,'error'=>'No Match Found!']);
            }
        }
        else{
            $semCourses = Course::where('semester',$cUser->semester)->select('course_code','title')->get();
            if($course = Course::find(Input::get('searchterm')))
                return redirect('/courses/'.Input::get('searchterm'));
            else
            {$announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('courses.index',['courses'=>$semCourses,'announcements'=>$announcements,'error'=>'No Match Found!']);}
        }


    }

    /**
     *
     * Show the course's homepage
     * @return view
     */
    public function missingMethod($code = [])
    {
        $course = Course::with('instructors','links','announcements')->findOrFail($code);
        $homepage = Page::where('parent_code',$code)->where('slug','home')->first();
        //render the course object.
        return view('courses.page',['course'=>$course,'page'=>$homepage]);
    }


}
