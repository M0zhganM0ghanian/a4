<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Password Generatore')
  </title>

	<meta charset='utf-8'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="/css/masterLayout.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="/"><span class="glyphicon glyphicon-home"></span></a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="signup">Sign Up</a></li>
					<li><a href="generate">Generate Password</a></li>
					<li><a href="help">Help</a></li>
				</ul>
			</div>
		</nav>
	</header>

	<section>
		<div class="container-fluid text-center">
		  <div class="row content">
		    <div class="col-sm-2 sidenav">
		      <p><a href="strong" class="list-group-item">Make strong password</a></p>
		      <p><a href="safe" class="list-group-item">Keep password safe</a></p>
		      <p><a href="https://www.dashlane.com/" class="list-group-item">Remember easily</a></p>
		    </div>
		    <div class="col-sm-8 text-left">
					@yield('headSec')
		      @yield('content')
		    </div>
		  </div>
		</div>
	</section>

	<footer class="container-fluid text-center">
		&copy; {{ date('Y') }}
	</footer>

    @stack('body')

</body>
</html>
