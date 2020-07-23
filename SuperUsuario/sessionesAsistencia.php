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
// include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Sesiones-ONE.css">
<div class="title">
     <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Sesiones One on One</h2>
</div>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center ">
<br>
<h1>Sesiones One on One</h1> 
<div class="bg-dark w-75 mx-auto rounded">
<h3 class="text-left titulo-OneonOne text-white text-center" >Lista de asistencia</h3>
<p class="text-white text-center">En este aparto le colocará la asistencia a los alumnos, las opciones son: asistió o no asistió.</p>

 <div class="col-xs-4 col-sm-4 col-md-12 col-lg-12">
                    <div id="tablapdf">
                    <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
        <thead class="table-secondary">
                                <tr>
                                    <th>Titulo</th>
                                    <th>Alumno</th>
                                    <th>Sede</th>
                                    <th>Sexo</th>
                                    <th>Universidad</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Asistió</th>
                                    <th>No Asistió</th>
                                </tr>
                            </thead>
                        <tbody>
                              <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosReunion2.php';
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