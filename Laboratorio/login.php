<?php session_start();
//condicional para saber si el usuario no esta logueado lo redirija al logueo
if (isset($_SESSION['idUsuario'])){
	header('Location: Iniciar_sesion.php');
}

require 'Conexion.php';

$usuario = $_POST['usuario'];
$contraseña = $_POST['Contraseña'];
$error = '';

//algoritmo para consultar el usuario y la contraseña para loguearse al sistema
if (!empty($usuario) && !empty($contraseña)) {
	$consulta = $conn->prepare("SELECT idUsuario, Usuario, Contraseña FROM usuario WHERE Usuario = :usuario");
	$consulta->bindParam(':usuario', $usuario);
	$consulta->execute();
	$resultado = $consulta->fetch(PDO::FETCH_ASSOC);	

	//se realiza la comparacion de datos con la base de datos para ingresar al sistema
	if(count($resultado) > 0 && password_verify($contraseña, $resultado['Contraseña'])){
		
		//se realiza una variable para el id usuario para el que se loguee.
		$_SESSION['idUsuario']= $resultado['idUsuario'];
		header("Location: index.php");

	}else{
		$error = "Lo siento estas credenciales no son validas";		
	}
}else{
  $error .= "Debe llenar los campos para iniciar sesión";
}
require 'Iniciar_sesion.php'
?>