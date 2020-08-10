<?php
require_once "../../../BaseDatos/conexion.php";
	session_start();  
	$varsesion = $_SESSION['Email'];
	$varLugar = $_SESSION['Lugar'];


if (isset($_POST['CambiarEstado'])) {
	
	$IDTaller = $_POST['idtaller2'];
	$EstadoTaller = $_POST['IDEstado'];

	//Consulta de actualización de datos
	$consulta=$pdo->prepare("UPDATE talleres SET  Estado=:Estado   WHERE ID_Taller=:id");
	$consulta->bindParam(":Estado",$EstadoTaller);
	$consulta->bindParam(":id",$IDTaller);

     //Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
		//Si todo fue correcto muestra el resultado con exito;

		$_SESSION['message'] = 'Taller Finalizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));

	}
	else
	{


		echo 'No se pudo actualizar';
	}




}else
{
	echo "Dato de entrada no esta llegando";
}



?>