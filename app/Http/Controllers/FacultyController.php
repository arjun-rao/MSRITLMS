<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use File;
use App\User;
use App\Models\Instructor;
use App\Models\FacultyPublication;
use App\Models\FacultyProjectFunding;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class FacultyController extends Controller
{
    /**
     *
     * Handle management of user profiles and faculty data
     * to be used only by HoD
     */

    /**
     * Allow only HOD to add or delete faculty,
     * Allow faculty to edit profile
     * Allow students to only view profile.
     *
     * @return FacultyController
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hod',['only'=>['getAdd','postAdd','getDelete','postDelete']]);
        $this->middleware('faculty',['only'=>['getEdit','postEdit','getAll']]);

    }

    public function getIndex() //return view with listing of all faculty.
    {
        if(Instructor::count() > 0) {
            $instructors = Instructor::orderBy('created_at')->get();
            if(Auth::user()->isFaculty()) {
                $me = Instructor::with('courses')->find(Auth::user()->username); //can use previous query.
                $mycourses = $me->courses->pluck('course_code');
                return view('faculty.index', ['instructors' => $instructors, 'courses' => $mycourses]);
            }
            else
                return view('faculty.index', ['instructors' => $instructors]);
        }
        else
            return redirect('/');
    }
    /**
     * Responds to requests to GET /faculty/profile/{username}
     * @param $username
     * @return \Illuminate\Support\Facades\View
     */
    public function getProfile($username='null')
    {
        if($username == 'null')
        {
            $currentuser = Auth::user();
            if($currentuser->role == 'student')
            {
                return redirect('/faculty');
            }
            else //faculty is viewing their own profile, prepare object for rendering
            {
                $noAdd = false;
                $instructor = Instructor::find($currentuser->username);
                $instructor['name'] = $currentuser->name;
                $instructor['email'] = $currentuser->email;
                $education = $instructor->education;
                $event = $instructor->event;
                $industry = $instructor->industry;
                $experience = $instructor->experience;
                $publication = $instructor->publication;
                $projectfunding = $instructor->projectfunding;
                $projectguidance = $instructor->projectguidance;
                $mycourses = $instructor->courses->pluck('course_code');
            }

        }
        else //viewing specific faculty's profile
        {
            if( $currentuser = User::find($username)){
                if($currentuser->isFaculty()) //user is faculty, prepare object for rendering
                {
                    $noAdd = true;
                    $instructor = Instructor::find($username);
                    $instructor['name'] = $currentuser->name;
                    $instructor['email'] = $currentuser->email;
                    $education = $instructor->education;
                    $event = $instructor->event;
                    $industry = $instructor->industry;
                    $experience = $instructor->experience;
                    $publication = $instructor->publication;
                    $projectfunding = $instructor->projectfunding;
                    $projectguidance = $instructor->projectguidance;
                    $mycourses = $instructor->courses->pluck('course_code');
                }
                else //user is not a faculty, return 404
                {
                    abort(404,'Faculty Not Found');
                }
            }
            else
            {
                abort(404,'Faculty Not Found');
            }

        }
        $data = [
            'instructor'=>$instructor,
            'courses'=>$mycourses,
            'noAdd'=>$noAdd,
            'education' => $education,
            'events' => $event,
            'industries'=>$industry,
            'experiences'=>$experience,
            'publications'=>$publication,
            'projectfunding' => $projectfunding,
            'projectguidance' => $projectguidance
        ];
        //render the object if everything was fine.
        return view('faculty.profile',$data);
    }

    public function getAll()
    {

        $currentuser = Auth::user();
        if($currentuser->isFaculty()) //user is faculty, prepare object for rendering
        {
            $instructor = Instructor::find($currentuser->username);
            $instructor['name'] = $currentuser->name;
            $instructor['email'] = $currentuser->email;
            $publication = FacultyPublication::all();
            $projectfunding = FacultyProjectFunding::all();
            $mycourses = $instructor->courses->pluck('course_code');
        }
        else //user is not a faculty, return 404
        {
            abort(404,'Faculty Not Found');
        }

        $data = [
            'instructor'=>$instructor,
            'courses'=>$mycourses,
            'noAdd'=>true,
            'publications'=>$publication,
            'projectfunding' => $projectfunding,
        ];
        //render the object if everything was fine.
        return view('faculty.all',$data);
    }

    public function getEdit()
    {
        $currentuser = Auth::user();
        if($currentuser->role == 'student')
        {
            return redirect('/faculty');
        }
        else //faculty is editing their own profile, prepare object for rendering
        {
            $instructor = Instructor::find($currentuser->username);
            $instructor['name'] = $currentuser->name;
            $instructor['email'] = $currentuser->email;
        }
        return view('faculty.edit',['current' => $instructor]);
    }

    public function getAdd()
    {
        return view('auth.facultyregister');
    }

    public function postAdd()
    {

        $newUser =  User::create([
            'name' => Input::get('name'),
            'username'=> Input::get('username'),
            'email' => Input::get('email'),
            'password' => bcrypt(Input::get('password')),
            'role' => 'faculty',
            'semester'=> 0,
        ]);

        Instructor::create([
            'username'=> Input::get('username'),
            'department_code' => 'IS',
            'designation' => 'To Be Updated',
            'qualification' => 'To Be Updated',
            'researcharea' => 'To Be Updated',
        ]);

        return Redirect::to('/faculty');
    }

    public function getDelete($username = 'null')
    {
        $currentuser = Auth::user();
        if($username == 'null')
        {
            $instructors = Instructor::all();
            if($currentuser->role == 'hod')
                return view('faculty.index',['instructors'=>$instructors,'showDelete'=>true]);
            else
                abort(401,'Unauthorised');


        }
        else //delete specific faculty's profile
        {
            if($currentuser->role == 'hod')
            {
                return view('faculty.delete',['user' => $username]);
            }
        }
    }

    public function postDelete()
    {
        $currentuser = Auth::user();
        if($currentuser->role == 'hod')
        {
            $usertoDelete = User::findorFail(Input::get('username'));
            $instructor = Instructor::find(Input::get('username'));
            $imagefilename = public_path(). $instructor->imageurl;
            if($instructor->imageurl != '/img/faculty.png')
                File::delete($imagefilename);
            //$instructor->delete(); not needed as delete on user cascades on instructor model
            $usertoDelete->delete();
            return Redirect::to('/faculty');
        }
        else
        {
            return Redirect::to('/');
        }
    }

    public function postEdit()
    {
        $currentuser = Auth::user();
        if($currentuser->role == 'student')
        {
            abort(401,'You are not authorised to view this page');
        }
        else //allow faculty to edit their own profiles, by validating the submitted form.
        {
            $instructor = Instructor::find($currentuser->username);
            //Validate the user's form submission
            $rules = [
                'name' => 'required|max:255',
                'designation'=> 'required|max:255',
                'qualification'=>'required|max:255',
                'researcharea' => 'required|max:255',
                'photo' => 'mimes:jpeg,bmp,png|max:100'
            ];

            if(Input::get('email') == $currentuser->email)
                $rules['email'] = 'required|email|max:255';
            else
                $rules['email'] = 'required|email|max:255|unique:users';

            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails())
            {
                return Redirect::to('/faculty/edit')->withErrors($validator);
            }
            else
            {
                if (Input::hasFile('photo') && Input::file('photo')->isValid()) {
                    $file            = Input::file('photo');
                    $destinationPath = public_path().'/img/profiles/';
                    $filename        = str_random(6) . '_' . $file->getClientOriginalName();
                    $uploaded   = $file->move($destinationPath, $filename);
                    chmod($destinationPath.$filename, 0755);
                    $oldfilename = public_path(). $instructor->imageurl;
                    if($instructor->imageurl != '/img/faculty.png')
                    File::delete($oldfilename);
                    $instructor->imageurl = '/img/profiles/'.$filename;
                }
                // update user details
                if(Input::get('name') != $currentuser->name)
                    $currentuser->name = Input::get('name');
                if(Input::get('email') != $currentuser->email)
                    $currentuser->email = Input::get('email');
                $currentuser->save();
                
                //update instructor details
                if(Input::get('designation') != $instructor->designation)
                    $instructor->designation = Input::get('designation');
                if(Input::get('qualification') != $instructor->qualification)
                    $instructor->qualification = Input::get('qualification');
                if(Input::get('researcharea') != $instructor->researcharea)
                    $instructor->researcharea = Input::get('researcharea');
                if(Input::get('date_of_birth')!= $instructor->date_of_birth)
                    $instructor->date_of_birth=Input::get('date_of_birth');
                if(Input::get('address')!= $instructor->address)
                    $instructor->address=Input::get('address');
                if(Input::get('phone')!= $instructor->phone)
                    $instructor->phone=Input::get('phone');
                if(Input::get('msritemail')!= $instructor->msritemail)
                    $instructor->msritemail=Input::get('msritemail');
                if(Input::get('gender')!= $instructor->gender)
                    $instructor->gender=Input::get('gender');
                if(Input::get('website')!= $instructor->website)
                    $instructor->website=Input::get('website');
                if(Input::get('date_of_joining')!= $instructor->date_of_joining)
                    $instructor->date_of_joining=Input::get('date_of_joining');

                //'date_of_birth','address','phone','msritemail','gender','website','date_of_joining'

                $instructor->save();
                $instructor['name'] = $currentuser->name;
                $instructor['email'] = $currentuser->email;
                return redirect('/faculty/profile');
            }

        }

    }


}
