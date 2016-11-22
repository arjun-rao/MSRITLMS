@extends('app')

@section('content')
<div class="container">
	<div class="row">
		@include('faculty.links')
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">Faculty Profile</div>
                    <ul class="list-group">
                        <li class="list-group-item panel-body">
                        <div class="col-md-2 profilepic" style="background-image: url({{{$instructor->imageurl}}});"></div></a>
                        <div class="col-md-10">
                            <table class="table-striped table-padding">
                                <style>
                                    .table-padding td{
                                        padding: 3px 8px;
                                    }
                                </style>
                                    <tr><td>Faculty Name</td><td>{{{$instructor->name}}}</td></tr>
                                    <tr><td>Faculty Email</td><td>{{{$instructor->email}}}</td></tr>
                                    <tr><td>Designation</td><td>{{{$instructor->designation}}}</td></tr>
                                    <tr><td>Qualifications</td><td>{{{$instructor->qualification}}}</td></tr>
                                    <tr><td>Research Areas</td><td>{{{$instructor->researcharea}}}</td></tr>
                            </table>
                        </div>
                        </li>
                    </ul>
			</div>
		</div>
		<div class="col-md-2 text-center">
           @if(isset($courses))
           <div class="panel panel-default">
               <div class="panel-heading">Courses Taught By {{{$instructor->name}}}</div>

               <div class="panel-body">
                  @if(count($courses)>0)
                        <ul class="list-group">
                           @foreach($courses as $course)
                               <li class="list-group-item"><a href="{{url('/courses/'.$course)}}">{{{$course}}}</a></li>
                           @endforeach
                       </ul>
                  @else
                       <p>None at the moment</p>
                  @endif

               </div>
           </div>
           @endif
        </div>
	</div>
</div>
@endsection
