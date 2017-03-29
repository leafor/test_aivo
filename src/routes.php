<?php
// Routes
 
$app->get('/profile/Facebook/{id}', function ($request, $response, $args) {
 	require_once (__DIR__.'/Facebook/autoload.php');
  	require_once(__DIR__.'/Facebook/Facebook.php');
  	$id = $request->getAttribute('id');
  	$accessToken=$_SESSION['facebook_access_token'];
  	$fb = new Facebook\Facebook([
		  'app_id' => '133399547192677',
		  'app_secret' => 'aa3349f4fcb596f8ec7010513905e4a0',
		  'default_graph_version' => 'v2.8',
		  ]);
  	if ($accessToken==null){
	    //$accessToken = 'EAACEdEose0cBAIxjgFWZApeY4nr2XPK7KfSzy3Lf10SoXgrR65ca0uLmj63sHWBy7OWKMBVFGlC5Cj7CAiloIvBtYJL44uv9zPYoQ2qzAKPaecjeITbEFfGdowZAMNZBge7L5KT20NlMZBafWBePeFZC5weXtZAIybuDqRYr05BDgKyul4wAE5R7GmbIqLZBLoZD';
	    //$resp = $fb->get('/'.$id.'?fields=first_name,last_name', $accessToken);
		$helper = $fb->getRedirectLoginHelper();
		$permissions = ['user_about_me']; // optional
		
		$loginUrl = $helper->getLoginUrl('http://leandro-macbook-air.local/dashboard/01_Trabajos/test_aivo/src/fb-callback.php?id='.$id, $permissions);
		echo $loginUrl;
		//echo "<SCRIPT>window.location='".$loginUrl."';</SCRIPT>"; 
		//echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';  
		//echo file_get_contents($loginUrl);
  	}
    else{
    	$resp = $fb->get('/'.$id.'?fields=first_name,last_name', $accessToken);
  		echo $resp->getGraphUser();
    	 header('Content-type: application/json');
    echo json_encode($resp);
    }

});


?>