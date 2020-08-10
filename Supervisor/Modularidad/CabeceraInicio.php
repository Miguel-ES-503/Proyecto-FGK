<?php 
  session_start();  
  $varsesion = $_SESSION['Email'];
  $varLugar = $_SESSION['Lugar'];
  $VarFoto = $_SESSION['Foto'];
   $car=$_SESSION['Cargo'];
  $InicialDep = $varLugar [0]; // Extraemos la primera letra
  $FinalDep = $varLugar [1]; // Extraemos la segunda letra
  $varNombre = $_SESSION['Nombre'];
  $ubicacion = $InicialDep . $FinalDep;

  error_reporting(0);
  if ($varsesion == null || $varsesion = "") {
  	header("Location: ../login.php");
  	die();
  }
if ($car != 'SuperVisor') {
    header("Location: ../login.php");
    die();
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
