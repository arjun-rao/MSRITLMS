
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
				<div class="panel-heading">Confirm Deletion of  Course - <b>{{$course->course_code}}</b></div>
                    <div class="panel-body">
                     <p id="jserror" class="alert alert-danger">You cannot undo this action!<br>
                     Deletion of a course will result in deletion of associated pages,links, uploads, questions, and announcements.</p>
                    <form class="form-horizontal" role="form"  method="POST" action="{{url('/courses/delete')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="code" value="{{$course->course_code}}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                             <p>Are you sure you want to delete this Course?</p>
                                <button type="submit" class="btn btn-primary">
                                    Yes, Delete Course!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>
@endsection

