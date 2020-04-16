<?php
use  PHPMailer \ PHPMailer \ PHPMailer ; 
use  PHPMailer \ PHPMailer \ Exception ;

require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php';
	
	$mail = new PHPMailer(true);
	$email = $_POST['email'];
	$mensaje = '';

	try {
	   
	    $mail->SMTPDebug = 0;                      
	    $mail->isSMTP();                                           
	    $mail->Host       = 'smtp.gmail.com';                    
	    $mail->SMTPAuth   = true;                                   
	    $mail->Username   = 'oscarpruebadjango@gmail.com';                 
	    $mail->Password   = 'pr0b@rdj@ng0';                               
	    $mail->SMTPSecure = 'tls';        
	    $mail->Port       = 587;                                    

	    
	    $mail->setFrom('oscarpruebadjango@gmail.com', 'Jhon');
	    $mail->addAddress($email);    
	    
	    
	    $mail->addAttachment('template/template.php');         
	        

	  
	    $mail->isHTML(true);        
	    $mail->Subject = 'Probando de envio';
	    $mail->Body    = 'Veamos que pasa <b>Hola!</b>';
	   

	    $mail->send();
	    $mensaje = 'El mensaje fue enviado';
	} catch (Exception $e) {
	   $mensaje .= "no se ha podido enviar: $mail->ErrorInfo";
	}

	
	    //algoritmo para recuperar... envia un correo al propietario de la cuenta con la funcion Mail 
	/*
		$consulta2 = $conn->prepare("SELECT Contraseña FROM usuario WHERE email=:email");
		$consulta2->bindParam(':email', $email);		
		$consulta2->execute();
		$resultados2 = $consulta2->fetch(PDO::FETCH_ASSOC);
		
		$usuario2 = null;
		$asunto = "Se le envía la contraseña olvidada";
		
		if (count($resultados2) > 0){
			$usuario2 = $resultados2;		
			$mensaje = $usuario2['Contraseña'];
			$mensaje2 = "Se le envía la contraseña de nuestra base de datos por favor no olvidarla";
			mail($email, $asunto, $mensaje, $mensaje2);

		}else{
			$error .= "Este corro no se encuentra registrado en nuestra base de datos";
		}
	require "recuperar.php";

	*/
require 'recuperar.php';
?>