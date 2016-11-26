@extends('app')
<script src="{{{url('/js/jquery.js')}}}"></script>
<script type="text/javascript">

$(function(){

    var filesize;
    var error = false;
    $('#imageFile').bind('change', function() {
        filesize= this.files[0].size/1024; //filesize in kb
        if(filesize > 100) //allow only upto 100kb per file
        {
            error = true;
            $('#jserror').text('Invalid file for upload. Make sure your image file size is less than 100 KB.').show();
        }
        else
        {
            error = false;
            $('#jserror').hide();
        }
    });
    $('#editForm').on('submit', function(e){

            if(error)
                e.preventDefault(); //don't submit the form if there was an error.

    });

});

</script>
@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit Your Profile
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
					<p id="jserror" class="alert alert-danger" style="display:none;"></p>
					<form id="editForm" class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">User ID</label>
                            <div class="col-md-6">
                                {{ $current->username }}
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $current->name or old('name') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ $current->email or old('email')  }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Designation</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="designation" value="{{ $current->designation or old('designation')  }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Qualification</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="qualification" value="{{ $current->qualification or old('qualification')  }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Research Area</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="researcharea" value="{{ $current->researcharea or old('researchsarea') }}">
							</div>
						</div>

            <div class="form-group">
              <label class="col-md-4 control-label">Address</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="address" value="{{ $current->address or old('address') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Date of Birth</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="date_of_birth" value="{{ $current->date_of_birth or old('date_of_birth') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Phone Number</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="phone" value="{{ $current->phone or old('phone') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">MSRIT Email</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="msritemail" value="{{ $current->msritemail or old('msritemail') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Gender</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="gender" value="{{ $current->gender or old('gender') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Website</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="website" value="{{ $current->website or old('website') }}">
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-4 control-label">Date of Joining</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="date_of_joining" value="{{ $current->date_of_joining or old('date_of_joining') }}">
              </div>
            </div>

						<div class="form-group">
							<label class="col-md-4 control-label">Upload New Profile Image*</label>
							<div class="col-md-6">
								<input id="imageFile" accept="image/*" type="file" name="photo">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit Details
								</button>
							</div>
						</div>
						<p>* Uploading new image is optional, ensure file size is less than 100 KB</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
