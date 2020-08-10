<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Record Alumnos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos ?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Record-Alumnos.css">
<div class="title">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title" >Record de Alumnos</h2>
    <div class="title2">
        <br>
    <div class="title2-text">
    <a href="#" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Alumnos</p></a>
    
</div>
</div>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<br>
<div class="card">
	<h5 class="card-header h5 bg-light" style="color: black;">Lista general
		<a href="ReportesExcel/RecordAlumnos.php" class="float-right">
	     			<button type="button" class="btn btn-success px-3">
	     				<img src="../img/excell.png" width="25px" height="30px">
	     			Descargar
	     			</button>
	     		</a>
	</a>
	</h5>

	     			
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Interno</th>
						<th scope="col">Externo</th>
						<th scope="col">Reuniones</th>
						<th scope="col">Conteo del sistema</th>
						<th scope="col">Historico</th>
						<th scope="col">Status </th>

					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Interno</th>
						<th scope="col">Externo</th>
						<th scope="col">Reuniones</th>
						<th scope="col">Total</th>
						<th scope="col">Cantidad Talleres</th>
						<th scope="col">Status </th>		
				</tr>
			</tr>
		</tfoot>
		<tbody>
			
			<?php
			include 'Modelo/ModeloBecas/DatosRecordAlumnos.php'
			?>
			


		</tbody>        
	</table>  

</div> <!--Fin de la caja responsivo de la tabla-->

</div>
</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

