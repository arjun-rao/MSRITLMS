@extends('app',['pagetitle'=>$course->title.' | '.$page->title])

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		@include('courses.links',['course'=>$course])
        <div class="panel panel-default">
            <div class="panel-heading">Course Instructors</div>

            <div class="panel-body">
               @if(count($course->instructors)>0)
                     <ul class="list-group">
                        @foreach($course->instructors as $instructor)
                            <li class="list-group-item"><a href="{{url('/faculty/profile/'.$instructor->username)}}">{{{$instructor->getDetails()['name']}}}</a></li>
                        @endforeach
                    </ul>
               @else
                    <p>To be Announced.</p>
               @endif
               @if(Auth::user()->role == 'hod')
               <p><a href="{{url('/courses/'.$course->course_code.'/faculty')}}">Add/Remove Faculty</a></p>
               @endif
               </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Course Information</div>

            <div class="panel-body">
                <table class="table-bordered table-padding table-striped">
                    <tr><td>Course Code:</td><td>{{$course->course_code}}</td></tr>
                    <tr><td>Semester</td><td>{{$course->semester}}</td></tr>
                    <tr><td>Course Credits:</td><td>{{$course->credits}}</td></tr>
                    <tr><td>Course Duration:</td><td>{{$course->duration}}</td></tr>
                </table>
            </div>
        </div>
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">@if($page->slug != 'home'){{$course->title.' ('.$course->course_code.') | '.$page->title}}@endif</div>
                    <div class="panel-body">
                        @if($page->slug == 'home')
                        <div class="col-lg-12">
                            <h2><strong>{{$course->course_code}}: {{$course->title}}</strong></h2>
                            <hr>
                            <p>
                                <h3>Course Description</h3>
                                <pre style="background-color: white;border: 0px;font-family: inherit;">{{$course->description}}</pre>
                            </p>
                        </div>
                        @endif
                        <div class="col-lg-12">
                        {!!$page->content!!}
                        </div>
                    </div>
			</div>
		</div>


		<div class="col-md-2 text-center">
            @include('announcements',['crud'=>'/courses/'.$course->course_code.'/announcements','announcements'=>$course->announcements])
            @if(Auth::user()->isFaculty())
               <div class="panel panel-default">
               <div class="panel-heading">Operations</div>
               <div class="panel-body">
                   <ul class="list-group">
                   <li class="list-group-item"><a href="{{url('/courses/edit/'.$course->course_code)}}">Modify Course</a> </li>
                    <li class="list-group-item"><a href="{{url('/courses/'.$course->course_code.'/pages/')}}">Course Pages</a></li>
                    <li class="list-group-item"><a href="{{url('/courses/'.$course->course_code.'/pages/edit/'.$page->slug)}}">Edit this page</a></li>
                    @if($page->slug != 'home')
                        <li class="list-group-item"><a href="{{url('/courses/'.$course->course_code.'/pages/delete/'.$page->slug)}}">Remove this page</a></li>
                    @endif
                    <li class="list-group-item"><a href="{{url('/courses/'.$course->course_code.'/pages/add')}}">Add a Page</a></li>
                   </ul>
               </div>
               </div>
            @endif
        </div>

	</div>
</div>
@endsection
