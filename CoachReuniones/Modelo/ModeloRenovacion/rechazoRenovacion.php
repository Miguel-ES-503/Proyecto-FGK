<?php 
include '../../../Conexion/conexion.php';
include '../../../BaseDatos/conexion.php';
session_start();

$msj = $_POST['mensaje'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$id = $_POST['id'];

foreach ($dbh->query("SELECT ID_Alumno,year,ciclo FROM renovacion WHERE idRenovacion = '".$id."'") as $alumno) {
	$idAlumno = $alumno['ID_Alumno'];
	$year = $alumno['year'];
	$ciclo = $alumno['ciclo'];
}
$asunto = "Proceso de renovación de Beca Ciclo 0".$ciclo."-".$year;
$mysql = "UPDATE renovacion SET estado = 'rechazada' WHERE idRenovacion = :id";
    $actualizar = $dbh->prepare($mysql);
    $actualizar->bindParam(":id",$id,PDO::PARAM_STR);
    if ( $actualizar->execute()) {
      $_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion rechazada con exito!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
 $mensaje = "Hola ".$nombre."\nPor este medio se te informa que tu renovación ha sido rechazada.\nMotivo:\n".$msj."\n\nTen un lindo dia.";
include '../ModeloCorreo/correo.php';
header("Location:../../listadoRenovacion.php");
    }

?>