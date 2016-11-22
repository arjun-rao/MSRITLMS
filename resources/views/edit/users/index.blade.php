@extends('app')
<script>
    function ConfirmDelete(usn)
    {
      var x = confirm("Are you sure you want to delete user "+ usn +"?");
      if (x)
          return true;
      else
        return false;
    }
</script>
@section('content')
<div class="container">
	<div class="row">
	   <div class="col-md-2">
       		@include('deptlinks')
       	</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Department Students</div>
                    <ul class="list-group">
                        @foreach($users as $user)
                            <li class="list-group-item panel-body">
                                <table class="col-lg-4 table-striped table-padding">
                                        <tr><td>Student USN</td><td>{{{$user->username}}}</td></tr>
                                        <tr><td>Student Name</td><td>{{{$user->name}}}</td></tr>
                                        <tr><td>Student Email</td><td>{{{$user->email}}}</td></tr>
                                        <tr><td>Semester</td><td>{{{$user->semester}}}</td></tr>
                                        <tr>
                                            <td><a class="btn btn-primary" data-target="#edit{{$user->username}}" data-toggle="collapse">Edit Profile</a></td>
                                            <td>
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/user/delete') }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="hidden" name="usn" value="{{ $user->username }}">
                                                <button Onclick="return ConfirmDelete('{{$user->username}}');" type="submit" class="btn btn-primary">
                                                    Remove Student
                                                </button>
                                            </form>
                                            </td>
                                        </tr>
                                </table>
                                <div class="col-lg-8 collapse" id="edit{{$user->username}}">
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
                                        <input type="hidden" name="usn" value="{{ $user->username }}">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Name*</label>
                                            <div class="col-md-6">
                                                <input type="text" required class="form-control" name="name" value="{{ $user->name or old('name') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">E-Mail Address*</label>
                                            <div class="col-md-6">
                                                <input type="email" required class="form-control" name="email" value="{{ $user->email or old('email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Current Semester</label>
                                            <div class="col-md-6">
                                                <input style="width: auto;" type="number" class="form-control" name="semester" min="3" max="8" size="30" value="{{$user->semester or old('semester') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Edit User Details
                                                </button>
                                            </div>
                                        </div>
                                        <p>*fields are mandatory.</p>
                                    </form>

                                </div>
                            </li>
                        @endforeach
                    </ul>
			</div>
		</div>
	</div>
</div>
@endsection
