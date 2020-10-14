<?php 
if (isset($_POST['subirCarta']) && $_POST['subirCarta'] != null && !(empty($_POST['subirCarta'])))
{
    require '../../../Conexion/conexion.php';
    require '../../../BaseDatos/conexion.php';
  session_start();
try {
$nombreArchivo=$_FILES["archivo"]["name"];
$direccion= $_FILES["archivo"]["tmp_name"];
$ciclo=$_POST['ciclo'];
$year=date("Y");
$alumno=$_POST['alumno'];
$tipoarchivo = $_FILES["archivo"]["type"];
$tamaño = $_FILES["archivo"]["size"];
$rutaarchivo=$_FILES["archivo"]["tmp_name"];
$universidad=$_POST['uni'];

foreach ($dbh->query("SELECT Nombre,SedeAsistencia,Class FROM alumnos WHERE ID_Alumno = '".$alumno."'") as $Name) {
  $Nombre = $Name['Nombre'];
  $SC = $Name['SedeAsistencia'];
  $Class = $Name['Class'];
}
$sql = "SELECT COUNT(*) AS 'condicion'FROM renovacion WHERE ID_Alumno = '".$alumno."' AND ciclo = '".$ciclo."' AND año = Date_format(now(),'%Y')";
foreach ($dbh->query($sql) as $C) {
 $condicion = $C['condicion'];
}
$Sede = substr($SC, 0, 2);
$Modalidad = substr($SC, 2, 2);
$formato = utf8_decode($Nombre)." ".$universidad." ".$Sede." ".$Modalidad." ".$Class.".pdf";
$numero = rand(1, 10000000);


$idRenovacion = "RN-".$numero;
$archivero = "../../../CoachReuniones/Renovaciones/".$year."/Class-".$Class."/"."Ciclo 0".$ciclo."/".$alumno;
$ubicacion = "Renovaciones/".$year."/Class-".$Class."/"."Ciclo 0".$ciclo."/".$alumno."/".$formato;
$carpeta = "Renovaciones/".$year."/Class-".$Class."/"."Ciclo 0".$ciclo."/".$alumno."/";

if ($tamaño > 5000000) {
  //$_SESSION["error"] = "Tamaño de archivo mayor a 5MB";
$_SESSION['noti'] = "<script>swal({
  title: 'Error!',
  text: 'Tamaño de archivo mayor a 5MB!',
  icon: 'error',
  button: 'Cerrar',
});</script>";
header("Location:../../renovacionBeca.php");
}elseif (mime_content_type($rutaarchivo) != "application/pdf") {
//$_SESSION["error"] = "Formato de archivo diferente al solicitado";
$_SESSION['noti'] = "<script>swal({
  title: 'Error!',
  text: 'Archivo subido con formato incorrecto!',
  icon: 'error',
  button: 'Cerrar',
});</script>";
header("Location:../../renovacionBeca.php");
}elseif ($condicion > 0) {
$_SESSION['noti'] = "<script>swal({
  title: 'Error!',
  text: 'Ya ha ingresado renovacion de beca para el ciclo seleccionado!',
  icon: 'error',
  button: 'Cerrar',
});</script>";
header("Location:../../renovacionBeca.php");

}

else
{
  if (file_exists($archivero)) {
  
  $consulta=$dbh->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo,direccion,carpeta)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo,:direccion,:carpeta)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         $consulta->bindParam(':archivo',$formato,PDO::PARAM_STR);
         $consulta->bindParam(':direccion',$ubicacion,PDO::PARAM_STR);
         $consulta->bindParam(':carpeta',$carpeta,PDO::PARAM_STR);

  $consulta->execute();
$nombreArchivo = $formato;
move_uploaded_file($direccion,$archivero."/".$nombreArchivo);
//$_SESSION["exito"] = "Renovacion de Beca ingresada correctamente";
$_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion de Beca ingresada correctamente!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
header("Location:../../renovacionBeca.php");

}else{
  mkdir($archivero, 0777, true);
  $consulta=$dbh->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo,direccion,carpeta)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo,:direccion,:carpeta)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         $consulta->bindParam(':archivo',$formato,PDO::PARAM_STR);
         $consulta->bindParam(':direccion',$ubicacion,PDO::PARAM_STR);
         $consulta->bindParam(':carpeta',$carpeta,PDO::PARAM_STR);

  $consulta->execute();
$nombreArchivo = $formato;
move_uploaded_file($direccion,$archivero."/".$nombreArchivo);
//$_SESSION["exito"] = "Renovacion de Beca ingresada correctamente";
$_SESSION['noti'] = "<script>swal({
  title: 'Exito!',
  text: 'Renovacion de Beca ingresada correctamente!',
  icon: 'success',
  button: 'Cerrar',
});</script>";
header("Location:../../renovacionBeca.php");
}
}



} catch (PDOException $ex) {
  echo $ex->getMessage();
  
}
}


?>