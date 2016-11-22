@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
	    @include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Confirm Deletion of user - {{$user}}
				</div>
				<div class="panel-body">
					<p id="jserror" class="alert alert-danger">You cannot undo this action!</p>
					<form class="form-horizontal" role="form"  method="POST" action="{{ url('/faculty/delete') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="username" value="{{$user}}">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							 <p>Are you sure you want to delete user {{$user}}, and all associated data?</p>
								<button type="submit" class="btn btn-primary">
								    Yes, Delete User!
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
