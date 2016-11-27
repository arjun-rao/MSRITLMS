@extends('app')

@section('content')
<div class="container">
	<div class="row">
		@include('faculty.links')
		@include('faculty.experience.view')
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
