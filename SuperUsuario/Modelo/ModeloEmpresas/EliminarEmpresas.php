<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= utf8_decode($_POST['id']);

$consulta2=$pdo->prepare("DELETE FROM empresas WHERE  ID_Empresa=:ID_Empresa");
$consulta2->bindParam(":ID_Empresa", $ID);

if ($consulta2->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Empresa elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../SIT-CrearEmpresas.php");
	
}
else if(!$consulta2->execute())
{
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Fallo  al Eliminar Empresas';
	$_SESSION['message2'] = 'success';
	header("Location: ../../SIT-CrearEmpresas.php");
}

?>