
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
				<div class="panel-heading">Create a Course</div>
                    <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{--'course_code', 'department_code', 'semester','title','credits','duration','status'--}}
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/add') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Course Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="course_code" value="{{ old('course_code') }}">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Course Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Course Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="width:100%; height: 250px;" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Semester</label>
                            <div class="col-md-6">
                                <input type="number" style="width: auto" size="30"  min="3" max="8" class="form-control" name="semester" value="{{ old('semester') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Course Credits</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="credits" value="{{old('credits')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Duration/Term</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="duration" value="{{old('duration')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                               <select class="form-control" name="status">
                                        <option value="draft" selected>Draft</option>
                                        <option value="published">Published</option>
                               </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Course
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>All fields are mandatory.</p>
                </div>
			</div>
		</div>


		<div class="col-md-2 text-center">
            @include('announcements')
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

