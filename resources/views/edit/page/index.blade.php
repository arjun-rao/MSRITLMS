@extends('app',['pagetitle'=>$course->title.' | Pages'])

@section('content')
<div class="container">
	<div class="row">
	    <div class="col-md-2">
		    @include('courses.links',['course'=>$course])
		</div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Modify Pages <a href="{{url('/courses/'.$course->course_code.'/pages/add')}}" class="btn btn-info">Add</a></div>
                    <div class="panel-body">
                    <table class="table-striped table-padding table-hover table-bordered">
                        <tr class="text-center h5">
                            <td>Page Title</td>
                            <td>Status</td>
                            <td colspan="2">Manage</td>
                        </tr>
                        @foreach($pages as $page)
                            <tr>
                                    <td><a href="{{ url('/courses/'.$course->course_code.'/pages/view/'.$page->slug)}}">{{{$page->title}}}</a></td>
                                    <td>{{{$page->status}}}</td>
                                    @if($page->slug !='home')
                                        <td>
                                    @else
                                        <td colspan="2" class="text-center">
                                    @endif
                                        <a href="{{ url('/courses/'.$course->course_code.'/pages/edit/'.$page->slug)}}">Edit</a></td>
                                    @if($page->slug != 'home')
                                    <td><a href="{{ url('/courses/'.$course->course_code.'/pages/delete/'.$page->slug)}}">Delete</a></td>
                                    @endif

                            </tr>
                        @endforeach
                    </table>
                 </div>
			</div>
		</div>
	</div>
</div>
@endsection
