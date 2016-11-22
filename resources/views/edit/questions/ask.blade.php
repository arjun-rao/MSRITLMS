@extends('app',['pagetitle'=>$course->title.' | Post Question'])

@section('content')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
        {{-- //'text','studentname','studentemail', 'parent_code', 'answer','facultyname'--}}
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				  Ask a Question
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
					<form class="form-horizontal" id="uploadForm" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/questions/ask') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">
						<input type="hidden" name="studentname" value="{{ Auth::user()->name }}">
						<input type="hidden" name="studentemail" value="{{ Auth::user()->email }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Question*</label>
							<div class="col-md-6">
								<textarea cols="20" rows="10" class="form-control" name="text">{{ old('text') }}</textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Ask
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
