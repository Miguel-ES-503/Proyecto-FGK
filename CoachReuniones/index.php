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
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid">
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
        <img src="../SuperUsuario/img/Super1slider.jpg">
      </div>
      <div class="carousel-item">
        <img src="../SuperUsuario/img/Super2slider.jpg" >
      </div>
      <div class="carousel-item">
        <img src="../SuperUsuario/img/Super3slider.jpg">
      </div>
      <div class="carousel-item">
        <img src="../SuperUsuario/img/Super4slider.jpg">
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





<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

