<?php
require '../../../Conexion/conexion.php';
session_start();
if (isset($_SESSION['idRenovacion'])) {
	$sql = "SELECT alumnos.correo ,direccion FROM alumnos JOIN renovacion ON renovacion.ID_Alumno = alumnos.ID_Alumno WHERE    renovacion.idRenovacion = '".$_SESSION['idRenovacion']."'";
	foreach ($dbh->query($sql) as $mail) {
		$correo = $mail['correo'];
		$direccion = $mail['direccion'];
	}
	echo $correo;
	$actualizar = $dbh->prepare("UPDATE renovacion SET Estado = 'Rechazado' WHERE idRenovacion = :id");
	$actualizar->bindParam(':id',$_SESSION['idRenovacion'],PDO::PARAM_STR);
	$actualizar->execute();
	if ($actualizar->execute()) {
		$_SESSION['noti'] = "<script>swal({
  		title: 'Exito!',
  		text: 'Renovacion Rechazada!',
  		icon: 'success',
  		button: 'Cerrar',
		});</script>";

		
		header("Location:../../listadoRenovacion.php");
		
	}

}else
{
	echo "Fallo";
}

?>