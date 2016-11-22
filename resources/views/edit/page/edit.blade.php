@extends('app',['pagetitle'=>$course->title.' | Edit Page'])



<script type="text/javascript" src="{{url('/js/tinymce/tinymce.min.js')}}"></script>
<script type="text/javascript">
tinymce.init({
    selector: "#page-content",
    content_css : ["/css/styles.css","/css/app.css"],
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>
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
				    Edit {{$page->title}} Page
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/pages/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">
						<input type="hidden" name="title" value="{{ $page->title }}">
						<input type="hidden" name="slug" value="{{ $page->slug }}">

						<div class="form-group">
							<div class="col-md-8">
								<h4>Page Title: {{ $page->title }}</h4>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-6 control-label">Content*</label>
							<div class="col-md-12">
								<textarea id="page-content" cols="12" rows="20" class="form-control" name="content">{{$page->content}}</textarea>
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
									Edit Page
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
