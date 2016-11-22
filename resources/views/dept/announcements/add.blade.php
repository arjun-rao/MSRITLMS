@extends('app')

@section('content')
<div class="container-fluid" xmlns="http://www.w3.org/1999/html">
	<div class="row">
		 <div class="col-md-2">
            @include('deptlinks')
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				  Make an Announcement
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
					<form class="form-horizontal" id="uploadForm" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/department/add-announcement') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="creator" value="{{ Auth::user()->username }}">
						<div class="form-group">
							<label class="col-md-4 control-label">Content*</label>
							<div class="col-md-6">
								<textarea cols="10" rows="10" class="form-control" name="content">{{ old('content') }}</textarea>
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">Status*</label>
                            <div class="col-md-6">
                               <select class="form-control" name="status">
                                        <option value="draft" >Draft</option>
                                        <option value="published" selected>Published</option>
                               </select>
                            </div>
                        </div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Announce
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


