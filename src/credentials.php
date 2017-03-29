<?php

  require_once (__DIR__.'/Facebook/autoload.php');
  require_once(__DIR__.'/Facebook/Facebook.php');
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;
$url ='http://leandro-macbook-air.local/dashboard/01_Trabajos/test_aivo/src/fb-callback.php'; // ejemplo de callback

  $script_url = 'routes.php';  
  $fb_apikey = '133399547192677';  
  $fb_secret = '6d1166ff7978c3bb4680f06010f2ea17';  

?>