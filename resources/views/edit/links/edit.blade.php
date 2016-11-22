@extends('app',['pagetitle'=>$course->title.' | Edit Link'])

@section('content')
<div class="container-fluid">
	<div class="row">
		 <div class="col-md-2">
            @include('courses.links',['course'=>$course])
        </div>
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
				    Edit link
				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                    {{--'title','href','parent_code', 'weight'--}}
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/courses/'.$course->course_code.'/links/edit') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="parent_code" value="{{ $link->parent_code }}">
                        <input type="hidden" name="id" value="{{$link->id}}">
						<div class="form-group">
							<label class="col-md-4 control-label">Title</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="title" value="{{ $link->title or old('title')}}">
							</div>
						</div>
						<div class="form-group">
                            <label class="col-md-4 control-label">URL/HREF</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="href" value="{{  $link->href or old('href')}}">
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Weight</label>
							<div class="col-md-6">
								<input type="integer" min="1" class="form-control" name="weight" value="{{ $link->weight or old('weight') }}">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Edit Link
								</button>
							</div>
						</div>
					</form>
					<p>All fields are mandatory.<br>
                       Heavier links are arranged lower in the menu.<br>
                       Links are not shown if weight is 0.
                    </p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
