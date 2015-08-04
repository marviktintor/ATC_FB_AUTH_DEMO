<?php
if(session_status()==1)session_start();
include 'facebook-sdk-v5/autoload.php';

$fb = new Facebook\Facebook([
		'app_id' => '1470813319880386',
		'app_secret' => '48963e02248069851a1c7f4efa8f9343',
		'default_graph_version' => 'v2.4',
		]);

$helper = $fb->getRedirectLoginHelper();
//$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('http://biasharamanager.com/victor/home.php');

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>