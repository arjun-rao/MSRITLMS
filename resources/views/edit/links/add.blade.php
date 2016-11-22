@extends('app',['pagetitle'=>$course->title.' | Add Link'])

@section('content')
<div class="container-fluid">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Add a link
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/links/add') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">URL/HREF</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="href" value="{{ old('href') }}">
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">weight</label>
							<div class="col-md-6">
								<input type="integer" min="1" class="form-control" name="weight" value="{{ old('weight') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Add Link
								</button>
							</div>
						</div>
					</form>
					<p>All fields are mandatory.<br>
					   Heavier links are arranged lower in the menu.<br>
					   Links are not shown if weight is 0.
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
