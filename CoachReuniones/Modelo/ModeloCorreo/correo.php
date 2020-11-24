<?php

$cabeceras = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/plain; charset=\"UTF-8\"\r\n";
$cabeceras .= "Content-Transfer-Encoding: 8bit\r\n";
/*$to = "miguel.barahona@oportunidades.org.sv";
$subject = "Asunto del email";
$message = "Este es mi primer envío de email con PHP";*/

 
mail($correo, $asunto, $mensaje,$cabeceras);


?>