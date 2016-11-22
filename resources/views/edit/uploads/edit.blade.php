@extends('app',['pagetitle'=>$course->title.' | Edit Upload'])

@section('content')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
        {{--'title','slug','parent_code', 'content', 'menulink','creator','status'--}}
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Edit {{substr($upload->filename,7)}} Upload
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/uploads/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">
						<input type="hidden" name="slug" value="{{ $upload->slug }}">

						<div class="form-group">
                            <label class="col-md-4 control-label">Description *</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="description" value="{{ $upload->description or old('description') }}">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Status*</label>
                            <div class="col-md-6">
                               <select class="form-control" name="status">
                                        <option value="draft" selected>Draft</option>
                                        <option value="published">Published</option>
                               </select>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit Upload
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
