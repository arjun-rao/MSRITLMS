@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				   Edit Publication
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
					<form class="form-horizontal" role="form"  enctype="multipart/form-data" method="POST" action="{{ url('/faculty/publication/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="faculty_id" value="{{ $current->faculty_id  }}">
						<input type="hidden" name="id" value="{{ $current->id }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Article Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="article_title" value="{{ $current->article_title or old('article_title') }}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Authors</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="authors" value="{{ $current->authors or old('authors') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">Domain</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="domain" value="{{ $current->domain or old('domain') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Type</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="type" value="{{ $current->type or old('type') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Year of Publication</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="year_of_publication" value="{{ $current->year_of_publication or old('year_of_publication') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publication Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publication_title" value="{{ $current->Publication_title or old('publication_title') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publisher</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publisher" value="{{ $current->publisher or old('publisher') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Publication Link</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="publication_link" value="{{ $current->publication_link or old('publication_link') }}">
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit Details
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
