<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/error.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Recuperar contraseña</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor03">
		   <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#"></a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0" action="recuperarContraseña.php">   
		      <a href="Iniciar_sesion.php" class="card-link" name="email">Iniciar sesion</a>
		    </form>
		  </div>
	</nav><br><br>

<div class="wrapper">
	<div id="formContent">
	  <h2>Recuperar contraseña</h2>  
	  	
	   <div class="alert alert-light alert-dismissible fade show">
	    	<strong>Debe ingresar el correo electronico</strong>
	   </div>
	   <form action="recuperarContraseña.php" method="POST">    
	     	<input type="email" class="form-control" placeholder="Email" name="email" required>  
		    <?php if(!empty($mensaje)): ?>
		  	<div class="mensaje">
		  	<?php echo $mensaje; ?>
		  	</div>
		   	<?php endif; ?>	 
		    <button type="submit" class="btn btn-success mt-3">Enviar</button><br><br>
		    <div id="formFooter">
		     <label class="form-check-label">
			  <strong>No tiene una cuenta!..</strong><a href="Registrar.php" class="card-link">Registrese</a>
	         </label>
	        </div>
	  </form>
	</div>
</div>
</body>
</html>