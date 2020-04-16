<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/error.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>Registro de usuario</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="#"></a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor03">
		   <ul class="navbar-nav mr-auto">
		      
		    <form class="form-inline my-2 my-lg-0">		      
		      <a href="Iniciar_sesion.php" class="card-link">Iniciar sesion</a>
		    </form>
		  </div>
	</nav><br><br>
	<div class="wrapper">
		<div id="formContent">
		  <h2>Registrar</h2>
		  <form action="guardar.php" method="POST" enctype="multipart/form-data">	  	
		    
		      <input type="text" class="form-control"  placeholder="Usuario" name="usuario" required>	   
		      <input type="text" class="form-control" placeholder="Nombre" name="nombre">  	      
		      <input type="password" class="form-control"  placeholder="Contraseña" name="contraseña">    		      
		      <input type="text" class="form-control"  placeholder="Telefono" name="telefono">    
		      <input type="text" class="form-control" placeholder="Edad" name="edad">  		      
		      <input type="email" class="form-control" placeholder="Email" name="email">
		      <label class="control-label"> <h2>Foto de perfil</h2></label><br>
		      <input type="file" name="foto" id="foto" class="filestyle" multiple>

			      <?php if(!empty($error)): ?>	      
			      	<div class="mensaje">
			      <?php echo $error; ?>
				  	</div>
				   <?php endif; ?>
			 <div class="loginButton">
		      <button type="submit" name="submit" class="btn btn-success mt-3" value="guardar">Guardar</button>
		     </div>
		  </form>
		 </div> 
		</div>

</body>
</html>