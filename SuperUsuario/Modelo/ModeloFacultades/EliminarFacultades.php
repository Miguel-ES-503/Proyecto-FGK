<?php

require_once "../../../BaseDatos/conexion.php"; 
$ID=$_POST['id'];
session_start();  
$consulta2=$pdo->prepare("DELETE FROM facultades WHERE  IDFacultates =:IDFacultates");
$consulta2->bindParam(":IDFacultates", $ID);

if ($consulta2->execute()) {
	
	$_SESSION['message'] = 'Facultdad Eliminado con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../SIT-Facultades.php");
	
}
else if(!$consulta2->execute())
{
	$_SESSION['message'] = 'Facultadad No Eliminado';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Facultades.php");

}

?>