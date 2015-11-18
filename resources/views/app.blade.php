<!doctype html>
<html>
<head>
	<title>Welcome</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> 
	<style>
		li{
			display: inline ;
			text-decoration: none ;
			padding: 20px ;
		}
		body {
			margin: 10px;
			background-color : #E3E7E8;
		}
		.index{
			border: 1px solid white;
		}
	</style>
</head>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>

<body>
	<div>
		@yield('home')
	</div>
</body>


</html>