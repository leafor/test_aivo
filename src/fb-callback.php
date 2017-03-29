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
$response=null;
if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;
  header("Location: leandro-macbook-air.local/dashboard/01_Trabajos/test_aivo/public/index.php/profile/Facebook/".$_GET["id"].".php ");
}



?>