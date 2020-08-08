<?php 
  session_start();  
  @$varsesion = $_SESSION['Email'];
  @$varLugar = $_SESSION['Lugar'];
  @$VarFoto = $_SESSION['Foto'];
  @$varNombre = $_SESSION['Nombre'];
  @$varCargo= $_SESSION['Cargo'];
  
  $InicialDep = $varLugar [0]; // Extraemos la primera letra
  $FinalDep = $varLugar [1]; // Extraemos la segunda letra

  $ubicacion = $InicialDep . $FinalDep;

  error_reporting(0);
  if ($varsesion == null || $varsesion = "") {
  	header("Location: ../index.php");
  	die();
  }


   if ($varCargo != 'SuperUsuario') {
    header("Location: ../index.php");
    die();
  }
  if (isset($_SESSION['Email'])){
  }else{
  header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
   die() ;
  
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../img/WorkeysIcon.png" />
