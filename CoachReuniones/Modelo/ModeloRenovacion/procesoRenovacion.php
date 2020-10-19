<?php 
require '../../../Conexion/conexion.php';
$idRenovacion = $_POST['idRenovacion'];

if (isset($_POST['aceptar'])) {
	session_start();  
	$actualizar = $dbh->prepare("UPDATE renovacion SET Estado = 'aceptada' WHERE idRenovacion = :id");
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
	session_start();  
	$_SESSION['idRenovacion'] = $idRenovacion;
	header("Location:../../rechazarRenovacion.php");

}

?>