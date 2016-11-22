<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;
use Redirect;
use App\Models\Course;
use App\Models\Upload;
use File;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UploadController extends Controller
{
    /**
     *
     * Handle requests to /courses/{code}/uploads/
     *
     */

    /**
     * Allow faculty to view,add,edit,delete course media.
     * Allow students to view uploads belonging to the course.
     *
     * @return UploadController
     */
    public function __construct()
    {
       // $this->middleware('auth');
        //$this->middleware('faculty',['except'=>'getIndex']);

    }
    public function getIndex($coursecode)
    {
        $course = Course::with('uploads')->findOrFail($coursecode);
        $uploads = $course->uploads;
        return view('edit.uploads.index',['course'=>$course,'uploads'=>$uploads]);
    }

    public function getAdd($coursecode)
    {
        $course = Course::findOrFail($coursecode);
        return view('edit.uploads.add',['course'=>$course]);
    }
    public function postAdd($coursecode) //'upload','file_name','slug','description','type','link','uploader','parent_code','status'
    {
        $v = Validator::make(Input::all(), [
            'upload'=>'required|max:5000',
            'description' => 'required|max:255',
            'type' => 'required|max:10',
            'parent_code' => 'required|max:255|exists:courses,course_code',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/'.$coursecode.'/uploads/add')->withInput()->withErrors($v);
        elseif (Input::hasFile('upload') /*&& Input::file('upload')->isValid()*/) {
            $file = Input::file('upload');
            $destinationPath = public_path() . '/uploads/' . $coursecode.'/';
            $filename = str_random(6) . '_' . $file->getClientOriginalName();
            $uploaded = $file->move($destinationPath, $filename);
            chmod($destinationPath . $filename, 0755);
            $upload = [];
            $upload['file_name'] = $filename;
            $upload['slug'] = str_slug($filename, '-');
            $upload['description'] = Input::get('description');
            $upload['type'] = Input::get('type');
            $upload['link']= '/uploads/' . $coursecode.'/'.$filename;
            $upload['file_size']= Input::get('filesize');
            $upload['uploader'] = Input::get('uploader');
            $upload['parent_code'] = $coursecode;
            $upload['status'] = Input::get('status');
            Upload::create($upload);
            return Redirect::to('/courses/'.$coursecode.'/uploads/');
        }
        else
            return Redirect::to('/courses/'.$coursecode.'/uploads/add')->withInput();

    }
    public function getEdit($coursecode,$fileslug='null')
    {
        $course = Course::findOrFail($coursecode);
        if($fileslug != '0')//upload exists
        {
            $upload = Upload::findOrFail($fileslug);
            return view('edit.uploads.edit',['upload'=>$upload,'course'=>$course]);
        }
        else{
            $course = Course::with('uploads')->findOrFail($coursecode);
            $uploads = $course->uploads;
            return view('edit.uploads.index',['uploads'=>$uploads,'course'=>$course]);
        }
    }
    public function postEdit($coursecode)
    {
        if($coursecode != Input::get('parent_code'))
            return Redirect::to('/courses/'.$coursecode.'/uploads/');
            $v = Validator::make(Input::all(), [
            'description' => 'required|max:255',
            'slug' => 'required',
            'parent_code' => 'required|max:255|exists:courses,course_code',
            'status' => 'required|max:20',
        ]);
        if($v->fails())
            return Redirect::to('/courses/'.$coursecode.'/uploads/edit/'.Input::get('slug'))->withInput()->withErrors($v);
        else{
            $upload = Upload::with('course')->findOrFail(Input::get('slug'));
            $upload->description = Input::get('description');
            $upload->status = Input::get('status');
            $upload->save();
            return Redirect::to('/courses/'.$coursecode.'/uploads/');

        }
    }

    public function getDelete($coursecode,$fileslug='0')
    {
        if($fileslug != '0')//upload exists
        {
            $upload = Upload::with('course')->findOrFail($fileslug);
            return view('edit.uploads.delete',['upload'=>$upload,'course'=>$upload->course]);
        }
        else{
            $course = Course::with('uploads')->findOrFail($coursecode);
            $uploads = $course->uploads;
            return view('edit.uploads.index',['uploads'=>$uploads,'course'=>$course]);
        }
    }
    
    public function postDelete($coursecode)
    {
        if($upload = Upload::where('parent_code',$coursecode)->where('slug',Input::get('slug'))->first()) {
            $filename = public_path(). $upload->link;
            if(File::delete($filename))
                $upload->delete();
            return Redirect::to('/courses/' . $coursecode.'/uploads');
        }
        else
            abort('404');
    }


}
