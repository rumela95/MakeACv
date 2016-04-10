<?php
// Routes


$app->get('/', function ($request, $response, $args) {
	return $this->renderer->render($response, 'login.php', $args);
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