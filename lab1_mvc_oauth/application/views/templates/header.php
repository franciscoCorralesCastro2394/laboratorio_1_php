<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>

	 <nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="<?php echo site_url('news'); ?>">
		    <img src="https://www.crearlogogratisonline.com/images/crearlogogratis_1024x1024_01.png" width="30" height="30" class="d-inline-block align-top" alt="">
		    CRUD noticias
		  </a>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link"  href="<?php echo site_url('news'); ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="<?php echo site_url('news/create'); ?>">Agregar</a>
      </li>
       <li class="nav-item">
         <a class="nav-link" href=""><?php echo $this->session->has_userdata('displayName'); ?></a>
      </li>
    </ul>
  </div>
   <a class="btn btn-outline-success my-2 my-sm-0"> Cerra Sesiòn</a>
</nav>
		
