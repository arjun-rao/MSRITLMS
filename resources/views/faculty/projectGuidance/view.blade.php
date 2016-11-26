<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            Project Guidance
            @if(Auth::user()->isFaculty())
                <a href="{{url('/faculty/ProjectGuidance/add')}}" class="btn btn-info">Add</a>
            @endif
        </div>
            <ul class="list-group">
                @foreach($project_guidances as $item)
                    <li class="list-group-item panel-body">
                        <table class="col-lg-4 table-striped table-padding">
                                <tr><td>Project Title</td><td>{{{$item->title}}}</td></tr>
                                <tr><td>Area</td><td>{{{$item->area}}}</td></tr>
                                <tr><td>Type</td><td>{{{$item->type}}}</td></tr>
                                <tr><td>Number of Students</td><td>{{{$item->count}}}</td></tr>
                                <tr><td>Year</td><td>{{{$item->year}}}</td></tr>
                                 @if(Auth::user()->isFaculty())
                                    <tr>
                                        <td><a href="{{ url('/faculty/ProjectGuidance/edit/'.$item->id)}}">Edit</a></td>
                                        <td><a href="{{ url('/faculty/ProjectGuidance/delete/'.$item->id)}}">Delete</a></td>
                                    </tr>
                                @endif
                        </table>
                    </li>
                @endforeach
            </ul>
    </div>
</div>
