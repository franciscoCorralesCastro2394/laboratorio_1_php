<?php


include('config.php');
// Getting access token
	function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
		$url = 'https://accounts.google.com/o/oauth2/token';			
		
		$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to receieve access token');
			
		return $data;
	} 
// Getting user profile information
	function GetUserProfileInfo($access_token) {	
		$url = 'https://www.googleapis.com/plus/v1/people/me';			
		
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get user information');
			
		return $data;
	}
	// Google will retun the code parameter after verification 
	if(isset($_GET['code'])) {
	try {
		
		
		// Get the access token 
		$data = GetAccessToken(APP_CLIENT_ID, APP_CLIENT_REDIRECT_URL, APP_CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$userinfo = GetUserProfileInfo($data['access_token']);

		//echo $userinfo['displayName'];
        //echo $userinfo['image']['url'];
		
		//echo '<img src="'.$userinfo['image']['url'].'">'; 
        
		//echo '';print_r($userinfo); echo '';
		
		//echo $userinfo['emails'][0]['value'];
		
        echo ' <html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="'.$userinfo['image']['url'].'" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">'.$userinfo['displayName'].'</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <p class="card-text"><small class="text-muted">'.$userinfo['emails'][0]['value'].'</small></p>
		<button type="button" class="btn btn-outline-warning">Terminar Sesión</button>
      </div>
    </div>
  </div>
</div>

</body>

</html>';
		
		// Here yoiu can see all user detail 
		//echo '';print_r($userinfo); echo '';

		// Now that the user is logged in you may want to start some session variables
		$_SESSION['logged_in'] = 1;

	}
	catch(Exception $e) {
		echo $e->getMessage();
	}
}

?>