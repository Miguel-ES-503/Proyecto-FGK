<?php 
  

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= utf8_decode($_POST['id']);



$consulta2=$pdo->prepare("DELETE FROM competencias WHERE  IDComptenecia=:IDComptenecia");
$consulta2->bindParam(":IDComptenecia", $ID);

if ($consulta2->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Competencia elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../SIT-Competencias.php");
	
}
else if(!$consulta2->execute())
{
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Fallo  al Eliminar Competencia';
	$_SESSION['message2'] = 'success';
	header("Location: ../../SIT-Competencias.php");
}

