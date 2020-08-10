<?php 


require_once "../../../BaseDatos/conexion.php"; 
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['EnviarDato'])) 
{
	$IDSolicitud = $_POST['id'];
	$Comentario = $_POST['comentario'];
	$Estado = $_POST['estado'];
	

	$consulta=$pdo->prepare("UPDATE hsociales SET estado=:estado , comentario = :comentario  WHERE ID_HSociales=:id");
	$consulta->bindParam(":estado",$Estado);
	$consulta->bindParam(":comentario",$Comentario);
	$consulta->bindParam(":id",$IDSolicitud);


  	//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Solicitud Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../HorasSocialesAlumno.php?id=".urlencode($IDSolicitud));
	}
	else
	{
		$_SESSION['message'] = 'Solicitud No Actualizdo';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../HorasSocialesAlumno.php?id=".urlencode($IDSolicitud));
	}


}
else
{
	$_SESSION['message'] = 'Datos No ingresados VerficarSolicuitud.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../HorasSocialesAlumno.php?id=".urlencode($IDSolicitud));
}







 ?>