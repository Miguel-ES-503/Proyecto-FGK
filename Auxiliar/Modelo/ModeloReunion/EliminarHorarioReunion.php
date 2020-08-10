<?php 


require_once "../../../BaseDatos/conexion.php"; 

$idHorario=$_GET['id'];
$IDReunion=$_GET['id2'];
session_start();  

$consulta2=$pdo->prepare("DELETE FROM horariosreunion WHERE  IDHorRunion =:IDHorRunion");
$consulta2->bindParam(":IDHorRunion", $idHorario);

if ($consulta2->execute()) {
	
	$_SESSION['message'] = 'Horario Eliminado con exito';
	$_SESSION['message2'] = 'success';
	
	header("Location: ../../ListaReunion.php?id=".urlencode($IDReunion));
	
}
else if(!$consulta2->execute())
{
	$_SESSION['message'] = 'Horario No Eliminado';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../ListaReunion.php?id=".urlencode($IDReunion));
}


?>