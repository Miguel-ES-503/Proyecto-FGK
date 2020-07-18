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
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<div class="title">
  <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Modulos de Moodle</h2>
    <div class="title2">
</div>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main-inicio">
<!-- botones de redirección -->
<div class="buttons">
  <a href="activarmodulos.php"><button type="buttom" class="btn btn-danger"/><img src="../img/add.png" class="icon2">Activar Inscripción</button> </a>
<a href="AprobarModulos.php"><button type="buttom" class="btn btn-success"/><img src="../img/add.png" class="icon2">Aprobar Modulos</button> </a>
</div>

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
            <th scope="col">Sexo</th>
            <th scope="col">Class</th>
            <th scope="col">Sede</th>
            <th scope="col">Carrera</th>
            <th scope="col">Talleres</th>
            <th scope="col">Módulos Aprobados</th>
            <th scope="col">Estado Certificación</th>
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

