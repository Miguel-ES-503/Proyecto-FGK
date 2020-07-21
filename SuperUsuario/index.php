<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//Cambiar Despues
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Inicio Super-Usuario</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

    <div class="text-center">
      <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
      <li data-target="#demo" data-slide-to="3"></li>

    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/Super1slider.jpg">
      </div>
      <div class="carousel-item">
        <img src="img/Super2slider.jpg" >
      </div>
      <div class="carousel-item">
        <img src="img/Super3slider.jpg">
      </div>
      <div class="carousel-item">
        <img src="img/Super4slider.jpg">
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
    <div class="container">
    
    <div id="novedades">
    <h3 class="Novedad1">Novedades<h3>
    <img class="img-fluid" src="../img/novedades.png" width="100px" height="100px">
    <div style="float: right;"><p class="boletin">Boletin</p>
    <img class="img-fluid" src="../img/logonegro.png" width="150px">
    </div>
        <br>
    <center><button class="btn-leer">Leer</button></center>
    </div>
    <div id="avisos">
    <h3 class="aviso1">Avisos<h3>
    <img class="img-fluid" src="../img/avisos.png" width="100px" height="100px">
    <div style="float: right;"><p class="textoa">Boletin:<br>
    Texto de prueba </p></div>
    </div>
    <div id="enlaces">
    <table  >

    <h3  class="enlace1">Enlaces<h3>
    
    <tr>
    <td>
    <a href="Manual/ManualEstudiante.pdf"><img class="img-fluid" src="../img/manual.png" width="100px" height="100px"><a>
    <td>
    <h4>Manual de usuario</h4>
    </td>
    </td>
    </tr>
    <tr>
    <td>
    <a href="https://workeysoportunidades.org/"><img class="img-fluid" src="../img/landing.png" width="90px" height="90px">
    </td>
    <td>
    <h4>Workey's landing page</h4>
    </td>

    </tr>
    </table>
    </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
   
  </div>




<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

