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
				    Confirm Deletion of  {{$page->title}} Page
				</div>
				<div class="panel-body">
					<p id="jserror" class="alert alert-danger">You cannot undo this action!</p>
					<form class="form-horizontal" role="form"  method="POST" action="{{ url('/department/delete-page') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="slug" value="{{$page->slug}}">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							 <p>Are you sure you want to delete {{$page->title}} Page?</p>
								<button type="submit" class="btn btn-primary">
								    Yes, Delete Page!
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
