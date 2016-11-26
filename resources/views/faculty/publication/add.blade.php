@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Add a New Publication
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
					<form class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/publication/add') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            	<input type="hidden" name="faculty_id" value="{{ Auth::user()->username }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Article Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="article_title" value="{{ old('article_title') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Domain</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="domain" value="{{ old('domain') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Type</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="type" value="{{ old('type') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Year of Publication</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="year_of_publication" value="{{ old('year_of_publication') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publication Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publication_title" value="{{ old('publication_title') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publisher</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publication Link</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publication_link" value="{{ old('publication_link') }}">
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
