@extends('app',['pagetitle'=>$course->title.' | Discussion'])

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Course Discussion
				@if(Auth::user()) {{-->isFaculty()--}}
				    <a href="{{url('/courses/'.$course->course_code.'/questions/ask')}}" class="btn btn-info">Ask a Question</a>
				@endif
				</div>
                    @if(count($questions)>0)
                    <ul class="list-group">
                    {{-- //'text','studentname','studentemail', 'parent_code', 'answer','facultyname'--}}
                        @foreach($questions as $question)
                            <li class="list-group-item">
                                <table class="table-padding table-hover table-bordered">
                                        <tr>
                                            <td>Question by {{$question->studentname}}</td>
                                            <td><pre>{{$question->text}}</pre>

                                            </td>
                                        </tr>
                                        @if($question->answer == 'pending')
                                        <tr><td>Answer:</td><td>{{{$question->answer}}}</td></tr>
                                        @else
                                        <tr><td>{{$question->facultyname}} answered</td><td><pre>{{$question->answer}}</pre></td></tr>
                                        @endif
                                        @if(Auth::user()->canEdit($course))
                                        <tr>
                                            <td><a href="{{ url('/courses/'.$course->course_code.'/questions/answer/'.$question->id)}}">Answer</a></td>
                                            <td><a href="{{ url('/courses/'.$course->course_code.'/questions/delete/'.$question->id)}}">Delete</a></td>
                                        </tr>
                                        @endif
                                </table>
                            </li>
                        @endforeach

                    </ul>
                    @else
                    <div class="panel-body">
                        <p class="alert alert-info">There are no questions posted for this course.</p>
                    </div>
                    @endif

			</div>
		</div>
	</div>
</div>
@endsection
