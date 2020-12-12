<?php
require_once '../Conexion/conexion.php';
session_start();
if (isset($_GET['cn'])) {
	$rn = $_GET['cn'];
	$query = "UPDATE renovacion set estado = 'eliminado'WHERE idRenovacion = :id";
    $delete = $dbh->prepare($query);
    $delete->bindParam(":id",$rn);
    if ($delete->execute()) {
    	$_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion eliminada con exito!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
foreach ($dbh->query("SELECT ID_Alumno FROM renovacion WHERE idRenovacion = '".$rn."'") as $alumno) {
	$st = trim($alumno['ID_Alumno']);
}
header("Location:Renovacion.php?id=$st");
    }

}elseif (isset($_POST['subirCarta2'])) {
$idRenovacion = $_POST['idRenovacion2'];
$estado = $_POST['estado'];
$nombreArchivo=$_FILES["archivo"]["name"];
$direccion= $_FILES["archivo"]["tmp_name"];
$query = "SELECT year,ciclo,archivo,direccion,carpeta FROM renovacion WHERE idRenovacion='".$idRenovacion."'";
foreach ($dbh->query($query) as $info) {
  $year = $info['year'];
  $ciclo = $info['ciclo']; 
  $archivo = $info['archivo'];
  $direccion1 = $info['direccion'];
  $carpeta = $info['carpeta'];
}


/*Proceso*/

$query2 = "UPDATE renovacion SET Estado = :estado WHERE idRenovacion = :id";
$update = $dbh->prepare($query2);
$update->bindParam(":estado",$estado);
$update->bindParam(":id",$idRenovacion);
if ($update->execute()) {
$nombreArchivo = $archivo;
move_uploaded_file($direccion,$carpeta."/".$nombreArchivo);
$_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion editada con exito!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
foreach ($dbh->query("SELECT ID_Alumno FROM renovacion WHERE idRenovacion = '".$idRenovacion."'") as $alumno) {
  $st = trim($alumno['ID_Alumno']);
}
header("Location:Renovacion.php?id=$st");
}

}

?>