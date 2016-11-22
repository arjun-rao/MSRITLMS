@extends('app')

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('deptlinks')
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">Modify Pages <a href="{{url('/department/add-page')}}" class="btn btn-info">Add Page</a></div>
                <div class="panel-body">
                    <table class="table-striped table-padding table-hover table-bordered">
                        <tr class="text-center h5">
                            <td>Page Title</td>
                            <td>Status</td>
                            <td colspan="2">Manage</td>
                        </tr>
                        @foreach($pages as $page)
                         <tr>
                            <td><a href="{{ url('/department/page/'.$page->slug)}}">{{{$page->title}}}</a></td>
                            <td>{{{$page->status}}}</td>
                            @if($page->slug !='home')
                            <td>
                            @else
                            <td colspan="2" class="text-center">
                            @endif
                                <a href="{{ url('/department/edit-page/'.$page->slug)}}">Edit</a></td>
                            @if($page->slug != 'home')
                            <td><a href="{{ url('/department/delete-page/'.$page->slug)}}">Delete</a></td>
                            @endif
                         </tr>
                        @endforeach
                    </table>
                </div>
			</div>
		</div>
		<div class="col-md-5">
        			<div class="panel panel-default">
        				<div class="panel-heading">Modify Announcements <a href="{{url('/department/add-announcement')}}" class="btn btn-info">Add Announcement</a></div>
                            <ul class="list-group">
                                @foreach($announcements as $announcement)
                                    <li class="list-group-item">
                                        <table class="table-striped table-padding table-hover table-bordered">
                                                <tr><td colspan="2">Announcement</td></tr><tr><td colspan="2">{{{$announcement->content}}}</td></tr>
                                                <tr><td>By</td><td>{{{$announcement->creator}}}</td></tr>
                                                <tr><td>Status</td><td>{{{$announcement->status}}}</td></tr>
                                                <tr>
                                                    <td><a href="{{ url('/department/delete-announcement/'.$announcement->id)}}">Delete</a></td>
                                                    <td><a href="{{ url('/department/edit-announcement/'.$announcement->id)}}">Edit</a></td>
                                                </tr>
                                        </table>
                                    </li>

                                @endforeach
                            </ul>
        			</div>
        		</div>
	</div>
</div>
@endsection
