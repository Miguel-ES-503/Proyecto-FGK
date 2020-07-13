<?php 
  

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID=$_GET['id'];
$ID2=$_GET['id2'];


$consulta2=$pdo->prepare("DELETE FROM tallercompetencia WHERE  IDTaller_Competencia=:IDTaller_Competencia");
$consulta2->bindParam(":IDTaller_Competencia", $ID);

if ($consulta2->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Competencia elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($ID2));
	
}
else if(!$consulta2->execute())
{
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Fallo  al Eliminar Competencia';
	$_SESSION['message2'] = 'success';
	header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($ID2));
}


 ?>