<div class="panel panel-default">
    <div class="panel-heading">Announcements</div>

    <div class="panel-body">
       <div class="announcements">
           @if(isset($announcements) && count($announcements)>0)
               @foreach($announcements as $announcement)
                    @if($announcement->isVisible())
                        <p class="alert-info">{{$announcement->content}}</p>
                    @endif
               @endforeach
           @else
              <p> None at the moment.</p>
           @endif
       </div>
       @if(isset($crud) && Auth::user()->isFaculty())
       <hr>
       <ul class="list-group">
           <li class="list-group-item"><a href="{{url($crud)}}">Manage Announcements</a></li>
      </ul>
       @endif
    </div>
</div>