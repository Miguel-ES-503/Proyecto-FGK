<?php
	
	require_once "../../../BaseDatos/conexion.php";
	session_start();  
	$varsesion = $_SESSION['Email'];


if (isset($_GET['id']) && isset($_GET['id2'])) 
{
	$idTaller=$_GET['id'];
	$idAlumno=$_GET['id2'];
	

//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE inscripciontalleres SET   Asistencia=:Asistencia   WHERE ID_Alumno=:idAlumno AND ID_Taller=:IDTaller  ");
	$Asistencia = "Asistio";
	$consulta->bindParam(":Asistencia",$Asistencia);
	$consulta->bindParam(":idAlumno",$idAlumno);
	$consulta->bindParam(":IDTaller",$idTaller);

                //Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
	//Si todo fue correcto muestra el resultado con exito;

		$_SESSION['message'] = 'Asistencia Cambiado Con Exito';
		$_SESSION['message2'] = 'success';
		 header("Location: ../../DetallesTaller.php?id=".urlencode($idTaller));

	}
	else
	{

		echo 'No se pudo actualizar';
	}
	




}else 
{
	echo "Datos no llegando";
}
	

 ?>