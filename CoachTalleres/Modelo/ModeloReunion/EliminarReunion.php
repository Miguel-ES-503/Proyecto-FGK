<?php 



require_once "../../../BaseDatos/conexion.php";
session_start();  



$IDEliminarReunion= $_POST['idreunion3'];

$consulta2=$pdo->prepare("DELETE FROM reuniones WHERE  ID_Reunion=:ID_Reunion");
$consulta2->bindParam(":ID_Reunion", $IDEliminarReunion );


$consulta3=$pdo->prepare("DELETE FROM horariosreunion WHERE  ID_Reunion=:ID_Reunion");
$consulta3->bindParam(":ID_Reunion", $IDEliminarReunion );


//Verifica si ha insertado los datos
if ($consulta2->execute()) 
{
	if ($consulta3->execute()) 
	{
					//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Reunión Eliminado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../LIS-Reunion.php");
	}
	else
	{
		$_SESSION['message'] = 'Fallo a eliminar los horarios';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../LIS-Reunion.php");
	}
}
else
{
	$_SESSION['message'] = 'Fallo al eliminar Reunión';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../LIS-Reunion.php");
}



 ?>