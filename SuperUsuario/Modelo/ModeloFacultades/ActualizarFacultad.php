<?php
require_once "../../../BaseDatos/conexion.php"; 
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Facultad'])) 
{
	$NomFacultada = utf8_decode($_POST['NombreFac']);
	$idFacultada = $_POST['id'];

	$consulta=$pdo->prepare("UPDATE facultades SET Nombre=:Nombre  WHERE IDFacultates=:id");
	$consulta->bindParam(":Nombre",$NomFacultada);
	$consulta->bindParam(":id",$idFacultada);

  	//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Facultdad Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-Facultades.php");
	}
	else
	{
		$_SESSION['message'] = 'Facultad No Actualizdo';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-Facultades.php");
	}


}
else
{
	$_SESSION['message'] = 'Datos No ingresados Form ActualizarFacultad.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Facultades.php");
}

?>