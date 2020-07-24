<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Aprobar módulos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
// include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" type="text/css" href="css/Aprobar-Modulos.css">
<div class="title">
  <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>

    <h2 class="main-title" >Aprobar/Reprobar Módulo 5</h2>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center" id="main">
  <nav class="nav flex-column" id="nav">
    <h2 class="title-1">Menu</h2>
  <a class="nav-link" href="AprobarModulos.php">Módulo C1</a>
  <a class="nav-link" href="modulo2.php">Módulo C2</a>
  <a class="nav-link" href="modulo3.php">Módulo B1</a>
  <a class="nav-link" href="modulo4.php">Modulo B2</a>
   <a class="nav-link active" href="modulo5.php" style="background-color:#BE0032; color:white;">Módulo A1</a>
    <a class="nav-link" href="modulo6.php">Módulo A2</a>
</nav>
<br>
<div class="btn" >
<a href="listadogeneral3.php" ><button class="btn btn-warning" id="button" style="border-radius: 20px;
    border: 2px solid #ffc107;
    width: 200px;height: 38px;
     background-color: #ffc107;
     color:black;">Listado general 5</button></a>

</div>

<!-- Inicio de tabla de asistencia  -->
<div class="card-body h-100 ">
      <div class="table-responsive w-100">
        <form action="Aprobartodos5.php" method="POST">  <br>
        <input type="submit" name="Aprobado" value="Aprobado" class="btn btn-primary btn-sm" style="border-radius: 20px;
    border: 2px solid #196fb0;
    width: 100px;height: 38px;
     background-color: #196fb0;
     color:white;">
        <input type="submit" name="Reprobado" value="Reprobado" class="btn btn-primary btn-sm" style="border-radius: 20px;
    border: 2px solid #196fb0;
    width: 100px;height: 38px;
     background-color: #196fb0;
     color:white;">
    <br>
      <table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
      <br>
          <thead class="table-secondary">
            <tr>
              <th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
              <th scope="col">ID Alumno</th>
              <th scope="col">Alumno</th>
              <th scope="col">Sexo</th>
              <th scope="col">Class</th>
              <th scope="col">Sede</th>
              <th scope="col">Universidad</th>
              <th scope="col">Aprobar</th>
              <th scope="col">Reprobar</th>
            </tr>
          </thead>
<tbody>
<?php
      require_once 'Modelo/ModeloModulos/ListadoModulos/listadomodulos5.php';
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
