<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Events Attended
			@if(Auth::user()->isFaculty())
				<a href="{{url('/faculty/events/add')}}" class="btn btn-info">Add</a>
			@endif
		</div>
								<ul class="list-group">
										@foreach($events as $event)
												<li class="list-group-item panel-body">
														<table class="col-lg-4 table-striped table-padding">
																		<tr><td>Title</td><td>{{{$event->title}}}</td></tr>
																		<tr><td>Type</td><td>{{{$event->type}}}</td></tr>
																		<tr><td>Organisation</td><td>{{{$event->organisation}}}</td></tr>
																		<tr><td>Location</td><td>{{{$event->location}}}</td></tr>
																		<tr><td>Duration</td><td>{{{$event->duration}}}</td></tr>
																		<tr><td>Report Link</td><td>{{{$event->report_link}}}</td></tr>
																		@if(Auth::user()->isFaculty())
																			<tr>
																				<td><a href="{{ url('/faculty/events/edit'.$event->id)}}">Edit</a></td>
																				<td><a href="{{ url('/faculty/events/edit'.$event->id)}}">Delete</a></td>
																			</tr>
																		@endif

														</table>
												</li>
										@endforeach
								</ul>
	</div>
</div>
