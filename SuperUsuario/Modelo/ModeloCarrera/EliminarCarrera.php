<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  

$idCarrera=utf8_decode($_POST['id']);

$consulta2=$pdo->prepare("DELETE FROM carrera WHERE  Id_Carrera=:Id_Carrera");
$consulta2->bindParam(":Id_Carrera", $idCarrera);


if ($consulta2->execute()) {

	//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Carrera  eliminado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-CrearCarrera.php");
	
}
else if(!$consulta2->execute())
{
	//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Fallo al EliminarCarrera.php';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-CrearCarrera.php");

}

?>