<?php 
require_once '../Conexion/conexion.php';
@$estado2 = $_POST['siasistio'];

if(isset($estado2)){
		$sqlactualizar = "UPDATE one_on_one SET estado_alumno = ? WHERE id = ?";
		$stmt= $dbh->prepare($sqlactualizar);
		$stmt->execute(['Asistio', $estado2]);
		echo "<script>window.location.replace('sessionesAsistencia.php');</script>";
		echo "<p class='text-white bg-success text-center'>Sesión correctamente</p>";
		}
	else{
		echo "<p class='text-white bg-danger text-center'>Error al guardar</p>";
	}
 ?>