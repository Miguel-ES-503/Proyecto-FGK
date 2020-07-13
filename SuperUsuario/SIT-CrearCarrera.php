<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Crear Carreras</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<br>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid ">
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Creación de carrera</a>

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
				<a class="nav-link " href="SIT-CrearEmpresas.php">Empresas</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="SIT-CrearCarrera.php">Carreras</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="SIT-Facultades.php">Facultades</a>
			</li> 

		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<div class="float-right">
<?php include 'Modularidad/AlertaCorreo.php'?>	
</div>
<!-- Comienzo del MODAL DEL FORMULARIO -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black">Nueva carrera</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<form action="Modelo/ModeloCarrera/GuardarDatosCarreras.php" method="POST" accept-charset="utf-8">
					<div id="alerta5"></div>
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="text" id="NomCarr" name="NomCarr" class="form-control" placeholder="Nombre completo de la carrera" required>
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de Carrera</label>
						</div>

						<div class="md-form">
							<select id="Faculta" name="Faculta" class="form-control" required >
								<?php     
								echo '<option value="" disabled selected >Seleccione la opción</option>';
								foreach($pdo->query('SELECT IDFacultates,Nombre FROM facultades') as $row) 
								{
									echo '<option value="'.$row['IDFacultates'].'">'.utf8_encode($row['Nombre']).'</option>';
								}
								echo '</select>';
								?>

							</select>

							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Facultad</label>
						</div>
					</div>


					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<select id="duracion" name="duracion" class="form-control" required>
								<option value="" disabled selected >Seleccione la opción</option>
								<option value="Corta Duración">Corta Duración</option>
								<option value="Larga Duración">Larga Duración</option>
							</select>
							<label for="materialRegisterFormFirstName" style="color: black" >Duración Carrera</label>
						</div>
					</div>
					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Carrera" value="Crear Carrera" id="Guardar_Carrera">
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
	<h5 class="card-header h5 bg-light" style="color: black;"> Lista de carreras 

		<span class="float-right">	
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2">
				<i class="fas fa-book"></i>
				 Nueva Carrera
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr>  
						<th scope="col">Codigo</th>
						<th scope="col">Carrera</th>
						<th scope="col">Duración</th>
						<th scope="col">Facultadad</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
					<th scope="col">Codigo</th>
					<th scope="col">Carrera</th>
					<th scope="col">Duración</th>
					<th scope="col">Facultadad</th>
					<th scope="col">Actualizar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</tr>
		</tfoot>
		<tbody>
			<?php
			require_once 'Modelo/ModeloCarrera/MostrarDatosCarreras.php';
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

