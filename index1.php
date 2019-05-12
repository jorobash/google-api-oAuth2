<?php



require_once('settings.php');

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

?>
<html>
<head>....</head>

<body>
	.....
	
	<a href="<?= $login_url ?>">Login with Google</a>
		
<?php 
if(isset($_GET['code'])) {
	try {
		// Get the access token 
		$data = GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

		// Access Tokem
		$access_token = $data['access_token'];
		
		// Get user information
		$user_info = GetUserProfileInfo($access_token);
		var_dump($user_info);die;
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
?>

	.....
</body>
</html>