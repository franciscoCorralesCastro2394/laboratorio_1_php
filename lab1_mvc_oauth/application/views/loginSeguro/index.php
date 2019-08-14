



 
<html>

<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-image: url(https://png.pngtree.com/thumb_back/fw800/background/20190221/ourmid/pngtree-colorful-texture-gradient-metal-image_19141.jpg); background-size: 100%;">


<br>
<br>


<div class="container-fluid">
   <div class="container for-about">
  <div class="container">
<h2>Login with GOOGLE for News</h2>
<br>
 <a class="btn btn-primary btn-lg btn-block" href="<?= 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(APP_CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . APP_CLIENT_ID . '&access_type=online' ?>">
 Login with Google
 </a>
</div>

<br>
<br>
<div class="container">
<h2>Login with FACEBOOK for News</h2>
<br>
  
 <?php
  echo '<a class="btn btn-primary btn-lg btn-block" href="' . 'https://www.facebook.com/v4.0/dialog/oauth?' . '&redirect_uri=' . APP_CLIENT_REDIRECT_URL_FB . '&client_id=' . APP_CLIENT_ID_FB . '" role="button">Log in with FaceBook <i class="fa fa-facebook"></i></a>';
 ?>
 Login with FaceBook

</div>
   </div>
</div>


</body>

</html>