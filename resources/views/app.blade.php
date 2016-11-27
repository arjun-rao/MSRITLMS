<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{$pagetitle or 'MSRIT Courses!'}}</title>
    <link href="{{ url('/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<link href="{{ url('/css/styles.css')}}" rel="stylesheet">



	<!-- Fonts -->
	<link href="{{url('css/roboto.css')}}" rel='stylesheet' type='text/css'>
    <!-- linking font awesome -->
    <link href="{{url('css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	    .container{
	        width: auto;
	    }
	    ul {
	        list-style-type: none;
	    }
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span id="myspecialspan" class="icon-bar"></span>
					<span class="icon-bar"></span>					
				</button>
				<a class="navbar-brand" href="#">ISE, MSRIT</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/home') }}">Home</a></li>
					<li><a href="{{ url('/faculty') }}">Faculty</a></li>
					<li><a href="{{ url('/courses') }}">Courses</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Logged in as {{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								<li><a href="{{url('/user/')}}">Student Profile</a></li>

							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')


    <!-- Footer -->
    <div class="container">
        <div class="row">
            <div style="margin-top: 10%;" class="col-lg-12 text-center">
                <hr>
                <p>&#169; Department of Information Science and Engineering,MSRIT,Bangalore</p>
                <p> Developed by Amisha Agarwal, Anisha Mascarenhas and Arjun Rao, ISE Department, MSRIT</p>
            </div>
        </div>
    </div>


	<!-- Scripts
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
	<script src="{{url('/js/jquery.js')}}"></script>
	<script src="{{ url('/js/bootstrap.min.js')}}"></script>
</body>
</html>
