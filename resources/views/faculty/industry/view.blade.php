<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Industry Interaction
		@if(Auth::user()->isFaculty() and $noAdd == false)
				<a href="{{url('/faculty/industry/add')}}" class="btn btn-info">Add</a>
		@endif
		</div>
            <ul class="list-group">
                    @foreach($industries as $industry)
                            <li class="list-group-item panel-body">
                                    <table class="col-lg-4 table-striped table-padding">
                                                    <tr><td>Organization</td><td>{{{$industry->organization}}}</td></tr>
                                                    <tr><td>Description</td><td>{{{$industry->description}}}</td></tr>
                                                    <tr><td>Duration</td><td>{{{$industry->duration}}}</td></tr>
                                                    <tr><td>Link to Report</td><td><a href="{{{$industry->report_link}}}">View</a></td></tr>
                                                    @if(Auth::user()->isFaculty()  and $noAdd == false)
                                                    <tr>
                                                        <td><a href="{{ url('/faculty/industry/edit/'.$industry->id)}}">Edit</a></td>
                                                        <td><a href="{{ url('/faculty/industry/delete/'.$industry->id)}}">Delete</a></td>
                                                    </tr>
                                                    @endif
                                    </table>
                            </li>
                    @endforeach
            </ul>
	</div>
</div>
