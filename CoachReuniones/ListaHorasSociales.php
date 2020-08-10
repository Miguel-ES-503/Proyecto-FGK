<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>

<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<title>Lista de reuniones</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/horas-sociales.main.css">
<br>
<div class="title general-text">
    <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title title-111" >Horas Sociales</h2>
    <div class="title2">
    <div class="title2-text">
    <a href="HorasVinculacion.php" class="text-decoration-none"><p><img src="../img/Ver.png" class="icon-2">Solicitudes</p></a>
</div>
</div>
    <div class="title3">
    <div class="title3-text">
    <a href="ListaHorasSociales.php" class="text-decoration-none title-222" ><p><img src="../img/Ver.png" class="icon-2">Lista General</p></a>
    
</div>
</div>
</div>
<br class="salto">
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<br>
<br>
<br class="salto">
<br class="salto">
<div class="card">
	<div class="card-header">
		<b>Solicitudes</b>	
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed " >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">ID Solicitud</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Universidad</th>
						<th scope="col">Ciclo</th>
						<th scope="col">Estado</th>
						<th scope="col">Ver</th>
					</tr>
				</thead>
				<tfoot class="table-secondary">
					<tr>
						<th scope="col">ID Solicitud</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Universidad</th>
						<th scope="col">Ciclo</th>
						<th scope="col">Estado</th>
						<th scope="col">Ver</th>
					</tr>
				</tfoot>
				<tbody>
					<?php include 'Modelo/ModeloHorasSociales/MostrarTodosSolicitudes.php' ?>
				</tbody>        
			</table>  

		</div> <!--Fin de la caja responsivo de la tabla-->
	</div>
</div>
<br>



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

