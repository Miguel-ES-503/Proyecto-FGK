<?php 



require_once "../../../BaseDatos/conexion.php";
session_start();  



$IDEliminarTaller= $_POST['idtaller3'];

$consulta2=$pdo->prepare("DELETE FROM talleres WHERE  ID_Taller=:ID_Taller");
$consulta2->bindParam(":ID_Taller", $IDEliminarTaller );

//Verifica si ha insertado los datos
if ($consulta2->execute()) 
{
				//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Taller Eliminado con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../LIS-Talleres.php");
}
else
{
	$_SESSION['message'] = 'Fallo al eliminar el Taller';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../LIS-Talleres.php");
}



 ?>