<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>

<title>Competencias por mes</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--****************************************Comiezo de estructura de trabajo *************************-->

<div class="container-fluid text-center">

</div>

<!--*****************************************Finaliza estrucutra de trabajo ************************************-->


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>