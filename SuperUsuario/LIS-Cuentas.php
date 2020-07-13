<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Listas De Cuentas</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center"> <br>	
<!--Navbar-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

	<!-- Navbar brand -->
	<a class="navbar-brand" href="#">Listas Cuentas</a>
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
			<a class="nav-link" href="LIS-Alumnos.php">Alumnos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="LIS-Cuentas.php">Cuentas</a>
		</li> 

	</ul>
	<!-- Links -->   
</div>
<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>
<br><br>
	<div class="card">
		<h5 class="card-header" style="color: black;">Administradores de <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}   ?>
	    
	     	<span class="float-right">	
	     		<a href="SIT-CrearCuenta.php">
	     			<button type="button" class="btn btn-danger px-3">
	     				<i class="fas fa-users" aria-hidden="true"></i>
	     				Crear Cuentas
	     			</button>
	     		</a>
	     	</span>
	     </h5>	
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
					<thead class="table-secondary">
						<tr>  
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Lugar</th>
							<th scope="col">Cargo</th>
							<th scope="col">Actualizar</th>
							<th scope="col">Elimnar</th>
						</tr>
					</thead>
					<tfoot class="table-secondary">
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Lugar</th>
							<th scope="col">Cargo</th>
							<th scope="col">Actualizar</th>
							<th scope="col">Elimnar</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						require_once 'Modelo/ModeloCuentas/MostrarDatosCuentas.php';
						?>


					</tbody>        
				</table>  

			</div> <!--Fin de la caja responsivo de la tabla-->

		</div>
	</div>
	<br>
	<div class="card">
		<h5 class="card-header" style="color: black;">Alumnos de  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}   ?>
	    
	     	<span class="float-right">	
	     		<a href="">
	     			<button type="button" class="btn btn-danger px-3">
	     				<i class="fas fa-users" aria-hidden="true"></i>
	     				Crear Alumnos
	     			</button>
	     		</a>
	     	</span>
	     </h5>	
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table  id="example2" class="table table-hover table-sm table-bordered table-fixed" >
					<thead class="table-secondary">
						<tr>  
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Sede</th>
							<th scope="col">Asistencia</th>
							<th scope="col">Cargo</th>
						</tr>
					</thead>
					<tfoot class="table-secondary">
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Sede</th>
							<th scope="col">Asistencia</th>
							<th scope="col">Cargo</th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						require_once 'Modelo/ModeloCuentas/MostrarDatosAlumnos.php';
						?>
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


