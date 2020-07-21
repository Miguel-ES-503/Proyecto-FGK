<?php

  require_once 'templates/head.php';

?>

<title>InicioAlumno</title>

<?php


//Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';


  require '../Conexion/conexion.php';
  


  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
  }
  $fechaActual=date("Y-m-d");

  $verificaFinSolicitud=$dbh->prepare("SELECT  `id_alumno`, `fechaFin`, s.Nombre FROM solicitudcambio sc JOIN status s ON sc.id_status=s.ID_Status WHERE `id_alumno`='".$alumno."' AND `fechaFin`<='".$fechaActual."'");
  $verificaFinSolicitud->execute();
  while ($fila1=$verificaFinSolicitud->fetch()) {
    // code...
    $actualizaAlumno=$dbh->prepare("UPDATE `alumnos` SET `ID_Status`='EST001' WHERE `ID_Alumno`='".$fila1['id_alumno']."'");
    $actualizaAlumno->execute();
  }

?>
<style type="text/css">
   /* Three image containers (use 25% for four, and 50% for two, etc) */
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>

  <div class="container-fluid text-center" style="background-color: white; ">


    <div class="text-center"">
    <br>
    <br>
    <div>
        <h1 style="color:#BE0032;"> Bienvenido al sistema Side by Side del Programa Oportunidades</h1>
    </div>
    <br>
   <div class="container" style="max-width: 100%">
    
    <div class="row">
  <div class="column">
    <img src="../img/foto1.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column">
    <img src="../img/foto2.jpg" alt="Forest" style="width:100%">
  </div>
  <div class="column">
    <img src="../img/foto3.jpg" alt="Mountains" style="width:100%">
  </div>
</div>

    </div>
   
    <div class="text-center">

      <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/slider1.jpg" alt="Los Angeles">
      </div>
      <div class="carousel-item">
        <img src="../img/silder2.png" alt="Chicago">
      </div>
      <div class="carousel-item">
        <img src="../img/slider3.jpg" alt="New York">
      </div>
      <div class="carousel-item">
        <img src="../img/slider4.jpg" alt="New York">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

   </div>
    </div>
    <br>
    <br>
        <div class="row" style="margin-left: 30px;">
        <div class="col-lg-11 col-md-8 col-sm-8 col-xs-12">
        <div id="novedades">
        <h3 style="text-align: left; font-weight: bold;">Novedades<h3>
        <img class="img-fluid" src="../img/novedades.png" width="100px" height="100px">
        <div style="float: right;"><p style="text-align: left;">Boletin</p>
        <img class="img-fluid" src="../img/logonegro.png" width="150px">
        </div>
            <br>
        <center><button class="btn-leer" >Leer</button></center>
        </div>
        <div id="avisos" >
        <h3  style="font-weight: bold;">Avisos<h3>
        <img class="img-fluid" src="../img/avisos.png" width="100px" height="100px">
        <div style="float: right; " ><p style="text-align: left;">Boletin:<br>
        </p></div>
        </div>
        <div id="enlaces">
        <table  >

        <h3  style="font-weight: bold;">Enlaces<h3>
        
        <tr>
        <td>
          <a href="Manual/ManualEstudiante.pdf" target="_black">
        <img class="img-fluid" src="../img/manual.png" width="100px" height="100px">
        </a>
        <td>
        <h4>Manual de usuario</h4>
        </td>
        </td>
        </tr>
        <tr>
        <td>
        <a href="http://workeysoportunidades.org/" target="_black"><img class="img-fluid" src="../img/landing.png" width="90px" height="90px">
        </td>
        <td>
        <h4>Workey's landing page</h4>
        </td>

        </tr>
        </table>
        </div>


    </div>
    
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
  </div>

<!-- /#page-content-wrapper -->




<!-- /#wrapper -->


<?php

  require_once 'templates/footer.php';

?>
