<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Comptencia</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<br>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Creación de Competencia</a>

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
				<a class="nav-link active " href="#">Competencia</a>
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
	<div class="card-header">
		<span class="float-left">	
			<b>Competencias</b>
		</span>
		
		<span class="float-right">	
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
				Crear Competencia
			</button>
		</span>
	</div>
	<div class="card-body">
		

		<div class="table-responsive">
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tfoot class="table-secondary">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tfoot>

				<tbody>

					<?php include 'Modelo/ModeloCompetencia/MostrarDatosCompetenciaTabla.php' ?>

				</tbody>        
			</table>  

		</div> <!--Fin de la caja responsivo de la tabla-->

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Crear Competencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="Modelo/ModeloCompetencia/CrearComptencia.php" method="POST">
				<div class="modal-body">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<br>
							<input type="text" id="comptencia" name="comptencia" class="form-control" placeholder="Nombre de la competencia" required >
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Competencia</label>
						</div>							
					</div>
					
					<input type="submit" name="CrearCompetencia" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" value="Agregar">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

