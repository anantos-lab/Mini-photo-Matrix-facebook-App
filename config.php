<?php
if(!session_id()) {
    session_start();
}
require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([

  'app_id' => '1061044940656295',   //App ID From facebook
  'app_secret' => '4b99c84f55334fcf7094992613884f74',   //App Sec From facebook
  'default_graph_version' => 'v2.7',
]);

$login_rual = 'http://rual.io/login.php'; //valid url of oAuth2.0


//session_start

if (isset($_SESSION['access_token'])) {
  $token = $_SESSION['access_token'];
}
