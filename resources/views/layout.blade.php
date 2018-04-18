<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
	<link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon">
	<title>Skyrim Crafting</title>
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
	<link rel="stylesheet" href="/css/skateboard.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="{{ URL::asset('js/Calculations.js') }}"></script>

		<!-- pass through the CSRF (cross-site request forgery) token -->
		<meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>

<body>
	@yield('content')
</body>
</html>