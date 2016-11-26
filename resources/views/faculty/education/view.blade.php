<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            Educational Qualification
            @if(Auth::user()->isFaculty())
                <a href="{{url('/faculty/education/add')}}" class="btn btn-info">Add</a>
            @endif
        </div>
            <ul class="list-group">
                @foreach($education as $item)
                    <li class="list-group-item panel-body">
                        <table class="col-lg-4 table-striped table-padding">
                                <tr><td>Degree</td><td>{{{$item->degree}}}</td></tr>
                                <tr><td>Year of Graduation</td><td>{{{$item->year}}}</td></tr>
                                <tr><td>University</td><td>{{{$item->university}}}</td></tr>
                                <tr><td>Discipline</td><td>{{{$item->disciplini}}}</td></tr>
                                 @if(Auth::user()->isFaculty())
                                    <tr>
                                        <td><a href="{{ url('/faculty/education/edit/'.$item->id)}}">Edit</a></td>
                                        <td><a href="{{ url('/faculty/education/delete/'.$item->id)}}">Delete</a></td>
                                    </tr>
                                @endif
                        </table>
                    </li>
                @endforeach
            </ul>
    </div>
</div>
