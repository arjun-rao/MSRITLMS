<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Input;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only'=>'getEdit','postEdit']);
        $this->middleware('hod',['only'=>['postDelete']]);

    }

    public function getIndex()
    {
        if(Auth::user()->role == 'faculty')
            return redirect('/');
        elseif(Auth::user()->role == 'hod') {
            return view('edit.users.index', ['users' => User::where('role','student')->get()]);
        }
        else
        return view('edit.users.profile',['user'=>Auth::user()]);
    }

    public function postEdit()
    {
        $user = Auth::user();
        if(Auth::user()->role == 'faculty')
            return redirect('/');
        elseif($user->role == 'student')
        {
            $v = Validator::make(Input::all(), [
                'name' => 'required|max:255',
                'email' => 'required|max:255|email',
            ]);

            if($v->fails()) return redirect('/user/')->withInput()->withErrors($v);
            if($user->name != Input::get('name'))
                $user->name = Input::get('name');
            if($user->email != Input::get('email') && !User::where('email',Input::get('email'))->first())
                $user->email = Input::get('email');
            $user->save();
            return redirect('/user/');
        }
        elseif($user->role == 'hod')
        {
            $user = User::findOrFail(Input::get('usn'));
            $v = Validator::make(Input::all(), [
                'name' => 'required|max:255',
                'email' => 'required|max:255|email',
                'semester' => 'integer|min:3|max:8',
            ]);

            if($v->fails()) return redirect('/user/')->withInput()->withErrors($v);
            if($user->name != Input::get('name'))
                $user->name = Input::get('name');
            if($user->email != Input::get('email') && !User::where('email',Input::get('email'))->first())
                $user->email = Input::get('email');
            if($user->semester != Input::get('semester'))
                $user->semester = Input::get('semester');
            $user->save();
            return redirect('/user/');
        }
    }
    public function postDelete()
    {
        if(Auth::user()->role == 'hod')
            {
                $user = User::findOrFail(Input::get('usn'));
                $user->delete();
                return redirect('/user/');
            }
        else
            return redirect('/');
    }
}
