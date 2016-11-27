<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Funded Projects
			@if(Auth::user()->isFaculty() and $noAdd == false)
				<a href="{{url('/faculty/projectfunding/add')}}" class="btn btn-info">Add</a>
			@endif
		</div>
								<ul class="list-group">
										@foreach($projectfunding as $project)
												<li class="list-group-item panel-body">
														<table class="col-lg-4 table-striped table-padding">
																		<tr><td>Project Title</td><td>{{{$project->project_title}}}</td></tr>
																		<tr><td>Funding Agency</td><td>{{{$project->funding_agency}}}</td></tr>
																		<tr><td>Duration</td><td>{{{$project->duration}}}</td></tr>
																		<tr><td>Amount</td><td>{{{$project->amount}}}</td></tr>
																		@if(Auth::user()->isFaculty() and $noAdd == false)
																			<tr>
																				<td><a href="{{ url('/faculty/projectfunding/edit/'.$project->id)}}">Edit</a></td>
																				<td><a href="{{ url('/faculty/projectfunding/delete/'.$project->id)}}">Delete</a></td>
																			</tr>
																		@endif

														</table>
												</li>
										@endforeach
								</ul>
	</div>
</div>
