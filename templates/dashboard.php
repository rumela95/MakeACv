<html>
	<head>
		<title>Dashboard</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

		<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
			
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	</head>
	<style type="text/css">
		body {
			background-image: url("background.jpg");
		}
		.weird-font-large{
			font-size: 400%;
			color : #56cef4;
			font-family: 'Allura', cursive;
		}
		.weird-font-small{
			font-size: 200%;
			color : #56cef4;
			font-family: 'Allura', cursive;
		}
		h2 {
			text-align: center;
			font-size: 150%;
		}
		form {
			text-align: center;
		}
		.sec	{
			margin: 20px;
			text-align: center;
		}
	</style>
	<body>
		<h1 class= "weird-font-large"> Hello <?= $username ?> </h1>
	</body>

</html>
