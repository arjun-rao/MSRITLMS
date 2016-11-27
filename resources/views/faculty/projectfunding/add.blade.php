@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Add a New Project Funding
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
					<form class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/projectfunding/add/') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="faculty_id" value="{{ Auth::user()->username }}">


						<div class="form-group">
							<label class="col-md-4 control-label">Project Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="project_title" value="{{ old('project_title') }}">
							</div>
						</div>

            <div class="form-group">
							<label class="col-md-4 control-label">Funding Agency</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="funding_agency" value="{{ old('funding_agency') }}">
							</div>
						</div>

            <div class="form-group">
							<label class="col-md-4 control-label">Duration</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="duration" value="{{ old('duration') }}">
							</div>
						</div>

            <div class="form-group">
							<label class="col-md-4 control-label">Amount</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="amount" value="{{ old('amount') }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit
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
