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

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<br>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Record  de alumnos</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
		aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<!-- Collapsible content -->
	<div class="collapse navbar-collapse" id="basicExampleNav">

		<!-- Links -->
		<ul class="navbar-nav mr-auto">
			
			<li class="nav-item">
				<a class="nav-link active " href="#">Alumnos</a>
			</li>			
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<br>
<div class="card">
	<h5 class="card-header h5 bg-light" style="color: black;">Lista general
		<a href="ReportesExcel/RecordAlumnos.php" class="float-right">
		<button type="button" class="btn btn-success px-3">
			<i class="fas fa-arrow-circle-down"></i>

		</button>
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
						<th scope="col">Status Certifición</th>

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
						<th scope="col">Status Certifición</th>		
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

