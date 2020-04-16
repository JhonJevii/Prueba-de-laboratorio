<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/error.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Iniciar sesion</title>
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
		    <form class="form-inline my-2 my-lg-0">		      
		      <a href="Registrar.php" class="card-link">Registrarse</a>
		    </form>
		  </div>
	</nav><br><br>

	<div class="wrapper">
	 <div id="formContent">	
	  <h2>Iniciar sesión</h2>  	  	
	   	<div class="alert alert-light alert-dismissible fade show">
	    	<strong>Para ingresar...</strong> Debe ingrasar su datos.
	  	</div>
	  	<form action="login.php" method="post">    
		    <input type="text" class="form-control" id="usuario" placeholder="usuario" name="usuario">   
		    <input type="password" class="form-control" placeholder="Contraseña" name="Contraseña">    
		    <div class="form-group form-check">
		      <label class="form-check-label">
		        <a href="recuperar.php" class="card-link">Olvido la contraseña</a>
		      </label>
			</div>
			 <?php if(!empty($error)): ?>	      
		      <div class="mensaje">
		      	<?php echo $error; ?>
			  </div>
			    <?php endif; ?>
			<div class="loginButton">
		      <button type="submit" class="btn btn-success mt-3">Entrar</button>
		    </div>
	  	</form>	
	 </div>
	</div>
</body>
</html>