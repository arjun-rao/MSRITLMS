
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
				<div class="panel-heading">Edit Course - {{$course->course_code}}</div>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/edit') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="code" value="{{$course->course_code}}">

                        <div class="form-group">
                            <div class="col-md-8 text-center">Course Code - <b>{{$course->course_code}}</b></div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Course Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="{{ $course->title or old('title') }}">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label">Course Description</label>
                            <div class="col-md-6">
                                <textarea class="form-control" style="width:100%; height: 250px;" name="description">{{$course->description or old('description')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Semester</label>
                            <div class="col-md-6">
                                <input type="number" style="width: auto" size="30"  min="3" max="8" class="form-control" name="semester" value="{{$course->semester or old('semester') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Course Credits</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="credits" value="{{$course->credits or old('credits')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Duration/Term</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="duration" value="{{$course->duration or old('duration')}}">
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
                                    Edit Course
                                </button>
                            </div>
                        </div>
                    </form>
                    <p>All fields are mandatory.</p>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

