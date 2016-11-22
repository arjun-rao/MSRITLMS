<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use Validator;
use App\Models\Course;
use App\Models\Announcement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('faculty');
    }
//'content','parent_code', 'creator','status'
    public function getIndex($coursecode)
    {
        $course = Course::with('announcements')->findOrFail($coursecode);
        $announcements = $course->announcements;
        return view('edit.announcements.index',['course'=>$course,'announcements'=>$announcements]);
    }
    public function getAdd($coursecode)
    {
        $course = Course::findOrFail($coursecode);
        return view('edit.announcements.add',['course'=>$course]);
    }
    public function postAdd($coursecode)
    {

        if($coursecode == Input::get('parent_code'))
        {
            $v = Validator::make(Input::all(), [
                'content' => 'required|max:255',
                'creator' => 'required|max:255',
                'status' => 'required|max:20',
                'parent_code' => 'required|max:255|exists:courses,course_code',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/announcements/add')->withInput()->withErrors($v);
            }
            else{
                Announcement::create(Input::all());
                return Redirect::to('/courses/'.$coursecode.'/announcements/');
            }
        }
        else
        {
            return Redirect::to('/courses/'.$coursecode.'/announcements/add')->withErrors(['Course Mismatch!']);
        }
    }
    public function getDelete($coursecode,$aid='0')
    {
        if($aid != '0')//announcement exists
        {
            $announcement = Announcement::with('course')->findOrFail($aid);
            return view('edit.announcements.delete',['announcement'=>$announcement,'course'=>$announcement->course]);
        }
        else{
            return Redirect::to('/courses/' . $coursecode . '/announcements/');
        }
    }

    public function postDelete($coursecode)
    {
        if($announcement = Announcement::where('parent_code',$coursecode)->where('id',Input::get('id'))->first()) {
            $announcement->delete();
            return Redirect::to('/courses/' . $coursecode.'/announcements');
        }
        else
            abort('404');
    }

    public function getEdit($coursecode,$announcementid='0')
    {
        $course = Course::findOrFail($coursecode);
        if($announcementid != '0')//announcement exists
        {
            $announcement = Announcement::findOrFail($announcementid);
            return view('edit.announcements.edit',['announcement'=>$announcement,'course'=>$course]);
        }
        else{
            $course = Course::with('announcements')->findOrFail($coursecode);
            $announcements = $course->announcements;
            return view('edit.announcements.index',['announcements'=>$announcements,'course'=>$course]);
        }
    }
    public function postEdit($coursecode)
    {
        if($coursecode != Input::get('parent_code'))
            return Redirect::to('/courses/'.$coursecode.'/announcements/');
        $v = Validator::make(Input::all(), [
            'content' => 'required|max:255',
            'parent_code' => 'required|max:255|exists:courses,course_code',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/'.$coursecode.'/announcements/edit/'.Input::get('id'))->withInput()->withErrors($v);
        else{
            $announcement = Announcement::with('course')->findOrFail(Input::get('id'));
            $announcement->content = Input::get('content');
            $announcement->status = Input::get('status');
            $announcement->save();
            return Redirect::to('/courses/'.$coursecode.'/announcements/');

        }
    }

}
