<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Facultades</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
	<!--Navbar-->
	<br>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Creación de facultades</a>

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
				<a class="nav-link" href="SIT-CrearEmpresas.php">Empresas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="SIT-CrearCarrera.php">Carreras</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="SIT-Facultades.php">Facultades</a>
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
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black;" >Nuevo Facultad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Modelo/ModeloFacultades/GuardarDatosFacultades.php" method="POST">
					<div id="alerta6"></div>
					<div class="col">
						<div class="md-form">
							<input type="text" id="NombreFac" name="NombreFac" class="form-control" required placeholder="Nombre de la facultad completo">
							<label for="materialRegisterFormFirstName" style="color: black"  >Nombre de la facultad</label>
						</div>
					</div>

					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Facultad" value="Registrar Facultad" id="Guardar_Facultad">
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
	<h5 class="card-header h5 bg-light" style="color: black;">Lista de facultades 

		<span class="float-right">	
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2">
				<i class="fas fa-briefcase"></i>
				Nuevo Facultdad
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">#</th>
						<th scope="col">Nombre Facultadad</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre Facultadad</th>
					<th scope="col">Actualizar</th>
					<th scope="col">Eliminar</th>>
				</tr>
			</tr>
		</tfoot>
		<tbody>
			<?php
			require_once 'Modelo/ModeloFacultades/MostrarDatosFacultades.php';
			?>

		</tbody>        
	</table>  

</div> <!--Fin de la caja responsivo de la tabla-->

</div>
</div>

<br><br>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
