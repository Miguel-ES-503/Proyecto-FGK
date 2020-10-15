<?php
	
	require_once "../../../BaseDatos/conexion.php";
	session_start();  
	$varsesion = $_SESSION['Email'];


if (isset($_GET['id']) && isset($_GET['id2'])) 
{
	$idreunion=$_GET['id'];
	$idAlumno=$_GET['id2'];
	

//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE inscripcionreunion SET   asistencia = :Asistencia   WHERE id_alumno =:idAlumno AND id_reunion = :id_reunion  ");
	$Asistencia = "Asistio";
	$consulta->bindParam(":Asistencia",$Asistencia);
	$consulta->bindParam(":idAlumno",$idAlumno);
	$consulta->bindParam(":id_reunion",$idreunion);

                //Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
	//Si todo fue correcto muestra el resultado con exito;

		$_SESSION['message'] = 'Asistencia Cambiado Con Exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../ListaReunion.php?id=".urlencode($idreunion));

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