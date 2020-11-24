<?php
 error_reporting(0);
  header('Content-Type: text/html; charset=utf-8');
  session_start();
  @$varsesion = $_SESSION['Email'];
  @$varLugar = $_SESSION['Lugar'];
  @$varfoto = $_SESSION['Foto'];
  @$car=$_SESSION['Cargo'];
  if ($varsesion == null || $varsesion = "") {
  	header("Location: ../index.php");
  	die();
  }
  if ($car != 'Estudiante') {
  	header("Location: ../index.php");
  	die();
  }
    include("../BaseDatos/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
