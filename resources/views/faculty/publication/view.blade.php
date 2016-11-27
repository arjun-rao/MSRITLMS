<div class="col-md-8">
	<div class="panel panel-default">
		<div class="panel-heading">Publications
		@if(Auth::user()->isFaculty() and $noAdd == false)
				<a href="{{url('/faculty/publication/add')}}" class="btn btn-info">Add</a>
		@endif
		</div>

            <ul class="list-group">
                    @foreach($publications as $publication)
                            <li class="list-group-item panel-body">
                                    <table class="col-lg-4 table-striped table-padding">
                                                    <tr><td>Article Title</td><td>{{{$publication->article_title}}}</td></tr>
                                                    <tr><td>Domain</td><td>{{{$publication->domain}}}</td></tr>
                                                    <tr><td>Type</td><td>{{{$publication->type}}}</td></tr>
                                                    <tr><td>Year of Publication</td><td>{{{$publication->year_of_publication}}}</td></tr>
                                                    <tr><td>Publication Title</td><td>{{{$publication->publication_title}}}</td></tr>
                                                    <tr><td>Publisher</td><td>{{{$publication->publisher}}}</td></tr>
                                                    <tr><td>Link to Publication</td><td><a href="{{{$publication->publication_link}}}">View</a></td></tr>
                                                    @if(Auth::user()->isFaculty() and $noAdd == false)
                                                        <tr>
                                                            <td><a href="{{ url('/faculty/publication/edit/'.$publication->id)}}">Edit</a></td>
                                                            <td><a href="{{ url('/faculty/publication/delete/'.$publication->id)}}">Delete</a></td>
                                                        </tr>
                                                    @endif
                                    </table>
                            </li>
                    @endforeach
            </ul>
	</div>
</div>
