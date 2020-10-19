<?php 
require_once "../../BaseDatos/conexion.php";
try {
 $idNoti = mt_rand(10000000,99999999);
 $Tipo = "Cambio-Foto";
 $ingresar = $pdo->prepare("INSERT INTO notificaciones 
 	(Id_Remitente,Id_Receptor,Tipo,IdSolicitud) VALUES(:idUser,:idCoach,:Tipo,:idNoti)");
 $ingresar->bindParam(":idUser",$IDUser,PDO::PARAM_INT);
 $ingresar->bindParam(":idCoach",$idCoach,PDO::PARAM_INT);
 $ingresar->bindParam(":Tipo",$Tipo,PDO::PARAM_STR);
 $ingresar->bindParam(":idNoti",$idNoti,PDO::PARAM_INT);
 if ($ingresar->execute()) {
 	echo "Bien ingresado";
 }else
 {
 	echo "No ingresado";
 }

    
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>