@extends('app',['pagetitle'=>$course->title.' | Faculty Management'])

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Course Faculty Management</div>
                    <ul class="list-group">
                        @foreach($instructors as $instructor)
                            <li class="list-group-item panel-body">
                                <a href="{{{url('/faculty/profile/'.$instructor->username)}}}"><div class="col-md-2 profilepic" style="background-image: url({{{$instructor->imageurl}}});"></div></a>
                            <div class="col-md-10">
                                <table class="table-striped table-padding">
                                        <tr><td>Faculty Name</td><td>{{{$instructor->getDetails()['name']}}}</td></tr>
                                        <tr><td>Faculty Email</td><td>{{{$instructor->getDetails()['email']}}}</td></tr>
                                        @if($course->instructors->contains($instructor))
                                        <tr>
                                            <td>
                                                <form class="form-horizontal" role="form"  method="POST" action="{{url('/courses/'.$course->course_code.'/faculty/remove')}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="username" value="{{$instructor->username}}">
                                                    <input type="hidden" name="course" value="{{$course->course_code}}">
                                                    <input type="hidden" name="action" value="detach">
                                                    <div class="form-group">
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Remove from Course
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @else()
                                        <tr>
                                            <td>
                                                 <form class="form-horizontal" role="form"  method="POST" action="{{ url('/courses/'.$course->course_code.'/faculty/add') }}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="username" value="{{$instructor->username}}">
                                                    <input type="hidden" name="course" value="{{$course->course_code}}">
                                                    <input type="hidden" name="action" value="attach">
                                                    <div class="form-group">
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Add to Course
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                </table>
                             </div>
                            </li>
                        @endforeach

                    </ul>
			</div>
		</div>
	</div>
</div>
@endsection
