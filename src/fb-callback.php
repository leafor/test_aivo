 <?php  
session_start();
  require_once('credentials.php');


  $fb = new Facebook\Facebook([
  'app_id' => $fb_apikey,
  'app_secret' => $fb_secret,
  'default_graph_version' => 'v2.8',
]); 

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  $response = $fb->get('/'.$_GET["id"].'?fields=first_name,last_name', $accessToken);
  echo $response->getGraphUser();
  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']
  //$jsonFb = file_get_contents("https://graph.facebook.com/".$_GET["id"]."?access_token=".(string)$accessToken);
 //header('Content-type: application/json');
   // echo ($jsonFb);
}


?>