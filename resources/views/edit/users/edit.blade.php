@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		@if(Auth::check() && Auth::user()->role != 'student')
		    @include('faculty.links')
		@endif
		<div class="col-md-8 <?php if(Auth::guest()) echo 'col-md-offset-2';?>">
			<div class="panel panel-default">
				<div class="panel-heading">
				    @if (Auth::guest())
				        Student Registration
				    @elseif(Auth::check() && Auth::user()->role == 'hod')
				        Faculty Registration
				    @endif
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

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>

						<div class="form-group">
						    @if(Auth::guest())
						    <label class="col-md-4 control-label">User ID (USN no.)</label>
						    @else
                            <label class="col-md-4 control-label">User ID</label>
                            @endif
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                            </div>
                        </div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>
						@if(Auth::guest())
						<div class="form-group">
                            <label class="col-md-4 control-label">Current Semester</label>
                            <div class="col-md-6">
                                <input style="width: auto;" type="number" class="form-control" name="semester" min="3" max="8" size="30" value="{{ old('semester') }}">
                            </div>
                        </div>
                        @endif

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
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
