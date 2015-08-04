<?php
if(session_status()==1)session_start();
include 'facebook-sdk-v5/autoload.php';

$fb = new Facebook\Facebook([
		'app_id' => '1470813319880386',
		'app_secret' => '48963e02248069851a1c7f4efa8f9343',
		'default_graph_version' => 'v2.4',
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

	// Now you can redirect to another page and use the
	// access token from $_SESSION['facebook_access_token']
}
?>