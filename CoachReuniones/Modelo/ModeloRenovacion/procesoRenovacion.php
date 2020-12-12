<?php 
require '../../../Conexion/conexion.php';
$idRenovacion = $_POST['idRenovacion'];

foreach ($dbh->query("SELECT ID_Alumno,year,ciclo FROM renovacion WHERE idRenovacion = '".$idRenovacion."'") as $alumno) {
	$idAlumno = $alumno['ID_Alumno'];
	$year = $alumno['year'];
	$ciclo = $alumno['ciclo'];
}
$nombre = "";
$correo = "";
foreach ($dbh->query("SELECT LEFT(Nombre,LOCATE(' ',Nombre) - 1) AS 'nombre' ,correo from alumnos WHERE ID_Alumno = '".$idAlumno."'") as $envio) {
	$nombre = $envio['nombre'];
	$correo = $envio['correo'];
}
$asunto = "Proceso de renovación de Beca Ciclo 0".$ciclo."-".$year;
$mensaje = "Hola ".$nombre." .\nPor este medio se te informa que tu renovación de beca ha sido aceptada.\n\nTen un lindo dia.";
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