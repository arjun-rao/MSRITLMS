@extends('app',['pagetitle'=>$course->title.' | Answer Question'])

@section('content')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Answer Question
				</div>
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
                    {{--'title','href','parent_code', 'weight'--}}
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/questions/answer') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">
						<input type="hidden" name="facultyname" value="{{ Auth::user()->name }}">
						<input type="hidden" name="id" value="{{ $question->id }}">
						<div class="form-group">
                            <label class="col-md-4 control-label">Question</label>
                            <div class="col-md-6">
                                <p>{{$question->text}}</p>
                                <p>Student Name: {{$question->studentname}}</p>
                                <p>Student Email: {{$question->studentemail}}</p>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Answer*</label>
                            <div class="col-md-6">
                                <textarea cols="20" rows="10" class="form-control" name="answer">{{ $question->answer or old('answer') }}</textarea>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Answer Question
								</button>
							</div>
						</div>
					</form>
					<p>* fields are mandatory.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
