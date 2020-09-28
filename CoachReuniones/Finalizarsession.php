<?php
ob_start();
require_once '../Conexion/conexion.php';
@$estado = $_POST['Finalizars'];
if (isset($estado)) {
		$sqlactualizar = "UPDATE one_on_one SET estado = ? WHERE id = ?";
		$stmt= $dbh->prepare($sqlactualizar);
		$stmt->execute(['Finalizado', $estado]);
 		echo "<p class='text-success text-center'>Sesión correctamente</p>";
		header("Location:sessionesOneonOne.php");
	}else{
				 header("Location:sessionesOneonOne.php");
				 echo "Error";
	}
ob_flush();