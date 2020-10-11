<?php

require_once "../../../BaseDatos/conexion.php";
$idEmpresa = $_POST['idempresa'];
$idReunion = $_POST['idReunion'];
 $idEmpresa;
 $idReunion;
 session_start();  
 $varsesion = $_SESSION['Email'];
 $varLugar = $_SESSION['Lugar'];
 
 error_reporting(0);
 
$sql = "INSERT INTO universidadreunion (ID_Reunion, ID_Empresa) VALUES (?,?)";
$stmt= $pdo->prepare($sql);

if($stmt->execute([$idReunion, $idEmpresa])){
 
    $_SESSION['message'] = 'Universidad Agregada correctamente';
    $_SESSION['message2'] = 'success';
    header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));   
}
else{
    $_SESSION['message'] = 'Fallo al agregar la universidad';
    $_SESSION['message2'] = 'danger';
    header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));
}
?>