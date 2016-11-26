<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Experience
		@if(Auth::user()->isFaculty())
				<a href="{{url('/faculty/experience/add')}}" class="btn btn-info">Add</a>
		@endif
		</div>

								<ul class="list-group">
										@foreach($experiences as $experience)
												<li class="list-group-item panel-body">
														<table class="col-lg-4 table-striped table-padding">
																		<tr><td>Organization</td><td>{{{$experience->organization}}}</td></tr>
																		<tr><td>Type</td><td>{{{$experience->type}}}</td></tr>
																		<tr><td>Role/Title</td><td>{{{$experience->role}}}</td></tr>
																		<tr><td>Description</td><td>{{{$experience->description}}}</td></tr>
																		<tr><td>Duration</td><td>{{{$experience->duration}}}</td></tr>

																		@if(Auth::user()->isFaculty)
																		<tr>
																			<td><a href="{{ url('/faculty/industry/edit'.$industry->id)}}">Edit</a></td>
																			<td><a href="{{ url('/faculty/industry/edit'.$industry->id)}}">Delete</a></td>
																		</tr>
																		@endif
														</table>
												</li>
										@endforeach
								</ul>
	</div>
</div>
