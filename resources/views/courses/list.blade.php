
@extends('app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		@include('deptlinks')
		@if(Auth::user()->role == 'hod')
         <div class="panel panel-default">
           <div class="panel-heading">Operations</div>
           <div class="panel-body">
               <ul class="list-group">
                <li class="list-group-item"><a href="{{url('/courses/add')}}">Create a Course</a></li>
                <li class="list-group-item"><a href="{{url('/courses/edit')}}">Modify a Course</a></li>
               </ul>
           </div>
          </div>
       @endif
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Modify Courses <a href="{{url('/courses/add')}}" class="btn btn-info">Add a Course</a></div>
                <div class="panel-body">
                    <table class="table-striped table-padding table-hover table-bordered">
                        <tr class="text-center h5">
                            <td>Course Code</td>
                            <td>Semester</td>
                            <td>Course title</td>
                            <td>Credits</td>
                            <td>Status</td>
                            <td colspan="2">Manage</td>
                        </tr>
                        @foreach($courses as $course)
                        <tr>
                            <td><a href="{{url('/courses/'.$course->course_code)}}">{{{$course->course_code}}}</a></td>
                            <td>{{{$course->semester}}}</td>
                            <td>{{{$course->title}}}</td>
                            <td>{{{$course->credits}}}</td>
                            <td>{{{$course->status}}}</td>
                            <td><a href="{{ url('/courses/edit/'.$course->course_code)}}">Edit Course</a></td>
                            <td><a href="{{ url('/courses/delete/'.$course->course_code)}}">Delete Course</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

