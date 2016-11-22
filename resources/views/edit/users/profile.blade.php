@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2">
		    @include('deptlinks')
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Student Profile</div>
                    <div class="panel-body">
                        <table class="table-striped table-padding">
                                <tr><td>Student USN</td><td>{{{$user->username}}}</td></tr>
                                <tr><td>Student Name</td><td>{{{$user->name}}}</td></tr>
                                <tr><td>Student Email</td><td>{{{$user->email}}}</td></tr>
                                <tr><td>Semester</td><td>{{{$user->semester}}}</td></tr>
                        </table>
                    </div>
			</div>
			<div class="panel panel-default">
			    <div class="panel-heading"><a class="btn btn-primary" data-target="#editprofile" data-toggle="collapse">Edit Profile</a></div>
			    @if (count($errors) > 0)
			    <div class="panel-body collapse in" id="editprofile">
			    @else
			    <div class="panel-body collapse" id="editprofile">@endif
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/edit') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" required class="form-control" name="name" value="{{ $user->name or old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" required class="form-control" name="email" value="{{ $user->email or old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit
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
