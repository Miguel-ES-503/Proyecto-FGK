<?php 

require_once "../../../BaseDatos/conexion.php"; 

$ID=$_POST['id'];
session_start();  

$consulta2=$pdo->prepare("DELETE FROM inscripcion WHERE  IDinscripcion =:IDinscripcion");
$consulta2->bindParam(":IDinscripcion", $ID);

if ($consulta2->execute()) {
	
	$_SESSION['message'] = 'Inscripción eliminado con exito';
	$_SESSION['message2'] = 'success';
	
	header("Location: ../../SIT-ProcesoInscripcion.php");
	
}
else 
{
	$_SESSION['message'] = 'Fallo al eliminar Inscripción';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-ProcesoInscripcion.php");

}


?>