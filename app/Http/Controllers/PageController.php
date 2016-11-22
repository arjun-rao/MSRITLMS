<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use Redirect;
use App\Models\Course;
use App\Models\Link;
use App\Models\Page;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     *
     * Handle requests to /courses/{code}/page/
     *
     */

    /**
     * Allow faculty to view,add,edit,delete pages.
     * Allow students to view pages belonging to the course.
     *
     * @return PageController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('faculty',['except'=>['getIndex','getView']]);

    }

    public  function getIndex($coursecode)
    {
        if(!Auth::user()->isFaculty())
            return redirect('/courses/' . $coursecode);
        $course = Course::findOrFail($coursecode);
        $pages = Page::where('parent_code',$coursecode)->get();
        return view('edit.page.index',['course'=>$course,'pages'=>$pages]);
    }
    public function getAdd($coursecode)
    {
        $course = Course::findOrFail($coursecode);
        return view('edit.page.add',['course'=>$course]);
    }



    public function getView($coursecode,$pageslug = '0')
    {
        if($pageslug == '0')
            return redirect('/courses/'.$coursecode);
        else
        {
            if(!$page = Page::where('parent_code',$coursecode)->where('slug',$pageslug)->first())abort(404);
            if($page->isVisible()) {
                //render the page
                $course = Course::with('instructors', 'links', 'announcements')->findOrFail($coursecode);
                return view('courses.page', ['course' => $course, 'page' => $page]);
            }
            else
            {
                return redirect('/courses/'.$coursecode);
            }
        }
    }
    //'title','slug','parent_code', 'content', 'menulink','creator','status'
    public function postAdd($coursecode)
    {
        if($coursecode == Input::get('parent_code'))
        {

            $v = Validator::make(Input::all(), [
                'title' => 'required|max:255',
                'content' => 'required',
                'parent_code' => 'required|max:255|exists:courses,course_code',
                'status' => 'required|max:20',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/pages/add')->withInput()->withErrors($v);
            }
            else{
                $fill = Input::all();
                $fill['creator']= Auth::user()->username;
                if(!Input::has('slug')) $fill['slug']= str_slug(Input::get('title'),'-');//get or add a slug

                if(count(Page::where('parent_code',$coursecode)->where('slug',$fill['slug'])->first())!=0)//there is a page of this name already
                {
                    return Redirect::to('/courses/'.$coursecode.'/pages/add')->withErrors(['Please enter a different slug or change the title!']);
                }
                if(Input::has('menulink') && Input::get('menulink')=='1')
                { //'title','href','parent_code', 'weight'
                    $link= [];
                    $link['title']= Input::get('title');
                    $link['href']= '/courses/'.$coursecode.'/pages/view/'.$fill['slug'];
                    $link['parent_code']=$coursecode;
                    $link['weight']=1;
                    Link::create($link);
                }
                Page::create($fill);
                return Redirect::to('/courses/'.$coursecode);
            }
        }
        else
        {
            return Redirect::to('/courses/'.$coursecode.'/pages/add')->withErrors(['Course Mismatch!']);
        }
    }

    public function getDelete($coursecode,$pageslug ='0')
    {
        $course = Course::findOrFail($coursecode);
        if($pageslug != '0' && $pageslug != 'home')//page exists
        {
            if($page = Page::where('parent_code',$coursecode)->where('slug',$pageslug)->first())
                return view('edit.page.delete',['page'=>$page,'course'=>$course]);
            else
                abort(404);
        }
        else{

            return Redirect::to('/courses/'.$coursecode);
        }
    }

    public function postDelete($coursecode)
    {
         if($page = Page::where('parent_code',$coursecode)->where('slug',Input::get('slug'))->first()) {
             if ($page->slug == 'home') return Redirect::to('/courses/' . $coursecode);
             if ($link = Link::where('href', '/courses/' . $coursecode . '/pages/view/' . $page->slug)->first())
                 $link->delete();
             $page->delete();
             return Redirect::to('/courses/' . $coursecode);
         }
        else
            abort('404');
    }

    public function getEdit($coursecode,$pageslug='0')
    {
        $course = Course::findOrFail($coursecode);
        if($pageslug != '0')//page exists
        {
            if($page = Page::where('parent_code',$coursecode)->where('slug',$pageslug)->first())
                return view('edit.page.edit',['page'=>$page,'course'=>$course]);
            else
                abort(404);
        }
        else{

            return Redirect::to('/courses/'.$coursecode);
        }
    }

    public function postEdit($coursecode)
    {
         if($coursecode == Input::get('parent_code'))
        {

            $v = Validator::make(Input::all(), [
                'title' => 'required|max:255',
                'slug' =>'required|max:255|exists:pages,slug',
                'content' => 'required',
                'parent_code' => 'required|max:255|exists:courses,course_code',
                'status' => 'required|max:20',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/courses/'.$coursecode.'/pages/edit/'.Input::get('slug'))->withInput()->withErrors($v);
            }
            else{
                if($page = Page::where('parent_code',$coursecode)->where('slug',Input::get('slug'))->first())//find page to edit
                {
                    $page->content = Input::get('content');
                    $page->status = Input::get('status');
                    if($link = Link::where('href', '/courses/' . $coursecode . '/pages/view/' . $page->slug)->first())
                    {
                        if($page->status == 'published')
                        {
                            if($link->weight == 0)
                            {
                                $link->weight = 1;
                                $link->save();
                            }
                        }
                        if($page->status == 'draft')
                        {
                            if($link->weight != 0)
                            {
                                $link->weight = 0;
                                $link->save();
                            }
                        }
                    }
                    $page->save();
                    return Redirect::to('/courses/' . $coursecode);
                }
                else
                    return Redirect::to('/courses/'.$coursecode.'/pages/edit/'.Input::get('slug'))->withInput();
            }
        }
    else
        {
            return Redirect::to('/courses/'.$coursecode.'/pages/edit/'.Input::get('slug'))->withErrors(['Course Mismatch!']);
        }
    }
}
