@extends('app',['pagetitle'=>$course->title.' | Uploads'])

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Course Uploads
				@if(Auth::user()->canEdit($course))
				    <a href="{{url('/courses/'.$course->course_code.'/uploads/add')}}" class="btn btn-info">New</a>
				@endif
				</div>
				<div class="panel-body">
				    @if(count($uploads)>0)
				    <table class = "table-striped table-padding table-hover table-bordered">
				        <tr class="text-center h5">
				            <td>File Name</td>
				            <td>File Type</td>
				            <td>File Size</td>
				            @if(Auth::user()->canEdit($course))
                            <td>Status</td>
                            <td colspan="2">Manage</td>
                            @endif
				        </tr>
				        @foreach($uploads as $upload)
				            @if(Auth::user()->canEdit($course) or $upload->status == 'published')
                            <tr>
                                <td><b><a download="{{{substr($upload->file_name,7)}}}" href="{{$upload->link}}" target="_blank">{{{substr($upload->file_name,7)}}}</a></b>
                                    <p>{{{$upload->description}}}</p>
                                </td>
                                <td>{{$upload->type}}</td>
                                <td>{{$upload->file_size}}</td>
                                @if(Auth::user()->canEdit($course))
                                <td>{{{$upload->status}}}</td>
                                <td><a href="{{ url('/courses/'.$course->course_code.'/uploads/edit/'.$upload->slug)}}">Edit</a></td>
                                <td><a href="{{ url('/courses/'.$course->course_code.'/uploads/delete/'.$upload->slug)}}">Delete</a>
                                </td>
                                @endif
                            </tr>

                            @endif
				        @endforeach
				    </table>
                    @else
                        <p class="alert alert-info">There are no uploads for this course.</p>
                    @endif
                    </div>
			</div>
		</div>
	</div>
</div>
@endsection
