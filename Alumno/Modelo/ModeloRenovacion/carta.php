<?php 
if (isset($_POST['subirCarta']))
{

try {
  require_once "../../../BaseDatos/conexion.php";
$nombreArchivo=$_FILES["archivo"]["name"];
$direccion= $_FILES["archivo"]["tmp_name"];
$ciclo=$_POST['ciclo'];
$year=date("Y");
$alumno=$_POST['alumno'];
$tipoarchivo = $_FILES["archivo"]["type"];
$tama«Ðoarchivo = $_FILES["archivo"]["size"];
$rutaarchivo=$_FILES["archivo"]["tmp_name"];
$universidad=$_POST['uni'];


$numero = rand(1, 10000000);


$idRenovacion = "RN-".$numero;




if (file_exists("../../../CoachReuniones/Renovaciones/".$universidad."/".$alumno)) {

  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
         
         $consulta->bindParam(':archivo',$nombreArchivo,PDO::PARAM_STR);

  $consulta->execute();
  move_uploaded_file($direccion,"../../../CoachReuniones/Renovaciones/".$universidad."/".$alumno."/".$nombreArchivo);
  header("Location:../../renovacionBeca.php?ntf=Exito");
}else{
  mkdir("../../../CoachReuniones/Renovaciones/".$universidad."/".$alumno, 0777, true);
  $consulta=$pdo->prepare("INSERT INTO renovacion(idRenovacion,ID_Alumno,ciclo,año,archivo)
    VALUES(:idRenovacion,:ID_Alumno,:ciclo,Date_format(now(),'%Y'),:archivo)");
         $consulta->bindParam(':idRenovacion',$idRenovacion,PDO::PARAM_STR);
         $consulta->bindParam(':ID_Alumno',$alumno,PDO::PARAM_STR);
         $consulta->bindParam(':ciclo',$ciclo,PDO::PARAM_INT);
        
         $consulta->bindParam(':archivo',$nombreArchivo,PDO::PARAM_STR);
  $consulta->execute();
move_uploaded_file($direccion,"../../../CoachReuniones/Renovaciones/".$universidad."/".$alumno."/".$nombreArchivo);
  header("Location:../../renovacionBeca.php?ntf=Exito");
}
} catch (PDOException $ex) {
  echo $ex->getMessage();
  
}
}else
{
header("Location:../../renovacionBeca.php?ntf=Error");
}


?>