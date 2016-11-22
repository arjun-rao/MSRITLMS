<?php
    use App\Models\Link;

    $links = Link::where('parent_code',null)->where('href','<>','/department/page/home')->select('title','href')->get();
?>
<div class="panel panel-default">
    <div class="panel-heading">Department Pages</div>

    <div class="panel-body">
       <ul>
           <li><a href="{{{url('/faculty')}}}">Faculty</a></li>
           <li><a href="{{{url('/courses')}}}">Courses</a></li>
           @foreach($links as $link)
           <li><a href="{{{url($link->href)}}}">{{{$link->title}}}</a></li>
           @endforeach
           @if(Auth::user()->role =='hod')
              <li><a href="{{url('/department/')}}"><b>Manage Department</b></a></li>
           @endif
       </ul>

    </div>
</div>
