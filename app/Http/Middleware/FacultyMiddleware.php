<?php

namespace App\Http\Middleware;

use App\Models\Instructor;
use Closure;
use Auth;
use App\Models\Course;
use Illuminate\Contracts\Auth\Guard;

class FacultyMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && in_array(Auth::user()->role ,['hod','faculty']))
        {
            if($request->route()->getParameter('course_code') !== null)
            {
                if(Auth::user()->role == 'hod')
                    return $next($request);
                else
                {
                    $code = $request->route()->getParameter('course_code');
                    $course = Course::with('instructors')->findOrFail($code);
                    $instructor = Instructor::with('courses')->find(Auth::user()->username);
                    if($instructor->courses->contains($course) && $course->instructors->contains($instructor))
                    {
                        return $next($request);
                    }
                    else
                        abort(401);

                }
            }

            return $next($request);
        }
        else
        {
            abort(401,'Unauthorised Access!');
        }
    }
}
