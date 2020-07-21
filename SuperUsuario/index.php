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
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<div class="container-fluid text-center" id="movil">
    <br>
    <br>

     <div>
        <h1 style="color:#BE0032;"> Bienvenido al sistema Side by Side del Programa Oportunidades</h1>
    </div>
    <br>
   <div class="container" style="max-width: 100%">
    
    <div class="row">
  <div class="column">
    <img src="img/foto1.jpg" alt="Snow" style="width:100%">
  </div>
  <div class="column">
    <img src="img/foto2.jpg" alt="Forest" style="width:100%">
  </div>
  <div class="column">
    <img src="img/foto3.jpg" alt="Mountains" style="width:100%">
  </div>
</div>

    </div>
   

   
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/Super1slider.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Super2slider.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Super3slider.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    <br>
    <br>
    <div class="container">
    
    <div id="novedades">
    <h3 class="Novedad1">Novedades<h3>
    <img class="img-fluid" src="../img/novedades.png" width="100px" height="100px" id="imagen1">
    <div style="float: right;"><p class="boletin">Boletin</p>
    <img class="img-fluid" src="../img/logonegro.png" width="150px" id="imagen2">
    </div>
        <br>
    <center><button class="btn-leer">Leer</button></center>
    </div>
    <div id="avisos">
    <h3 class="aviso1">Avisos<h3>
    <img class="img-fluid" src="../img/avisos.png" width="100px" height="100px" id="imagen3">
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
    <h4 class="titulo1">Manual de usuario</h4>
    </td>
    </td>
    </tr>
    <tr>
    <td>
    <a href="https://workeysoportunidades.org/"><img class="img-fluid" src="../img/landing.png" width="90px" height="90px">
    </td>
    <td>
    <h4  class="titulo1">Workey's landing page</h4>
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
   <br>
  </div>
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



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

