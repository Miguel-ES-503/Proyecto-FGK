<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
require_once '../Conexion/conexion.php';
?>
<title>Sessiones One on One</title>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
  <?php 

$count = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Pendiente' ")->fetchColumn();
$coun = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Finalizado' ")->fetchColumn();
$cound = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado = 'Disponible'")->fetchColumn();
$co = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'Asistio'")->fetchColumn();
$cou = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'No asistio'")->fetchColumn();
$coundd = $dbh->query("SELECT count(*) FROM one_on_one WHERE estado_alumno = 'Pendiente'")->fetchColumn();

  ?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Sesiones One on One Finalizadas</h1>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar"><i class="fas fa-chevron-circle-left display-4"></i></a>
<br>
  <div class="mx-auto" style="width:85%"> 
  <br>
  <h2 class="text-center text-white">Estadísticas</h2>
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
    </div>
    <div class="row">
       <li class="list-group-item d-flex justify-content-between align-items-center" >
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
 <div class="panel-body">
                    <div id="tablapdf" class="sessiones overflow-auto " >
                        <table class="table table-bordered-sm " id="datatable2" >
                            <thead class="table-dark">
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
                        </table>
                        </div>
                    </div>
</div>
  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Horarios inscritos -->
<script type="text/javascript">
$(document).ready(function(){
      fill_datatable();
      fill_datatable2();    
      function fill_datatable(year = '')
      {
       var dataTable = $('#datatable2').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No hay sesiones One on One disponibles",
            "info": "Mostrando página  _PAGE_ de _PAGES_",
            "infoEmpty": "Registros no encontrados",
            "infoFiltered": "(filtrados  _MAX_  registros del total)",
            "search": "Buscar",
            "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior",
        "sProcessing":     "Procesando...",
        "sLoadingRecords": "Cargando..."
    },
        },
        "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
        "processing" : true,
        "serverSide" : true,
        "order" : [],
        "searching" : true,
        "ajax" : {
         url:"fech4.php",
         type:"POST",
         data:{
          year:year
         }
        }
       });
      }
  });
  </script>
<?php

//Incluir el footer
include 'Modularidad/PiePagina.php';
?>