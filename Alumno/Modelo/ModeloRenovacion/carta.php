<?php 
if (isset($_POST['subirCarta']))
{
session_start();
try {
  require_once "../../../BaseDatos/conexion.php";
$nombreArchivo=$_FILES["archivo"]["name"];
$direccion= $_FILES["archivo"]["tmp_name"];
$ciclo=$_POST['ciclo'];
$year=date("Y");
$alumno=$_POST['alumno'];
$tipoarchivo = $_FILES["archivo"]["type"];
$tamaño = $_FILES["archivo"]["size"];
$rutaarchivo=$_FILES["archivo"]["tmp_name"];
$universidad=$_POST['uni'];

foreach ($pdo->query("SELECT Nombre,SedeAsistencia,Class FROM alumnos WHERE ID_Alumno = '".$alumno."'") as $Name) {
  $Nombre = $Name['Nombre'];
  $SC = $Name['SedeAsistencia'];
  $Class = $Name['Class'];
}
$Sede = substr($SC, 0, 2);
$Modalidad = substr($SC, 2, 2);
$formato = utf8_encode($Nombre)." ".$universidad." ".$Sede." ".$Modalidad." ".$Class.".pdf";
$numero = rand(1, 10000000);


$idRenovacion = "RN-".$numero;
$archivero = "../../../CoachReuniones/Renovaciones/".$year."/Class-".$Class."/"."Ciclo 0".$ciclo."/".$alumno;
$ubicacion = "Renovaciones/".$year."/Class-".$Class."/"."Ciclo 0".$ciclo."/".$alumno."/".$formato;


if ($tamaño > 5000000) {
  $_SESSION["error"] = "Tamaño de archivo mayor a 5MB";
  header("Location:../../renovacionBeca.php");
}elseif ($nombreArchivo != $formato) {
  $_SESSION["error"] = "Nombre o formato de archivo diferente al solicitado";
  header("Location:../../renovacionBeca.php");
}elseif ($tipoarchivo != "application/pdf") {
$_SESSION["error"] = "Formato de archivo diferente al solicitado";
  header("Location:../../renovacionBeca.php");
}

else
{
  if (file_exists($archivero)) {

  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo,direccion)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo,:direccion)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         $consulta->bindParam(':archivo',$formato,PDO::PARAM_STR);
         $consulta->bindParam(':direccion',$ubicacion,PDO::PARAM_STR);

  $consulta->execute();

move_uploaded_file($direccion,$archivero."/".$nombreArchivo);
//rename("../../../CoachReuniones/".$ubicacion, $formato);
rename("../../../CoachReuniones/".$ubicacion, $archivero."/".$formato);
  $_SESSION["exito"] = "Renovacion de Beca ingresada correctamente";
  header("Location:../../renovacionBeca.php");
}else{
  mkdir($archivero, 0777, true);


  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo,direccion)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo,:direccion)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         $consulta->bindParam(':archivo',$formato,PDO::PARAM_STR);
         $consulta->bindParam(':direccion',$ubicacion,PDO::PARAM_STR);

  $consulta->execute();
move_uploaded_file($direccion,$archivero."/".$nombreArchivo);
rename("../../../CoachReuniones/".$ubicacion, $archivero."/".$formato);
$_SESSION["exito"] = "Renovacion de Beca ingresada correctamente";
  header("Location:../../renovacionBeca.php");
}
}



} catch (PDOException $ex) {
  echo $ex->getMessage();
  
}
}else
{
  $_SESSION["error"] = "No se ha podido ingresar carta de Renovacion";
header("Location:../../renovacionBeca.php");
}


?>