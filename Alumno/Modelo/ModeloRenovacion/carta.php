<?php 
if (isset($_POST['subirCarta']))
{

try {
  require_once "../../../BaseDatos/conexion.php";
$nombreArchivo=$_FILES["archivo"]["name"];
$direccion= $_FILES["archivo"]["tmp_name"];
$ciclo=2;
$year=date("Y");
$alumno=$_POST['alumno'];
$tipoarchivo = $_FILES["archivo"]["type"];
$tama«Ðoarchivo = $_FILES["archivo"]["size"];
$rutaarchivo=$_FILES["archivo"]["tmp_name"];
$universidad=$_POST['uni'];
$idRenovacion = "Prueba1";

if (file_exists("Renovacion/".$universidad."/".$alumno)) {

  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         
         $consulta->bindParam(':archivo',$nombreArchivo,PDO::PARAM_STR);

  $consulta->execute();
  move_uploaded_file($direccion,"Renovacion/".$universidad."/".$alumno."/".$nombreArchivo);
  echo "Archivo Guardadado correctamente";
}else{
  mkdir("Renovacion/".$universidad."/".$alumno, 0777, true);
  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
        
         $consulta->bindParam(':archivo',$nombreArchivo,PDO::PARAM_STR);
  $consulta->execute();
  move_uploaded_file($direccion,"Renovacion/".$universidad."/".$alumno."/".$nombreArchivo);
  echo "Archivo Guardadado correctamente";
}
} catch (PDOException $ex) {
  echo $ex->getMessage();
  
}
}else
{
header("Location:../../renovacionBeca.php");
}


?>