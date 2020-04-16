<?php session_start();

if (!isset($_SESSION['idUsuario'])){
	header('Location: Iniciar_sesion.php');
}

require 'conexion.php';

	//algoritmo pra verificar el usuario logueado y consultar sus datos
	if (isset($_SESSION['idUsuario'])){
		$consulta = $conn->prepare("SELECT idUsuario, Usuario, Nombre, Contraseña, Telefono, Edad, Email, imagen, fecha_creacion FROM usuario WHERE idUsuario=:id");
		$consulta->bindParam(':id', $_SESSION['idUsuario']);		
		$consulta->execute();
		$resultados = $consulta->fetch(PDO::FETCH_ASSOC);
		
		$usuario = null;

		if (count($resultados) > 0){
			$usuario = $resultados;
		}else{
			header("Location: Iniciar_sesion.php");
		}
	}else{
		require "Iniciar_sesion.php";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Principal</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/error.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	
</head>
<body>

	<?php include"header/header.php"; ?>

	<?php if(!empty($usuario)): ?>	
		<div class="container mt-3">
		  <h2> <?= $usuario['Usuario']; ?> </h2>
		  <p>En esta sección se revela la informacion de usuario logueado...  </p>
		  <div class="media border p-3">
		    <img src="data:image/gif;base64,<?php echo base64_encode($usuario['imagen']) ?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
		    <div class="media-body">
		      <h4><small><i> <?= $usuario['Nombre']; ?></i></small></h4>
		      <div class="container mt-3">		  
				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs">
				    <li class="nav-item">
				      <a class="nav-link active" data-toggle="tab" href="#home">Perfil</a>
				    </li>
				    <li class="nav-item">
				      <a class="nav-link" data-toggle="tab" href="#menu1">Editar</a>
				    </li>				    
				  </ul>
				  <!-- Tab panes -->
				  <div class="tab-content">
				    <div id="home" class="container tab-pane active"><br>
				      <table class="table table-borderless">
					    <thead>
					      <tr>
					        <th>Email</th>
					        <th>Edad</th>
					        <th>Telefono</th>
					      </tr>
					    </thead>
					    <tbody>
					      <tr>
					        <td><?= $usuario['Email']; ?></td>
					        <td><?= $usuario['Edad']; ?></td>
					        <td><?= $usuario['Telefono']; ?></td>
					      </tr>      
					    </tbody>
					  </table>
				    </div>
				    <div id="menu1" class="container tab-pane fade"><br>
						<div class="registro">		  
		  					<form action="ActualizacionDeDatos.php" method="POST" enctype="multipart/form-data">	  						
		  					  <input type="text" class="form-control"  placeholder="Nombre: <?= $usuario['Nombre']; ?>" name="nombre1"> 
		  					  <input type="text" class="form-control"  placeholder="Tel: <?= $usuario['Telefono']; ?>" name="telefonoo">
						      <input type="text" class="form-control" placeholder="Edad: <?= $usuario['Edad']; ?>" name="edadd">
						      <input type="password" class="form-control"  placeholder="Contraseña" name="contraseñaa">
						      <input type="password" class="form-control"  placeholder="Confirmar contraseña" name="contraseña2">

							  <div class="container"></div>
						      <button type="submit" name="submit" class="btn btn-success mt-3" value="guardar">Realizar cambios</button>
							</form>
						</div>
				    </div>		   
				  </div>
				</div>    
		    </div>
		  </div>
		  <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal">
		    Enviar mensaje
		  </button>
		  <!-- The Modal -->
		  <div class="modal fade" id="myModal">
		    <div class="modal-dialog">
		      <div class="modal-content">      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Enviar mensaje</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>        
		        <!-- Modal body -->
		        <div class="modal-body">
		          <div class="registro">			  
					<form action="bandejaEntrada.php" method="POST" enctype="multipart/form-data">
				      <input type="email" class="form-control"  placeholder="Email" name="email">  
				      <input type="text" class="form-control" placeholder="Asunto" name="asunto">
				      <textarea class="mensajje" rows="5" id="comment" name="mensaje" placeholder="Mensaje"></textarea><br>
				      <?php if(!empty($error)): ?>	<div class="mensaje">
					  <?php echo $error; ?>         </div>
					  <?php endif; ?><br>
					  <button type="submit" name="submit" class="btn btn-success">Enviar</button>
	          		  <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>  
					</form>
				  </div>
		        </div>	        
		        <!-- Modal footer -->		        
		      </div>
		    </div>
		  </div>
		</div>			
	<?php else: ?>
		<div class="container">
			<div class="jumbotron mt-3">
				<div class="card">
			    	<div class="card-header">Atencion: <p>Debe iniciar sesión o registrarse</p></div>
				</div>
			</div>
	    </div>
	<?php endif; ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>

</body>
</html>