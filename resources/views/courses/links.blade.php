
<div class="panel panel-default">
    <div class="panel-heading">{{$course->course_code}} | Menu</div>


    <div class="list-group">
        <ul>
            <li class="list-group-item"><a href='{{{url('/courses/'.$course->course_code)}}}'>Course Home</a></li>
            @if(count($course->links)>0)
                @foreach($course->links()->where('weight','<>','0')->orderBy('weight')->get() as $link)
                    <li class="list-group-item"><a href='{{{url($link->href)}}}'>{{$link->title}}</a></li>
                @endforeach
            @endif
            <li class="list-group-item"><a href='{{{url('/courses/'.$course->course_code.'/uploads')}}}'>Course Uploads</a></li>
            <li class="list-group-item"><a href='{{{url('/courses/'.$course->course_code).'/questions'}}}'>Course Discussion</a></li>
        </ul>
        @if(Auth::user()->isFaculty())
            <p class="text-center"><a href="{{url('/courses/'.$course->course_code.'/links')}}">Modify Links</a></p>
        @endif
    </div>
</div>
