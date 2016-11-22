@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		 <div class="col-md-2">
            @include('deptlinks')
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Edit announcement
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
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/department/edit-announcement') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="creator" value="{{ Auth::user()->username }}">
                        <input type="hidden" name="id" value="{{$announcement->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Content</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="content" value="{{ $announcement->content or old('content')}}">
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
									Edit Announcement
								</button>
							</div>
						</div>
					</form>
					<p>All fields are mandatory.</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
