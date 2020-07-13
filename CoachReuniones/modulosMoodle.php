<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Preguntas frecuentes</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<h1>Módulos de Moddle</h1>
<br>
<a href="javascript:history.back();" class="btn float-left"  title="Regresar" style="margin-left:5%;"><i class="fas fa-chevron-circle-left display-4"></i></a> 
<!-- botones de redirección -->
<a href="activarmodulos.php"><button type="buttom" class="btn btn-info"/>Activar Inscripción</button> </a>
<a href="AprobarModulos.php"><button type="buttom" class="btn btn-primary"/>Aprobar Módulos</button> </a>
<br><br><br>
<!-- Tabla con datos de alumnos -->
<div class="card-body">
    <div class="table-responsive">
      <br>
      <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
        <thead class="table-secondary">
          <tr> 
            <th scope="col">Carnet</th>
            <th scope="col">Alumno</th>
            <th scope="col">Class</th>
            <th scope="col">Sede</th>
            <th scope="col">Carrera</th>
            <th scope="col">Módulos Aprobados</th>
            <th scope="col">Talleres</th>
          </tr>
        </thead>
        <tbody class="w-100">
          <?php
          require_once 'Modelo/ModeloAlumno/MostrarDatosAlumnos2.php';
          ?>
        </tbody>        
      </table>  

    </div> <!--Fin de la caja responsivo de la tabla-->
  </div>
<br><br>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

