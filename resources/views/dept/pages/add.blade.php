@extends('app')



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
            @include('deptlinks')
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Add a page
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/department/add-page') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Title *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ old('title') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Slug</label>
							<div class="col-md-6">
								<input type="text" class="form-control"  name="slug" value="{{ old('slug') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-6 control-label">Content*</label>
							<div class="col-md-12">
								<textarea id="page-content" cols="12" rows="20" class="form-control" name="content">{{old('content')}}</textarea>
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
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
									Add Page
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
