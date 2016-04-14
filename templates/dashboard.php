<html>
	<head>
		<title>Dashboard</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">

		<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet' type='text/css'>
			
		
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
		.sec {
			padding: 50px 50px;
		}
		button {
			text-align: left;
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
		.collapse {
			padding : 20px 20px;
		}
        .dropbtn {
            background-color: #f9f9f9;
            color: white;
            font-size: 30px;
            padding: 12px 16px;
            border: none;
            float: left;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            float: left;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            float:left;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            width: 200px;
            text-decoration: none;
            display: block;
            
        }

        .dropdown-content a:hover {
            background-color: #56cef4 
        }

        .dropdown:hover .dropdown-content {
            display: block;
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
				<div id="cv" class="tab-pane fade in active" >
                    <h2>CV Options</h2>
                    <div id= "choice" class = "dropdown dropbtn btn"><a>Select Template</a>
                        <div class="dropdown-content" style="left = 0" >
                            <a href="?choice=1">CV</a>
                            <a href="?choice=2" >Resume</a>
                            <a href="?choice=3">Bio-data</a>
                            
                        </div>
                    
                    </div>
                    <div id="choice">
                    <?php 
                        switch($_GET['choice']){
                            case 1: include 'cv.php'; break;
                            case 2: include 'resume.php'; break;
                            case 3: include 'biodata.php'; break;
                            default:
                                    
                        }
                    ?>
                    </div>
				</div>
				<div id="personal" class="tab-pane fade">
					<h2>Personal Details</h2>
					<div class='sec'>
						<button class= 'btn btn-primary btn-lg' data-toggle="collapse" data-target="#new_personal"><i class="fa fa-plus"></i>Add</button>
						<div id="new_personal" class="collapse">
							<form role="form" method="POST" action="/addPersonal">
								<div class = "form-group" style = "display : none ">
									<input type="text" name="user_id" id ="user_id" value = "<?= $user_id ?>"></input>
								</div>
								
								<div class = "form-group">
									<label for="name" class="weird-font-small"> Name </label>
									<input type="text" name="name" id ="name"></input>
								</div>
								<div class = "form-group">
									<label for="phone" class="weird-font-small"> Phone </label>
									<input type="text" name="phone" id="phone"></input>
								</div>
								<div class = "form-group">
									<label for="email" class="weird-font-small"> Email</label>
									<input type="text" name="email" id ="email"></input>
								</div>
								<div class = "form-group">
									<label for="dob" class="weird-font-small"> Date of Birth</label>
									<input type="text" name="dob" id ="dob"></input>
								</div>
								<div class = "form-group">
									<label class="weird-font-small" style = "display : block"> Address </label>
									<textarea rows="4" cols="50" name="address" id="address"></textarea>
								</div>
								<div class = "form-group">
									<label class="weird-font-small" style = "display : block"> Achievements </label>
									<textarea rows="4" cols="50" name="achievements" id="achievements"></textarea>
								</div>
								<input type="submit" class ="btn btn-primary btn-lg" value="Add"></input>
							</form>
						</div>
					</div>
				</div>
				<div id="work" class="tab-pane fade">
					<h2>Work Experience</h2>
					<div class='sec'>
						<button class= 'btn btn-primary btn-lg' data-toggle="collapse" data-target="#new_work"><i class="fa fa-plus"></i>Add New</button>
						<div id="new_work" class="collapse">
							<form role="form" method="POST" action="/addWork">
								<div class = "form-group" style = "display : none ">
									<input type="text" name="user_id" id ="user_id" value = "<?= $user_id ?>"></input>
								</div>
								
								<div class = "form-group">
									<label for="organisation" class="weird-font-small"> Organisation </label>
									<input type="text" name="organisation" id ="organisation"></input>
								</div>
								<div class = "form-group">
									<label for="position" class="weird-font-small"> Position </label>
									<input type="text" name="position" id="position"></input>
								</div>
								<div class = "form-group">
									<label for="duration" class="weird-font-small"> Duration (in months)</label>
									<input type="text" name="duration" id ="duration"></input>
								</div>
								<div class = "form-group">
									<label class="weird-font-small" style = "display : block"> Details </label>
									<textarea rows="4" cols="50" name="details" id="details"></textarea>
								</div>
								<div class = "form-group">
									<label class="weird-font-small" style = "display : block"> Achievements </label>
									<textarea rows="4" cols="50" name="achievements" id="achievements"></textarea>
								</div>
								<input type="submit" class ="btn btn-primary btn-lg" value="Add"></input>
							</form>
						</div>
					</div>
				</div>
				<div id="education" class="tab-pane fade">
					<h2>Educational Details</h2>
					<div class='sec'>
						<button class= 'btn btn-primary btn-lg' data-toggle="collapse" data-target="#new_education"><i class="fa fa-plus"></i>Add New</button>
						<div id="new_education" class="collapse">
							<form role="form" method="POST" action="/addEducation">
								<div class = "form-group" style = "display : none ">
									<input type="text" name="user_id" id ="user_id" value = "<?= $user_id ?>"></input>
								</div>
								
								<div class = "form-group">
									<label for="degree" class="weird-font-small"> Degree </label>
									<input type="text" name="degree" id ="degree"></input>
								</div>
								<div class = "form-group">
									<label for="institution" class="weird-font-small"> Institution </label>
									<input type="text" name="institution" id="institution"></input>
								</div>
								<div class = "form-group">
									<label for="percentage" class="weird-font-small"> Percentage of Marks </label>
									<input type="text" name="percentage" id ="percentage"></input>
								</div>
								<div class = "form-group">
									<label for="end_year" class="weird-font-small"> End Year </label>
									<input type="text" name="end_year" id ="end_year"></input>
								</div>
								<div class = "form-group">
									<label class="weird-font-small" style = "display : block"> Achievements </label>
									<textarea rows="4" cols="50" name="achievements" id="achievements"></textarea>
								</div>
								<input type="submit" class ="btn btn-primary btn-lg" value="Add"></input>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>