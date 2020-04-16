<?php session_start();


$error = '';

//se realiza una validación de datos para cada campo y asi prosigue con la creacion del usuario
if (isset($_POST['usuario'])) {
	$usuario1 = $_POST['usuario'];
	$nombre = $_POST['nombre'];
	$contraseña = $_POST['contraseña'];
	$telefono = $_POST['telefono'];
	$edad = $_POST['edad'];		
	$email = $_POST['email'];				
	
	$campo = array();
     
    // se analisa cada campo para corregir o no
	if ($usuario1 == '') {
		array_push($campo, "EL campo usuario no puede estar vacío ");
	}
	if ($nombre == '') {
		array_push($campo, "EL campo nombre no puede estar vacío ");
	}
	if ($contraseña == '' || strlen($contraseña) < 8) {
		array_push($campo, "EL campo de contraseña no puede estar vacío o tener menos de 8 caracteres");
	}
	if ($telefono == '') {
		array_push($campo, "EL campo Telefono no puede estar vacío ");
	}
	if ($edad == '') {
		array_push($campo, "EL campo Edad no puede estar vacío ");
	}
	if ($email == '' || strpos($email, "@") === false) {
		array_push($campo, "Debe registrar un correo valido ");
	}
	if (count($campo) > 0) {	

		for ($i=0; $i < count($campo); $i++) { 
			$error .= $campo[$i];	
		}
	}else{
		require 'Conexion.php';

		//en esta condiocion se verifica si envio algo desde el boton
		if(isset($_POST["submit"])){
	    	$revisar = getimagesize($_FILES["foto"]["tmp_name"]);

	    	//se mira si hay una foto cargada
	    	if($revisar !== false){
		       
		    	$imagen = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
				$usuario = $_POST['usuario'];
				$nombre = $_POST['nombre'];
				$contraseña = $_POST['contraseña'];
				$pass = password_hash($contraseña, PASSWORD_BCRYPT);
				$telefono = $_POST['telefono'];
				$edad =  $_POST['edad'];		
				$email = $_POST['email'];
				$fecha = date('Y-m-d H:i:s');


				//se cargan las consultas o los insert para la base de datos
				$sql = (" SELECT usuario FROM usuario");
				$resulta = mysqli_query($con, $sql);
				$insertar = "INSERT INTO `laboratorio`.`usuario` (`Usuario`, `Nombre`, `Contraseña`, `Telefono`, `Edad`, `Email`, `imagen`, `fecha_creacion`) VALUES ('$usuario','$nombre','$pass','$telefono','$edad','$email','$imagen','$fecha')";
				$usu =0;

				//se verifica que el usuario no este repetido en la base de datos
				if (mysqli_num_rows($resulta) > 0) {
				    
				   while($fila = mysqli_fetch_assoc($resulta)) {
				    	$usu = $fila['usuario'] == $usuario;
				    	}
				}

				//despues se guarda los datos registrados por el nuevo usuario
			   	if($usu == 0 ){		    		
		    		if (mysqli_query($con, $insertar)) {
					     $error .= '<i style="color: green;">Se ha Guardado exitosamente</i>';
					}else {
				      $error .="Error: " . $insertar . "<br>" . mysqli_error($con);
					}					
		    	}else{	    		
					$error .='Este usuario esta registrado';					
		    	}			    
				
				mysqli_close($con);
			}
		}		
	}		
}
require 'Registrar.php';
?>