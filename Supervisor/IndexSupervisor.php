<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Index</title>
<style>
    
    
  

	#imginicio
	{
		height: 46em;
    margin: 15px;
		background: url(../img/SuperVisor.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;
	}


@media only screen and (max-width: 767px) {

	#imginicio {

		height: 38em;
        margin: 15px ;
        margin-right:30px;
        
		background: url(../img/SuperVisorMovil.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;

	}


}

/*@media (min-width: 768px) and (max-width: 1024px) {

	#imginicio {

		height: 30em;
        margin-right: 15px;
		background: url(SuperUserTable.png);
		background-repeat: no-repeat;

		background-size: 100% 100%;

	}*/


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

</div>
<br>
<div id="imginicio"></div>


    <?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>