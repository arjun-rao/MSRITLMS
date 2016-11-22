<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
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

class DepartmentController extends Controller
{
    /**
     *
     * Handle requests to /department/
     *
     */

    /**
     *Only allow hod to modify.
     *
     * @return DepartmentController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hod',['except'=>['getPage']]);

    }

    public  function getIndex()
    {
       $pages = Page::where('parent_code',null)->get();
       $announcements = Announcement::where('parent_code',null)->get();
       return view('dept.pages.index',['pages'=>$pages,'announcements'=>$announcements]);
    }
    public function getAddPage()
    {
        return view('dept.pages.add');
    }



    public function getPage($pageslug = '0')
    {
        if($pageslug == '0')
            return redirect('/');
        else
        {
            if(!$page = Page::where('parent_code',null)->where('slug',$pageslug)->first())abort(404);
            if($page->isVisible()) {
                //render the page
                $announcements = Announcement::where('parent_code',null)->orderBy('created_at','DESC')->get();
                return view('dept.page', ['announcements' => $announcements, 'page' => $page]);
            }
            else
            {
                return redirect('/');
            }
        }
    }
    //'title','slug','parent_code', 'content','creator','status'
    public function postAddPage()
    {
            $v = Validator::make(Input::all(), [
                'title' => 'required|max:255',
                'content' => 'required',
                'status' => 'required|max:20',
            ]);

            if ($v->fails())
            {
                return Redirect::to('/department/'.'add-page')->withInput()->withErrors($v);
            }
            else{
                $fill = Input::all();
                $fill['creator']= Auth::user()->username;
                if(!Input::has('slug')) $fill['slug']= str_slug('ise-'.Input::get('title'),'-');//get or add a slug

                if(count(Page::where('parent_code',null)->where('slug',$fill['slug'])->first())!=0)//there is a page of this name already
                {
                    return Redirect::to('/department/'.'add-page')->withInput()->withErrors(['Please enter a different slug!']);
                }
                $link= [];
                $link['title']= Input::get('title');
                $link['href']= '/department/page/'.$fill['slug'];
                $link['weight']=1;
                Link::create($link);
                Page::create($fill);
                return Redirect::to('/department/');
            }
    }

    public function getDeletePage($pageslug ='0')
    {
        if($pageslug != '0' && $pageslug != 'home')//page exists
        {
            if($page = Page::where('parent_code',null)->where('slug',$pageslug)->first())
                return view('dept.pages.delete',['page'=>$page]);
            else
                abort(404);
        }
        else{

            return Redirect::to('/department/');
        }
    }

    public function postDeletePage()
    {
         if($page = Page::where('parent_code',null)->where('slug',Input::get('slug'))->first()) {
             if ($page->slug == 'home') return Redirect::to('/department/');
             if ($link = Link::where('href', '/department/page/' . $page->slug)->first())
                 $link->delete();
             $page->delete();
             return Redirect::to('/department/');
         }
        else
            abort('404');
    }

    public function getEditPage($pageslug='0')
    {
        if($pageslug != '0')//page exists
        {
            if($page = Page::where('parent_code',null)->where('slug',$pageslug)->first())
                return view('dept.pages.edit',['page'=>$page]);
            else
                abort(404);
        }
        else{

            return Redirect::to('/department/');
        }
    }

    public function postEditPage()
    {
        $v = Validator::make(Input::all(), [
            'title' => 'required|max:255',
            'slug' =>'required|max:255|exists:pages,slug',
            'content' => 'required',
            'status' => 'required|max:20',
        ]);

        if ($v->fails())
        {
            return Redirect::to('/department/edit-page/'.Input::get('slug'))->withInput()->withErrors($v);
        }
        else{
            if($page = Page::where('parent_code',null)->where('slug',Input::get('slug'))->first())//find page to edit
            {
                $page->content = Input::get('content');
                $page->status = Input::get('status');
                if($link = Link::where('href','/department/page/' . $page->slug)->first())
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
                return Redirect::to('/department/');
            }
            else
                abort(404);
        }
    }


    public function getAddAnnouncement()
    {
        return view('dept.announcements.add');
    }
    public function postAddAnnouncement()
    {

            $v = Validator::make(Input::all(), [
                'content' => 'required|max:255',
                'creator' => 'required|max:255',
                'status' => 'required|max:20',
            ]);

            if ($v->fails())
            {
                return Redirect::to('department/add-announcement')->withInput()->withErrors($v);
            }
            else{
                Announcement::create(Input::all());
                return Redirect::to('/department/');
            }
    }
    public function getDeleteAnnouncement($aid='0')
    {
        if($aid != '0')//announcement exists
        {
            $announcement = Announcement::findOrFail($aid);
            return view('dept.announcements.delete',['announcement'=>$announcement]);
        }
        else{
            return Redirect::to('/department/');
        }
    }
    public function getEditAnnouncement($announcementid='0')
    {

        if($announcementid != '0')//announcement exists
        {
            $announcement = Announcement::findOrFail($announcementid);
            return view('dept.announcements.edit',['announcement'=>$announcement]);
        }
        else{
            return Redirect::to('/department/');
        }
    }
    public function postEditAnnouncement()
    {

        $v = Validator::make(Input::all(), [
            'content' => 'required|max:255',
            'creator' => 'required|max:255',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/'.$coursecode.'/announcements/edit/'.Input::get('id'))->withInput()->withErrors($v);
        else{
            $announcement = Announcement::findOrFail(Input::get('id'));
            $announcement->content = Input::get('content');
            $announcement->status = Input::get('status');
            $announcement->save();
            return Redirect::to('/department/');

        }
    }

    public function postDeleteAnnouncement()
    {
        if($announcement = Announcement::where('parent_code',null)->where('id',Input::get('id'))->first()) {
            $announcement->delete();
            return Redirect::to('/department/');
        }
        else
            abort('404');
    }

}
