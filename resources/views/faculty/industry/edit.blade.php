@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit industry interaction
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
					<form class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/industry/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<input type="hidden" name="faculty_id" value="{{ $current->faculty_id }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Organization</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $current->name or old('name') }}">
							</div>
						</div>

            <div class="form-group">
							<label class="col-md-4 control-label">Description</label>
							<div class="col-md-6">
							    <textarea class="form-control" style="width:100%; height: 250px;" name="description">{{ $current->description or old('description')}}</textarea>
							</div>
						</div>

            <div class="form-group">
							<label class="col-md-4 control-label">Duration</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ $current->duration or old('duration') }}">
							</div>
						</div>

            <div class="form-group">
              <label class="col-md-4 control-label">Report Link</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="name" value="{{ $current->report_link or old('report_link') }}">
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
