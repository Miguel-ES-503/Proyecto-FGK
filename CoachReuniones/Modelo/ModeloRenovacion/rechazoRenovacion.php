<?php 
include '../../../Conexion/conexion.php';
include '../../../BaseDatos/conexion.php';
$asunto = "Renovacion de Beca Ciclo 2-2020";
$msj = $_POST['mensaje'];
$correo = $_POST['correo'];
$nombre = $_POST['nombre'];
$id = $_POST['id'];
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
$mensaje = "Hola ".$nombre." , tu renovación ha sido rechazada\nMotivo:\n".$msj;
include '../ModeloCorreo/correo.php';
header("Location:../../listadoRenovacion.php");
    }

?>