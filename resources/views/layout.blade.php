<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
	<title>Skyrim Crafting</title>
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Infant" rel="stylesheet">
	<link rel="stylesheet" href="/css/calculations.css">
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/Calculations.js') }}"></script>

		<!-- pass through the CSRF (cross-site request forgery) token -->
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>

<body>
	@yield('content')
</body>
</html>