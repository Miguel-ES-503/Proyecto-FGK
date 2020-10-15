<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
 $varsesion = $_SESSION['Email'];
 $varLugar = $_SESSION['Lugar'];
 
 error_reporting(0);
 $idReunion = $_GET['id2'];
$Universidad =$_GET['id'];



$sql = "DELETE FROM universidadreunion WHERE idreunion='$Universidad' ";
if($pdo->exec($sql)){


    $_SESSION['message'] = "Universidad Eliminada Correctamente";
    $_SESSION['message2'] = 'success';
    header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));   
}
else{
    $_SESSION['message'] = 'Fallo al eliminar la universidad';
    $_SESSION['message2'] = 'danger';
    header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));
}
