<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Ciclos</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center ">
	<br>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Creación de ciclos</a>

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
				<a class="nav-link active " href="SIT-Ciclos.php">Ciclo</a>
			</li>			
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<!-- Comienzo del MODAL DEL FORMULARIO -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin: 10px;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:black">Nuevo Ciclo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Modelo/ModeloCiclos/GuardarCiclo.php" method="POST">
					<div id="alerta9"></div>
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="text" id="idciclo" name="idciclo" class="form-control" placeholder="00-0000" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Actual</label>
						</div>							
					</div>


					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Inicio</label>
						</div>

						
						

						<div class="md-form">
							<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Final</label>
						</div>

						
					</div>
					
					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_ciclos" value="Crear Ciclo" id="Guardar_ciclos">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->

<br>
<div class="card">
		<h5 class="card-header h5 bg-light" style="color: black;">Lista de Ciclos

		<span class="float-right">	
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2">
				<i class="fas fa-university"></i>
				Crear Ciclo
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">Ciclo</th>
						<th scope="col">Fecha de Inicio</th>
						<th scope="col">Fecha Final</th>
						<th scope="col">Actualizar</th>
						
					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
					<th scope="col">Ciclo</th>
					<th scope="col">Fecha de Inicio</th>
					<th scope="col">Fecha Final</th>
					<th scope="col">Actualizar</th>
				</tr>
			</tr>
		</tfoot>
		<tbody>
			<?php
			include 'Modelo/ModeloCiclos/MostrarDatosCiclos.php'
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
