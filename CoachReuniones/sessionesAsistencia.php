<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
      require_once '../Conexion/conexion.php';
      include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos

?>
<title>Sesiones One on One</title>

<?php
 date_default_timezone_set('America/El_Salvador');
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Sesiones One on One</h1>
<br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a>
  <br>   
<h3 class="text-left titulo-OneonOne text-white text-center" >Lista de asistencia</h3>
<p class="text-white text-center">En este aparto le colocará la asistencia a los alumnos, las opciones son: asistió o no asistió.</p>
 <div class="panel-body">
                    <div id="tablapdf" class="col-xs-5 col-sm-5 col-md-6 col-lg-6">
                    <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
        <thead class="table-secondary">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Alumno</th>
                                    <th>Sede</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Asistencia</th>
                                </tr>
                            </thead>
                            <tbody >
                              <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosReunion2.php';
          ?>
          </tbody>
                        </table>
                        </div>
                    </div>
</div>

  <br> 
<script type="text/javascript" src="js/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script>
      $("#OpenModal").click(function (e) { 
        e.preventDefault();
        $('#myModal').modal('show');
      });
    </script>

<!-- Horarios inscritos -->

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>