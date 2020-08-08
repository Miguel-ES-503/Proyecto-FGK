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
  if (isset($_SESSION['Email'])){
    $varsesion = $_SESSION['Email'];
}else{
header('Location: ../index.php');//Aqui lo redireccionas al lugar que quieras.
 die() ;

}

  // if ($varsesion == null || $varsesion = "") {
  // 	header("Location: ../index.php");
  // 	die();
  // }


  //  if ($varCargo != 'Coach Fase 3') {
  //   header("Location: ../index.php");
  //   die();
  // }

   if ($varCargo != 'Coach Fase 2') {
    header("Location: ../login.php");
    die();
  }
  if (isset($_SESSION['Email'])){
  }else{
  header('Location: ../login.php');//Aqui lo redireccionas al lugar que quieras.
   die() ;
  
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
