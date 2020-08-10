<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Inicio Coach Reunión</title>

<style type="text/css">


	#imginicio
	{
		height: 46em;

		background: url(../img/coachreunion.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;
	}


@media only screen and (max-width: 767px) {

	#imginicio {

		height: 38em;
        margin-right: 15px;
		background: url(../img/coachreunionmovil.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;

	}


}
</style>
<?php

include 'Modularidad/EnlacesCabecera.php';
include 'Modularidad/MenuHorizontal.php';

?>
<title>Inicio Coach-Reunión</title>
<!--
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
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
    <div class="carousel-item">
      <img class="d-block w-100" src="img/Super4slider.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<br>
<br>

-->





















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
<br>
<div class="container-fluid text-center">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
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
        <div class="carousel-item">
      <img class="d-block w-100" src="img/foto3.jpeg" alt="Fourth slide" style="height: 520px;">
    </div>
            <div class="carousel-item">
      <img class="d-block w-100" src="img/foto2.jpeg" alt="Fifth slide" style="height: 520px;">
    </div>
            <div class="carousel-item">
      <img class="d-block w-100" src="img/foto1.jpeg" alt="Sixth slide" style="height: 520px;">
    </div>
  </div>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



    <br>
    <br>
    <div class="row">

    <div id="novedades" class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
    <h3 class="Novedad1">Novedades<h3>
    <img class="img-fluid" src="../img/novedades.png" width="100px" height="100px">
    <div style="float: right;"><p class="boletin">Boletin</p>
    <img class="img-fluid" src="../img/logonegro.png" width="150px">
    </div>
        <br>
    <center><button class="btn-leer">Leer</button></center>
    </div>
    <div id="avisos" class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
    <h3 class="aviso1">Avisos<h3>
    <img class="img-fluid" src="../img/avisos.png" width="100px" height="100px">
    <div style="float: right;"><p class="textoa">Boletin:<br>
    Texto de prueba </p></div>
    </div>
    <div id="enlaces" class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
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
   <br>
  </div>
<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
