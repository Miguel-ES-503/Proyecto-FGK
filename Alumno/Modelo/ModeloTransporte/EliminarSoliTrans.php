<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= $_GET['id'];
$IDuser = $_GET['id2'];

$consultaD=$pdo->prepare("DELETE FROM solitransporte WHERE  idSoliTrans=:id");
$consultaD->bindParam(":id", $ID);

if ($consultaD->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	//$_SESSION['message'] = 'Empresa elimando con exito';
	//$_SESSION['message2'] = 'success';
	header("Location: ../../Transporte.php?id=".$IDuser);

	echo "Funciona";
	
}
else
{
	//Si todo fue correcto muestra el resultado con exito;
	//$_SESSION['message'] = 'Fallo  al Eliminar Empresas';
	//$_SESSION['message2'] = 'success';
	header("Location: ../../Transporte.php?id=".$IDuser);
}

?>