<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
require_once '../Conexion/conexion.php';
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Sessiones One on One</title>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
//include 'Modularidad/MenuVertical.php';
?>
  <?php 

$count = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Pendiente' ")->fetchColumn();
$coun = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Finalizado' ")->fetchColumn();
$cound = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Disponible'")->fetchColumn();
$co = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'Asistio'")->fetchColumn();
$cou = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'No asistio'")->fetchColumn();
$coundd = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'Pendiente'")->fetchColumn();

  ?>
<link rel="stylesheet" type="text/css" href="css/Sesiones-ONE.css">
<div class="title">
     <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Sesiones One on One</h2>
</div>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Sesiones One on One Finalizadas</h1>

<br>
  <div class="mx-auto" style="width:85%"> 
  <br>
  <h2 class="text-center text-dark">Estadísticas</h2>
  <ul class="list-group">
    <div class="row">
        <li class="list-group-item d-flex justify-content-between align-items-center"  style="width: 33.3%;">
    Cantidad de alumnos inscritos:
    <span class="badge badge-primary badge-pill"><?php echo $count; ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 33.3%;">
    Cantidad de sesiones finalizadas:
    <span class="badge badge-primary badge-pill"><?php echo $coun; ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 33.3%;">
    Cantidad de cupos disponibles
    <span class="badge badge-primary badge-pill"><?php echo $cound; ?></span>
  </li>
    
       <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 33.3%;" >
    Cantidad de alumnos con asistencia
    <span class="badge badge-primary badge-pill"><?php echo $co; ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 33.3%;">
    Cantidad de alumnos sin asistencia
    <span class="badge badge-primary badge-pill"><?php echo $cou; ?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center" style="width: 33.3%;">
    Asistencia pendiente
    <span class="badge badge-primary badge-pill"><?php echo $coundd; ?></span>
  </li>
    </div>
</ul>

<br>

<div class="bg-dark w-100 mx-auto rounded">
                    <div id="tablapdf">
                    <table  id="example" class="table table-hover table-sm table-bordered table-fixed w-100" >
        <thead class="table-secondary">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Alumno</th>
                                    <th>Sede</th>
                                    <th>Asistencia</th>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                </tr>
                            </thead>
                        <tbody>
                              <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosReunion3.php';
          ?>
          </tbody>
          </table>
          </div>
                        </div>
                        </div>
                    </div>
                    
</div>
  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Horarios inscritos -->

<?php

//Incluir el footer
include 'Modularidad/PiePagina.php';
?>