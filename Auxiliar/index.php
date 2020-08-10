<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Inicio</title>

<style type="text/css">
  

	#imginicio
	{
		height: 46em;

		background: url(../img/Auxiliar.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;
	}


@media only screen and (max-width: 767px) {

	#imginicio {

		height: 38em;
        margin-right: 15px;
		background: url(../img/AuxiliarMovil.png);
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
<br>
<div id="imginicio"></div>	
<br>





<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

