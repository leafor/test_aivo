<?php
// Routes
 
$app->get('/profile/Facebook/{id}', function ($request, $response, $args) {
 	require_once (__DIR__.'/Facebook/autoload.php');
  	require_once(__DIR__.'/Facebook/Facebook.php');

    $fb = new Facebook\Facebook([
	  'app_id' => '133399547192677',
	  'app_secret' => '6d1166ff7978c3bb4680f06010f2ea17',
	  'default_graph_version' => 'v2.8',
	  ]);

	$helper = $fb->getRedirectLoginHelper();
	$permissions = ['user_about_me']; // optional
	$id = $request->getAttribute('id');
	$loginUrl = $helper->getLoginUrl('http://leandro-macbook-air.local/dashboard/01_Trabajos/test_aivo/src/fb-callback.php?id='.$id, $permissions);
	echo "<SCRIPT>window.location='".$loginUrl."';</SCRIPT>"; 
	//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';  
	//echo file_get_contents($loginUrl);








    header('Content-type: application/json');
    echo json_encode('');
 
});


?>