<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= $_GET['id'];
$IDuser = $_GET['id2'];

$consultaD=$pdo->prepare("DELETE FROM materia WHERE  ID_Materia=:ID_Materia");
$consultaD->bindParam(":ID_Materia", $ID);

if ($consultaD->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Empresa elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../InscripcionMateriasCiclo.php?id=".$IDuser);
	echo "Funciona";
	
}
else
{
	//Si todo fue correcto muestra el resultado con exito;
	/*$_SESSION['message'] = 'Fallo  al Eliminar Empresas';
	$_SESSION['message2'] = 'success';
	header("Location: ../../InscripcionMateriasCiclo.php?id=".$IDuser);*/
	echo "No Funciona";
}

?>