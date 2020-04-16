<?php

//algoritmo para realizar el envio de mensajes a un correo deseado
$correo = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$error = '';

if(mail($correo, $asunto, $mensaje)){
	$error .= '<i style="color: green;">Se ha enviado exitosamente</i>';
}else{
	$error .= 'No se ha podido enviar';
}
require 'Index.php'

?>