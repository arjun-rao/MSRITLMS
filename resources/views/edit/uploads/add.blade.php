@extends('app',['pagetitle'=>$course->title.' | New upload'])
<script src="{{{url('/js/jquery.js')}}}"></script>
<script type="text/javascript">

$(function(){

    var filesize;
    var error = false;
    $('#uploadFile').bind('change', function() {
        var temp= this.files[0].size/1024; //filesize in kb
        var filesize = temp.toFixed(2);
        var filename=  this.files[0].name;
        if(filesize > 5000) //allow only upto 5000kb per file
        {
            error = true;
            $('#jserror').text('Invalid file for upload. Make sure your file size is less than 5MB.').show();
        }
        else
        {
            error = false;
            $('#jserror').hide();
            $('#fsize').val(filesize+'KB');
        }
    });
    $('#uploadForm').on('submit', function(e){

            if(error)
                e.preventDefault(); //don't submit the form if there was an error.

    });

});

</script>
@section('content')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
        {{--'file_name','slug','description','type','link','uploader','parent_code','status'--}}
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Upload a file
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
					<form class="form-horizontal" id="uploadForm" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/uploads/add') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $course->course_code }}">
						<input type="hidden" id="fsize" name="filesize" value="">
						<input type="hidden" name="uploader" value="{{ Auth::user()->username }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Select File* (Max 5MB)</label>
                            <div class="col-md-6">
                                <input required id="uploadFile" type="file" name="upload">
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Description *</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="description" value="{{ old('description') }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">File Type *</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="type" value="{{ old('type') }}" placeholder="txt/jpg/doc/pdf/etc">
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
									Upload
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
