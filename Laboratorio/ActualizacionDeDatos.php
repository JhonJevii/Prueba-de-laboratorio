<?php  session_start();

	require 'conexion.php';

 //algoritmo para modificar el usuario que esta logueado pero aun no funciona

	
	$tel = $_POST["telefonoo"];
	$edad1 = $_POST["edadd"];
	$contraseña1 = $_POST["contraseñaa"];
	$contraseña2 = $_POST["contraseña2"];
	$nom = $_POST["nombre1"];
	$id = $_SESSION["idUsuario"];
	
	$men = '';

	if ($contraseña2 == $contraseña1){
		$password = password_hash($contraseña1, PASSWORD_BCRYPT);
		$cambio = $conn->prepare("UPDATE usuario SET Nombre='".$nom."', Telefono='".$tel."', Edad='".$edad1."', Contraseña='".$password."' WHERE idUsuario='".$id."'");		
		if($cambio->execute());{
			$men .= '<i style="color: green;">Se ha Guardado exitosamente</i>';
	    }	    
	}else{
		$men .= 'Las contraseñas no coinciden';
	}
	session_unset();
	include 'index.php';

?>