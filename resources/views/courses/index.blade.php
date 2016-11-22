@extends('app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		@include('deptlinks')
		@if(Auth::user()->isFaculty())
         <div class="panel panel-default">
           <div class="panel-heading">Operations</div>
           <div class="panel-body">
               <ul class="list-group">
               @if(Auth::user()->role == 'hod')
                <li class="list-group-item"><a href="{{url('/courses/add')}}">Create a Course</a></li>
               @endif
                <li class="list-group-item"><a href="{{url('/courses/edit')}}">Modify a Course</a></li>
               </ul>
           </div>
          </div>
       @endif
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Find Courses</div>
                    <ul class="panel-body">
                           <li class="panel panel-info">
                               <div class="panel-heading">Find Courses by Course Code</div>
                                <div class="panel-body">
                                   @if(isset($error))
                                   <p class="alert alert-danger">{{$error}}</p>
                                   @endif
                                   <form action="{{ url('/courses/search') }}" method="POST">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       <div class="form-group">
                                           <div class="col-lg-6" style="display: inline-flex">
                                               <input type="text" name="searchterm" class="form-control" placeholder="eg IS101"> &nbsp
                                               <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                           </div>
                                       </div>
                                   </form>
                                </div>
                            </li>
                           <li class="panel panel-info">
                               <div class="panel-heading">Courses by Semester</div>
                               <div class="panel-body">
                                   @if(Auth::user()->isFaculty())
                                       <div class="col-lg-3">
                                       <ul class="list-group">
                                           <li class="list-group-item"><a href="{{url('courses/semester/3')}}">III Semester</a></li>
                                           <li class="list-group-item"><a href="{{url('courses/semester/4')}}">IV Semester</a></li>
                                           <li class="list-group-item"><a href="{{url('courses/semester/5')}}">V Semester</a></li>
                                           <li class="list-group-item"><a href="{{url('courses/semester/6')}}">VI Semester</a></li>
                                           <li class="list-group-item"><a href="{{url('courses/semester/7')}}">VII Semester</a></li>
                                           <li class="list-group-item"><a href="{{url('courses/semester/8')}}">VIII Semester</a></li>
                                       </ul>
                                       </div>
                                       @if(isset($courses) && count($courses)>0)
                                       <div class="col-lg-6">
                                        <table class="table-striped table-hover table-bordered table-padding">
                                        <tr><td>Course Code</td><td>Title</td></tr>
                                        @foreach($courses as $course)
                                                <tr>
                                                    <td><a href="{{url('/courses/'.$course->course_code)}}">{{{$course->course_code}}}</a></td>
                                                    <td>{{$course->title}}</td>
                                                </tr>
                                        @endforeach
                                        </table>
                                       </div>
                                       @endif
                                   @else
                                       <table class="table-striped table-hover table-bordered table-padding">
                                       <tr><td>Course Code</td><td>Title</td></tr>
                                        @if(count($courses)>0)
                                            @foreach($courses as $course)
                                                    <tr>
                                                        <td><a href="{{url('/courses/'.$course->course_code)}}">{{{$course->course_code}}}</a></td>
                                                        <td>{{$course->title}}</td>
                                                    </tr>
                                            @endforeach
                                        @else
                                        <tr><td colspan="2">There are no courses to show right now.</td></tr>
                                        @endif
                                       </table>
                                   @endif

                               </div>
                           </li>
                    </ul>
			</div>
		</div>


		<div class="col-md-2 text-center">
            @include('announcements',['announcements'=>$announcements])
            @if(Auth::user()->isfaculty())
            <div class="panel panel-default">
                <div class="panel-heading">Courses Taught By {{{Auth::user()->name}}}</div>

                <div class="panel-body">
                   @if(count($mycourses)>0)
                         <ul class="list-group">
                            @foreach($mycourses as $course)
                                <li class="list-group-item"><a href="{{url('/courses/'.$course)}}">{{{$course}}}</a></li>
                            @endforeach
                        </ul>
                   @else
                        <p>You are not teaching any course right now</p>
                   @endif
                   </div>

            </div>
        </div>
        @endif
	</div>
</div>
@endsection
