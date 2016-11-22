@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-2">
	    @include('deptlinks')
	    </div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
				    Confirm Deletion of Announcement
				</div>
				<div class="panel-body">
					<p id="jserror" class="alert alert-danger">You cannot undo this action!</p>
					<p>Content: {{$announcement->content}}</p>
					<form class="form-horizontal" role="form"  method="POST" action="{{ url('/department/delete-announcement') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="id" value="{{$announcement->id}}">
						<div class="form-group">
							<div class="col-md-6">
							 <p>Are you sure you want to delete this announcement?</p>
								<button type="submit" class="btn btn-primary">
								    Yes, Delete Announcement!
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
