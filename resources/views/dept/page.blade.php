@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">Courses</div>

                <div class="panel-body">
                    <b>Search by Course Code</b>
                    <form action="{{ url('/courses/search') }}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-lg-12" style="display:inline-flex">
                                <input type="text" name="searchterm" class="form-control" placeholder="eg IS101"> &nbsp
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <br><br><hr>
                    @if(Auth::user()->isFaculty())
                    <b>View Courses by Semester</b>
                    <ul>
                       <li class=""><a href="{{url('courses/semester/3')}}">III Semester</a></li>
                       <li class=""><a href="{{url('courses/semester/4')}}">IV Semester</a></li>
                       <li class=""><a href="{{url('courses/semester/5')}}">V Semester</a></li>
                       <li class=""><a href="{{url('courses/semester/6')}}">VI Semester</a></li>
                       <li class=""><a href="{{url('courses/semester/7')}}">VII Semester</a></li>
                       <li class=""><a href="{{url('courses/semester/8')}}">VIII Semester</a></li>
                </ul>
                    @endif
                </div>
            </div>
            @include('deptlinks')
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">ISE | {{$page->title}}</div>

				<div class="panel-body">
				{!! $page->content !!}
				</div>
			</div>
		</div>
		<div class="col-md-2">
		     @include('announcements',['announcements'=>$announcements])
        </div>
	</div>
</div>
@endsection
