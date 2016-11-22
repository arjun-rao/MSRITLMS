@extends('app',['pagetitle'=>$course->title.' | Confirm Deletion'])

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-2">
	    @include('courses.links',['course'=>$course])
	    </div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
				    Confirm Deletion of Question
				</div>
				<div class="panel-body">
					<p id="jserror" class="alert alert-danger">You cannot undo this action!</p>
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
                    </table>
					<form class="form-horizontal" role="form"  method="POST" action="{{ url('/courses/'.$course->course_code.'/questions/delete') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="course" value="{{$course->course_code}}">
						<input type="hidden" name="id" value="{{$question->id}}">
						<div class="form-group">
							<div class="col-md-6">
							 <p>Are you sure you want to delete this question?</p>
								<button type="submit" class="btn btn-primary">
								    Yes, Delete Question!
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
