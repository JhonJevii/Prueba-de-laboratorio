<?php 

//variables para realizar la conexion a la base de datos 
$serdidor = "localhost";
$usuario = "root";
$contraseña = "12345";
$bd = "laboratorio";


//conexion a la base de datos
$con = mysqli_connect($serdidor, $usuario, $contraseña, $bd) or die ("No se ha podido conectar al servidor de Base de datos");
try {
	$conn = new PDO("mysql:host=$serdidor;dbname=$bd;", $usuario, $contraseña);
} catch (PDOException $e) {
	die("connected failed: " . $e->getMessage());
}
?>