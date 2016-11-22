@extends('app',['pagetitle'=>$course->title.' | Links'])

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Modify Links <a href="{{url('/courses/'.$course->course_code.'/links/add')}}" class="btn btn-info">Add</a></div>
                    @if(count($links)>0)
                    <ul class="list-group">
                        @foreach($links as $link)
                            <li class="list-group-item">
                                <table class="table-striped table-padding table-hover table-bordered">
                                        <tr><td>Link Title</td><td>{{{$link->title}}}</td></tr>
                                        <tr><td>Link Url</td><td>{{{$link->href}}}</td></tr>
                                        <tr><td>Weight</td><td>{{{$link->weight}}}</td></tr>
                                        <tr>
                                            <td><a href="{{ url('/courses/'.$link->course->course_code.'/links/edit/'.$link->id)}}">Edit</a></td>
                                            <td><a href="{{ url('/courses/'.$link->course->course_code.'/links/delete/'.$link->id)}}">Delete</a></td>
                                        </tr>
                                </table>
                            </li>
                        @endforeach

                    </ul>
                     @else
                    <div class="panel-body">
                        <p class="alert alert-info">There are no additional links created for this course.</p>
                    </div>
                    @endif
			</div>
		</div>
	</div>
</div>
@endsection
