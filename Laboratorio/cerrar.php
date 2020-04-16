<?php 

// se desconcta del sistema y lo redirige a iiciar sesión 
session_start();

session_unset();

session_destroy();

header("location: Iniciar_sesion.php")

?>