@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit Project Guidance Details
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
					<form  class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/projectguidance/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="faculty_id" value="{{ Auth::user()->username }}">
						<input type="hidden" name="id" value="{{ $current->id  }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Project Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ $current->title or old('title') }}">
							</div>
						</div>
						<div class="form-group">
              <label class="col-md-4 control-label">Area</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="area" value="{{ $current->area or old('area') }}">
		          </div>
              </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="UG/PG/PHD" name="type" value="{{$current->type or  old('type') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Number of Students</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="count" value="{{$current->count or  old('count') }}">
                            </div>
                        </div>

												<div class="form-group">
                            <label class="col-md-4 control-label">Year</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="year" value="{{ $current->year or old('year') }}">
                            </div>
                        </div>


						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit details
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
