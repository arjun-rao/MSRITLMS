@extends('app',['pagetitle'=>$course->title.' | Confirm Deletion'])

@section('content')
<div class="container-fluid">
	<div class="row">
	    <div class="col-md-2">
	    @include('courses.links',['course'=>$link->course])
	    </div>
		<div class="col-md-8">
			<div class="panel panel-info">
				<div class="panel-heading">
				    Confirm Deletion of link to {{$link->title}}
				</div>
				<div class="panel-body">
					<p id="jserror" class="alert alert-danger">You cannot undo this action!</p>
					<form class="form-horizontal" role="form"  method="POST" action="{{ url('/courses/'.$link->course->course_code.'/links/delete') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="course" value="{{$link->course->course_code}}">
						<input type="hidden" name="id" value="{{$link->id}}">
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							 <p>Are you sure you want to delete link to {{$link->title}}.</p>
								<button type="submit" class="btn btn-primary">
								    Yes, Delete Link!
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
