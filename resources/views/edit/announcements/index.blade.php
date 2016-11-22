@extends('app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Course Announcements
				@if(Auth::user()->canEdit($course))
				    <a href="{{url('/courses/'.$course->course_code.'/announcements/add')}}" class="btn btn-info">Make Announcement</a>
				@endif
				</div>
                    @if(count($announcements)>0)
                    <ul class="list-group">
                        @foreach($announcements as $announcement)
                            @if(Auth::user()->canEdit($course) or $announcement->status == 'published')
                            <li class="list-group-item">
                                <table class="table-striped table-padding table-hover table-bordered">
                                        <tr><td>Announcement</td></tr><tr><td colspan="2">{{{$announcement->content}}}</td></tr>
                                        <tr><td>By</td><td>{{{$announcement->creator}}}</td></tr>
                                        @if(Auth::user()->canEdit($course))
                                        <tr><td>Status</td><td>{{{$announcement->status}}}</td></tr>
                                        <tr>
                                            <td><a href="{{ url('/courses/'.$course->course_code.'/announcements/delete/'.$announcement->id)}}">Delete</a></td>
                                            <td><a href="{{ url('/courses/'.$course->course_code.'/announcements/edit/'.$announcement->id)}}">Edit</a></td>
                                        </tr>
                                        @endif
                                </table>
                            </li>
                            @endif
                        @endforeach

                    </ul>
                    @else
                    <div class="panel-body">
                        <p class="alert alert-info">There are no announcements made for this course.</p>
                    </div>
                    @endif
			</div>
		</div>
	</div>
</div>
@endsection
