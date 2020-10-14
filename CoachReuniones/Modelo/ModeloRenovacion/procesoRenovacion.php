<?php 
require '../../../Conexion/conexion.php';
$idRenovacion = $_POST['idRenovacion'];
echo $idRenovacion;
session_start();  
if (isset($_POST['aceptar'])) {
	$actualizar = $dbh->prepare("UPDATE renovacion SET Estado = 'Aceptado' WHERE idRenovacion = :id");
	$actualizar->bindParam(':id',$idRenovacion,PDO::PARAM_STR);
	if ($actualizar->execute()) {
		$_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion aceptada!',
  icon: 'success',
  button: 'Cerrar',
});</script>";

header("Location:../../listadoRenovacion.php");
	}
}else if (isset($_POST['rechazar'])) {
	$_SESSION['idRenovacion'] = $idRenovacion;
	header("Location:rechazarRenovacion.php");
}

?>