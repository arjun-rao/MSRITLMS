<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use Redirect;
use App\Models\Course;
use App\Models\Link;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     *
     * Handle requests to /courses/{code}/link/
     *
     */

    /**
     * Allow faculty to view,add,edit,delete links.
     * Allow students to view links belonging to the course.
     *
     * @return LinkController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('faculty',['except'=>'getIndex']);

    }
    public function getIndex($coursecode)
    {
        $course = Course::with('links')->findOrFail($coursecode);
        $links = $course->links;
        return view('edit.links.index',['links'=>$links,'course'=>$course]);
    }
    public function getAdd($coursecode)
    {
        $course = Course::findOrFail($coursecode);
        return view('edit.links.add',['course'=>$course]);
    }



    public function postAdd($coursecode)
    {
        if($coursecode == Input::get('parent_code'))
        {
            //'title','href','parent_code', 'weight'
            $v = Validator::make(Input::all(), [
                'title' => 'required|max:255',
                'href' => 'required|max:255|unique:links',
                'parent_code' => 'required|max:255|exists:courses,course_code',
                'weight' => 'required|integer|min:0',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/links/add')->withInput()->withErrors($v);
            }
            else{
                Link::create(Input::all());
                return Redirect::to('/courses/'.$coursecode.'/links/');
            }
        }
        else
        {
            return Redirect::to('/courses/'.$coursecode.'/links/add')->withErrors(['Course Mismatch!']);
        }
    }

    public function getDelete($coursecode,$linkid='0')
    {
        if($linkid != '0')//link exists
        {
            $course = Course::with('links')->findOrFail($coursecode);
            $link = Link::with('course')->findOrFail($linkid);
            return view('edit.links.delete',['link'=>$link,'course'=>$course]);
        }
        else{
            $course = Course::with('links')->findOrFail($coursecode);
            $links = $course->links;
            return view('edit.links.index',['links'=>$links,'course'=>$course]);
        }
    }

    public function postDelete($coursecode)
    {
        $link = Link::findOrFail(Input::get('id'));
        $link->delete();
        return Redirect::to('/courses/'.$coursecode.'/links/delete');
    }

    public function getEdit($coursecode,$linkid='0')
    {
        $course = Course::findOrFail($coursecode);
        if($linkid != '0')//link exists
        {
            $link = Link::findOrFail($linkid);
            return view('edit.links.edit',['link'=>$link,'course'=>$course]);
        }
        else{
            $course = Course::with('links')->findOrFail($coursecode);
            $links = $course->links;
            return view('edit.links.index',['links'=>$links,'course'=>$course]);
        }
    }

    public function postEdit($coursecode)
    {
        if($coursecode == Input::get('parent_code'))
        {
            //'title','href','parent_code', 'weight'
            $v = Validator::make(Input::all(), [
                'title' => 'required|max:255',
                'href' => 'required|max:255',
                'parent_code' => 'required|max:255|exists:courses,course_code',
                'weight' => 'required|integer|min:0',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/links/edit/'.Input::get('id'))->withInput()->withErrors($v);
            }
            else{
                $link = Link::find(Input::get('id'));
                if($link->title != Input::get('title'))
                    $link->title= Input::get('title');
                if($link->href !== Input::get('href'))
                    $link->href= Input::get('href');
                if($link->weight != Input::get('weight'))
                    $link->weight= Input::get('weight');
                $link->save();
                return Redirect::to('/courses/'.$coursecode.'/links/');
            }
        }
        else
        {
            return Redirect::to('/courses/'.$coursecode.'/links/edit'.Input::get('id'))->withErrors(['Course Mismatch!']);
        }
    }
}
