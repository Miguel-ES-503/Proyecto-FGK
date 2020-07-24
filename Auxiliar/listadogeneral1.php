<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Aprobar módulos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
//include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">
<div class="title">
  <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>

    <h2 class="main-title" >Aprobar/Reprobar Módulos</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main">
  <nav class="nav flex-column" id="nav">
    <h2 class="title-1">Menu</h2>
<a class="nav-link active" href="AprobarModulos.php" style="background-color:#BE0032; color:white;">Módulo C1</a>
<a class="nav-link" href="modulo2.php">Módulo C2</a>
  <a class="nav-link" href="modulo3.php">Módulo B1</a>
  <a class="nav-link" href="modulo4.php">Modulo B2</a>
   <a class="nav-link" href="modulo5.php">Módulo A1</a>
    <a class="nav-link" href="modulo6.php">Módulo A2</a>
</nav>
<br>
<div class="btn" >

  <a href="Reportes/ReporteModulo1.php" target="_blank" ><button class="btn btn-danger" id="button"><img src="../img/PDF.png">Descargar</button></a>

  <a href="ReportesExcel/ReporteModulo1.php" class="float-left"  ><button class="btn btn-success" id="button"><img src="../img/excell.png">Descargar</button></a>
</div>

<!-- Inicio de tabla de asistencia  -->
    <div class="card-body">
      <div class="table-responsive">
        <form action="Aprobartodos.php" method="POST">
     <!--  <span class="float-left">
   <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm">  -->
       
      </span>

      <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
      <br>
          <thead class="table-secondary">
            <tr>
              <th scope="col">ID Alumno</th>
              <th scope="col">Alumno</th>
              <th scope="col">Sexo</th>
              <th scope="col">Class</th>
              <th scope="col">Universidad</th>
              <th scope="col">Estado</th>
              <th scope="col">Estado Certificación</th>
            </tr>
          </thead>
<tbody>
<?php
    require_once 'Modelo/ModeloModulos/ListadoGeneral/listageneral1.php';

?>
        </tbody>
      </table>
</form>
    </div>
  </div>

</div>
<script type="text/javascript">

  $("#todos").on("click", function() {
    $(".case").prop("checked", this.checked);
  });

            // if all checkbox are selected, check the selectall checkbox and viceversa
            $(".case").on("click", function() {
              if ($(".case").length == $(".case:checked").length) {
                $("#todos").prop("checked", true);
              } else {
                $("#todos").prop("checked", false);
              }
            });
        </script>
        <div class="footer-copyright text-center py-3" style="background: black;margin-top:30%;">
                  <img class="img-fluid" src="../img/funda.png" width="60px">
                  </img>
                  <img class="img-fluid" src="../img/logoblanco2.png" style="margin-left:30px;"></img>
                  <span style="margin-right:50px; margin-left:50px; color:white; font-size: 18px;">© 2020 Copyright: Pograma Oportunidades</span>
                  <span style="color: white; font-weight: bold; font-size: 18px;">Contáctanos:</span><a href="https://www.facebook.com/exalumnos.ccgk"><img class="img-fluid" src="../img/facebook.png" style="margin-left:30px; width:60px;"></img></a>
                  <a href="https://instagram.com/bk2oportunidades?igshid=4rmcd55eld5h"><img class="img-fluid" src="../img/instagram.png" style="margin-left:30px; width:60px;"></a></img>

          </div>

