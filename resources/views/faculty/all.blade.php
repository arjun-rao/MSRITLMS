@extends('app')

<script src="{{url('/js/tsorter.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    function init()
    {
        var sorter1 = tsorter.create('publications_table');
        var sorter2 = tsorter.create('fundedprojects_table');
    }

    window.onload = init;
</script>

<style>
    /* Up and Down Arrows */
    .sortable th.descend:after{
        content: "\25B2";
        }
    .sortable th.ascend:after{
        content: "\25BC";
        }
</style>

@section('content')
<div class="container">
	<div class="row">
		@include('faculty.links')
		<div class="col-md-8">
        	<div class="panel panel-default">
        		<div class="panel-heading">Publications</div>
                    <table id="publications_table" class="table table-striped table-hover sortable">
                        <thead class="thead-default">
                            <tr class="text-center h5">
                                <th>Article Title</th>
                                <th>Authors</th>
                                <th>Domain</th>
                                <th>Type</th>
                                <th>Year of Publication</th>
                                <th>Publication Title</th>
                                <th>Publisher</th>
                                <th>Link to Publication</th>
                            </tr>
                        </thead>
                        @foreach($publications as $publication)
                            <tr>
                                <td>{{{$publication->article_title}}}</td>
                                <td>{{{$publication->authors}}}</td>
                                <td>{{{$publication->domain}}}</td>
                                <td>{{{$publication->type}}}</td>
                                <td>{{{$publication->year_of_publication}}}</td>
                                <td>{{{$publication->publication_title}}}</td>
                                <td>{{{$publication->publisher}}}</td>
                                <td><a href="{{{$publication->publication_link}}}">View</a></td>
                            </tr>
                        @endforeach
                    </table>
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
        <div class="col-md-12"></div>
        <div class="col-md-2"></div>
        <div class="col-md-8">
        	<div class="panel panel-default">
        		<div class="panel-heading">Funded Projects</div>
               <table id="fundedprojects_table" class="table table-striped table-hover sortable">
                  <thead class="thead-inverse">
                   <tr class="text-center h5">
                       <th>Project Title</th>
                       <th>Funding Agency</th>
                       <th>Duration</th>
                       <th>Amount</th>
                   </tr>
                   </thead>
                   @foreach($projectfunding as $project)
                       <tr>
                           <td>{{{$project->project_title}}}</td>
                           <td>{{{$project->funding_agency}}}</td>
                           <td>{{{$project->duration}}}</td>
                           <td>{{{$project->amount}}}</td>
                       </tr>
                   @endforeach
               </table>
        	</div>
        </div>

	</div>
</div>
@endsection
