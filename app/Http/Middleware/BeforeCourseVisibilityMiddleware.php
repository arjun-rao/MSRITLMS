<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Auth;
use Closure;

class BeforeCourseVisibilityMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $code = $request->route()->getParameter('course_code');
        $course = Course::findOrFail($code);
        if(!Auth::check()) abort(404);
        if (Auth::user()->isFaculty())
            return $next($request);
        elseif ($course->status != 'draft' && $course->semester == Auth::user()->semester)
            return $next($request);
        else
            abort(404);
    }
}
