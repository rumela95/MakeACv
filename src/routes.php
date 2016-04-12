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

$app->get('/dashboard', function ($request, $response, $args) {
	
	$client = new MongoDB\Client("mongodb://localhost:27017");
	$usersTable = $client->swproject->users;
	
	$user_id = new MongoDB\BSON\ObjectId($_GET['user_id']);
	$user = $usersTable->findOne(['_id'=> $user_id ]);
	$args['username'] = $user['username'];
	return $this->renderer->render($response, 'dashboard.php', $args);
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