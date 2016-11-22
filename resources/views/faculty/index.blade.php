@extends('app')

@section('content')
<div class="container">
	<div class="row">
		@include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Department Faculty</div>
                    <ul class="list-group">
                        @foreach($instructors as $instructor)
                            <li class="list-group-item panel-body">
                            @if(!isset($showDelete))
                                <a href="{{{url('/faculty/profile/'.$instructor->username)}}}"><div class="col-md-2 profilepic" style="background-image: url({{{$instructor->imageurl}}});"></div></a>
                            @elseif($showDelete)
                                <div class="col-md-2 profilepic" style="background-image: url({{{$instructor->imageurl}}});"></div>
                            @endif
                            <div class="col-md-10">
                                <table class="table-striped table-bordered table-padding">
                                        <tr><td>Faculty Name</td><td>{{{$instructor->getDetails()['name']}}}</td></tr>
                                        <tr><td>Faculty Email</td><td>{{{$instructor->getDetails()['email']}}}</td></tr>
                                        <tr><td>Designation</td><td>{{{$instructor->designation}}}</td></tr>
                                        <tr><td>Qualifications</td><td>{{{$instructor->qualification}}}</td></tr>
                                        <tr><td>Research Areas</td><td>{{{$instructor->researcharea}}}</td></tr>
                                        @if(isset($showDelete))
                                        <tr><td colspan="2" class="text-center"><a class="btn btn-default" href="{{{url('/faculty/delete/'.$instructor->username)}}}">Click to delete</a></td></tr>
                                        @endif

                                </table>
                             </div>
                            </li>
                        @endforeach

                    </ul>
			</div>
		</div>
		<div class="col-md-2 text-center">
            @if(isset($courses))
            <div class="panel panel-default">
                <div class="panel-heading">Courses Taught By {{{Auth::user()->name}}}</div>

                <div class="panel-body">
                   @if(count($courses)>0)
                         <ul class="list-group">
                            @foreach($courses as $course)
                                <li class="list-group-item"><a href="{{url('/courses/'.$course)}}">{{{$course}}}</a></li>
                            @endforeach
                        </ul>
                   @else
                        <p>You are not teaching any course right now</p>
                   @endif

                </div>
            </div>
            @endif
        </div>
	</div>
</div>
@endsection
