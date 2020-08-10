<?php
	
	require_once "../../BaseDatos/conexion.php";
	session_start();  
	$varsesion = $_SESSION['Email'];

if (isset($_GET['id']) && isset($_GET['id2'])) 
{
	$idreunion=$_GET['id'];
	$idreunion2=$_GET['id2'];
	
//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE datos_modulos SET estado = 'Reprobado'  WHERE id =:id ");
	$consulta->bindParam(":id",$idreunion);

    //Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
	//Si todo fue correcto muestra el resultado con exito;

		$_SESSION['message'] = 'Alumnos Aprobado con éxito';
		$_SESSION['message2'] = 'success';
		header("Location:../modulo3.php?");
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