<?php 
require_once '../Conexion/conexion.php';
@$estado2 = $_POST['siasistio'];

if(isset($estado2)){
		$sqlactualizar = "UPDATE one_on_one SET estado_alumno = ? WHERE id = ?";
		$stmt= $dbh->prepare($sqlactualizar);
		$stmt->execute(['Asistio', $estado2]);
 		echo "<p class='text-success text-center'>Sesión correctamente</p>";
		 header("Location:sessionesOneonOne.php");
	}
	else{
		echo "Error";
	}
 ?>