<?php
include('config.php');
?>




 
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


<div class="container">
<h2>Login for News</h2>
<br>
 <a class="btngoogle btn btn-primary" href="<?= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(APP_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . APP_CLIENT_ID . '&access_type=online' ?>">
 Login with Google
 </a>
</div>
</body>

</html>