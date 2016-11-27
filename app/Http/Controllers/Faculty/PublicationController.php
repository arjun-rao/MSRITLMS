<?php

namespace App\Http\Controllers\Faculty;

use App\Models\FacultyPublication;
use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\User;
use App\Models\Instructor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PublicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('faculty');
    }

    public function getIndex() //return view with listing of all publication details of current faculty.
    {
        if(Instructor::count() > 0) {
            $me = Instructor::with('courses','publication')->find(Auth::user()->username);
            $publication = $me->publication;
            $mycourses = $me->courses->pluck('course_code');
            return view('faculty.publication.index', ['publications' => $publication, 'courses' => $mycourses,'noAdd'=>false]);
        }
        else
            return redirect('/');
    }


    public function getEdit($id = 'null')
    {
        $publication = FacultyPublication::findorFail($id);
        if($publication->faculty_id == Auth::user()->username)
            return view('faculty.publication.edit',['current' => $publication]);
        else
            abort('401','Unauthorised');
    }
    public function getDelete($id = 'null')
    {
        $publication = FacultyPublication::findorFail($id);
        if($publication->faculty_id == Auth::user()->username) {
            $publication->delete();
            return redirect('/faculty/publication/index');
        }
        else
            abort('401','Unauthorised');
    }

    public function getAdd()
    {
        return view('faculty.publication.add');
    }



    public function postAdd()
    {
        $currentuser = Auth::user();

        if(Input::get('faculty_id') != $currentuser->username)
            abort('401','Unauthorised');

        FacultyPublication::create(Input::all());

        return redirect('/faculty/publication/index');

    }

    public function postEdit()
    {
        $currentuser = Auth::user();

        $publication = FacultyPublication::findorFail(Input::get('id'));
        if($publication->faculty_id != $currentuser->username)
            abort('401','Unauthorised');

        // update 'year_of_publication','article_title','type','publication_title','publisher','publication_link','domain'

        //update publication details
        if(Input::get('year_of_publication') != $publication->year_of_publication)
            $publication->year_of_publication = Input::get('year_of_publication');
        if(Input::get('article_title') != $publication->article_title)
            $publication->article_title = Input::get('article_title');
        if(Input::get('type') != $publication->type)
            $publication->type = Input::get('type');
        if(Input::get('publication_title') != $publication->publication_title)
            $publication->publication_title = Input::get('publication_title');
        if(Input::get('publisher') != $publication->publisher)
            $publication->publisher = Input::get('publisher');
        if(Input::get('publication_link') != $publication->publication_link)
            $publication->publication_link = Input::get('publication_link');
        if(Input::get('domain') != $publication->domain)
            $publication->domain = Input::get('domain');



        $publication->save();

        return redirect('/faculty/publication/index');




    }
}
