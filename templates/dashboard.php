<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
			
		
	</head>
	<style type="text/css">
		body {
			
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
		h2,h1 {
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
		.container {
			font-size: 200%;
			color : #56cef4;
			font-family: 'Allura', cursive;
			text-align: center;
		}
		h3 {
			font-size:
		}
	</style>
	<body>
		<h1 class= "weird-font-large"><?= $username ?>'s Dashboard</h1>
		<div class="container">
			<ul class="nav nav-tabs nav-justified">
				<li class="active"><a data-toggle="tab" href="#cv">CV Options</a></li>
				<li><a data-toggle="tab" href="#personal">Personal Details</a></li>
				<li><a data-toggle="tab" href="#work">Work Experience</a></li>
				<li><a data-toggle="tab" href="#education">Educational Details</a></li>
			 </ul>

			<div class="tab-content">
				<div id="cv" class="tab-pane fade in active">
					<h2>CV Options</h2>
					
				</div>
				<div id="personal" class="tab-pane fade">
					<h2>Personal Details</h2>
					
				</div>
				<div id="work" class="tab-pane fade">
					<h2>Work Experience</h2>
					
				</div>
				<div id="education" class="tab-pane fade">
					<h2>Educational Details</h2>
					
				</div>
			</div>
		</div>
	</body>

</html>