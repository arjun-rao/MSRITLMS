<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $username = 'username';
    protected $redirectAfterLogout = '/auth/login';
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
      if (Auth::check() && Auth::user()->role == 'hod') {
          $validation = Validator::make($data, [
              'name' => 'required|max:255',
              'username' => 'required|max:255|unique:users',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|confirmed|min:6',
          ]);
      }
      elseif (Auth::guest())
      {
          $validation = Validator::make($data, [
              'name' => 'required|max:255',
              'username' => 'required|regex:/(1MS\d\dIS\d{3}$)/i|max:255|unique:users',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|confirmed|min:6',
              'semester' => 'required|integer|min:3|max:8',
          ]);
      }
      return $validation;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
      $newrole = 'student';
      if (Auth::check() && Auth::user()->role == 'hod')
      {
          $newrole  = 'faculty';

          $newUser =  User::create([
              'name' => $data['name'],
              'username'=> $data['username'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'role' => $newrole,
              'semester'=> 0,
          ]);

        /*  Instructor::create([
              'username'=> $data['username'],
              'department_code' => 'IS',
              'designation' => 'To Be Updated',
              'qualification' => 'To Be Updated',
              'researcharea' => 'To Be Updated',
          ]);*/

          $this->redirectTo = '/faculty';
      }
      else
      {
          $newUser =  User::create([
              'name' => $data['name'],
              'username'=> $data['username'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
              'role' => $newrole,
              'semester' => $data['semester'],
          ]);
      }




      return $newUser;
    }
}
