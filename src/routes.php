<?php
// Routes
$app->get('/', function ($request, $response, $args) {
	return $this->renderer->render($response, 'login.php', $args);
});

$app->post('/login', function ($request, $response, $args) {
	
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$usersTable = $client->swproject->users;
	$user = $usersTable->findOne(['username' => $_POST['username'], 'password' => $_POST['password']]);
	if(is_null($user))
	{
		$args['message']= "Invalid Credentials";
		return $response->withRedirect('/?'.http_build_query($args));
	}
	else
	{
		$args['user_id'] = (string) $user['_id'];
		return $response->withRedirect('/dashboard?'.http_build_query($args));
	}
});

$app->get('/registration', function ($request, $response, $args) {
	
	return $this->renderer->render($response, 'register.php', $args);
});


$app->post('/register', function ($request, $response, $args) {
	
	$client = new MongoDB\Client("mongodb://localhost:27017");
    if($_POST['newPassword'] != $_POST['confPassword'])
    {  
        $args['message'] = "Passwords do not match!";
        return $response->withRedirect('/registration?'.http_build_query($args));

    }
	$usersTable = $client->swproject->users;
	$user = $usersTable->findOne(['username' => $_POST['newUsername']]);
	if(is_null($user))
	{
		$usersTable->insertOne(['username'=> $_POST['newUsername'], 'password'=> $_POST['newPassword']]);
        return $response->withRedirect('/?'.http_build_query($args));
	}
	else
	{
		$args['message']= "User already exists";
		return $response->withRedirect('/registration?'.http_build_query($args));
	}
});

$app->get('/dashboard', function ($request, $response, $args) {
	
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$usersTable = $client->swproject->users;
	
	$user_id = new MongoDB\BSON\ObjectId($_GET['user_id']);
	$user = $usersTable->findOne(['_id'=> $user_id ]);
	$args['username'] = $user['username'];
	$args['user_id'] = $_GET['user_id'];
	return $this->renderer->render($response, 'dashboard.php', $args);
});

$app->post('/addWork', function ($request, $response, $args) {
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$workTable = $client->swproject->work;
	$workTable->insertOne(['user_id' => $_POST['user_id'], 
						'organisation' => $_POST['organisation'], 
						'position' => $_POST['position'], 
						'duration' => $_POST['duration'],
						'details' => $_POST['details'],
						'achievements' => $_POST['achievements']
					]);
	return $response->withRedirect('/dashboard?user_id=' . $_POST['user_id']);
});

$app->post('/addPersonal', function ($request, $response, $args) {
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$personalTable = $client->swproject->personal;
	$personalTable->insertOne(['user_id' => $_POST['user_id'], 
						'name' => $_POST['name'], 
						'phone' => $_POST['phone'], 
						'dob' => $_POST['dob'],
						'email' => $_POST['email'],
						'address' => $_POST['address'],
						'achievements' => $_POST['achievements']
					]);
	return $response->withRedirect('/dashboard?user_id=' . $_POST['user_id']);
});

$app->post('/addEducation', function ($request, $response, $args) {
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$personalTable = $client->swproject->education;
	$personalTable->insertOne(['user_id' => $_POST['user_id'], 
						'degree' => $_POST['degree'], 
						'institution' => $_POST['institution'], 
						'percentage' => $_POST['percentage'],
						'end_year' => $_POST['end_year'],
						'achievements' => $_POST['achievements']
					]);
	return $response->withRedirect('/dashboard?user_id=' . $_POST['user_id']);
});

$app->get('/get_users', function ($request, $response, $args) {
    
	$client = new MongoDB\Client("mongodb://localhost:27017");
	//dbName = swproject, collectionName = users
	$usersTable = $client->swproject->users; 
	//find() accepts an associative array, which when blank, returns all documents in the collection
	$users = $usersTable->find([]);
	//adding the results retrived from mongo to the args array
	$args['users'] = $users;
	
	return $this->renderer->render($response, 'users.php', $args);
});
//pass in the filename of the file to be captured in the url, eg. 
// /capture?filename=login 
// will generate the pdf of login.php located in the templates folders
$app->get('/capture', function ($request, $response, $args) {
	$filename = $request->getParam('filename');
	$capture = new \CV\Capture\Capture;
	$capture->load($filename . '.php');
});