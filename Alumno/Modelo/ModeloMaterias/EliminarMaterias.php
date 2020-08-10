<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= $_GET['id'];

$consultaD=$pdo->prepare("DELETE FROM materias WHERE  idMateria=:idMateria");
$consultaD->bindParam(":idMateria", $ID);

if ($consultaD->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Empresa elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../pensum.php");
	
}
else
{
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Fallo  al Eliminar Empresas';
	$_SESSION['message2'] = 'success';
	header("Location: ../../pensum.php");
}

?>