<?php 
require '../../../Conexion/conexion.php';
$idRenovacion = $_POST['idRenovacion'];

foreach ($dbh->query("SELECT ID_Alumno FROM renovacion WHERE idRenovacion = '".$idRenovacion."'") as $alumno) {
	$idAlumno = $alumno['ID_Alumno'];
}
$nombre = "";
$correo = "";
foreach ($dbh->query("SELECT LEFT(Nombre,LOCATE(' ',Nombre) - 1) AS 'nombre' ,correo from alumnos WHERE ID_Alumno = '".$idAlumno."'") as $envio) {
	$nombre = $envio['nombre'];
	$correo = $envio['correo'];
}
$asunto = "Proceso de renovacion de Beca Ciclo 02-2020";
$mensaje = "Hola ".$nombre." , su renovacion de beca ha sido aceptada";
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

include '../ModeloCorreo/correo.php';
header("Location:../../listadoRenovacion.php");
	}
}else if (isset($_POST['rechazar'])) {
	session_start();  
	$_SESSION['idRenovacion'] = $idRenovacion;
	header("Location:../../rechazarRenovacion.php");

}

?>