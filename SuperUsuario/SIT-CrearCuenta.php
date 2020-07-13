<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>FGK | Creación de alumnos</title>

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
		<a class="navbar-brand" href="#">Creación de cuentas</a>

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
				<a class="nav-link " href="SIT-CrearAlumno.php">Alumnos</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="SIT-CrearCuenta.php">Cuentas</a>
			</li> 

		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<div class="float-right">
	<?php include 'Modularidad/Alerta.php'?>
</div>
<!--/.Navbar-->


<div class="float-right">
<?php include 'Modularidad/AlertaCorreo.php'?>	
</div>
	
<br><br><br>
	<div class="card">
		<h5 class="card-header" style="color: black;">  
	        Cuenta Acceso
	     	<span class="float-right">	
	     		<a href="LIS-Cuentas.php">
	     			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal">
	     				<i class="fas fa-users"></i>
	     				Ver Cuentas
	     			</button>
	     		</a>
			
	     	</span>
	     </h5>	
		<div class="card-body">
			<div class="table-responsive">
				<!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
					<div class="card-body px-lg-5 pt-0" >
						<!--Inicio del Formulario-->
						<form class="text-center" action="Modelo/ModeloCuentas/GuardarCuenta.php" method="POST">	
						<br>
							<div id="alerta2"></div>
						<br>
					
						<div class="form-row">
								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<input type="email" id="CuentaCorreo" name="CuentaCorreo" class="form-control" placeholder="ejemplo@oportunidades.org.sv" required>
										<label for="materialRegisterFormFirstName">Correo electrónico</label>
									</div>
								</div>

								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre completo" required>
										<label for="materialRegisterFormFirstName">Nombre completo</label>
									</div>
								</div>
								
							</div>

							<div class="form-row">
								
								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<select type="text" id="cargo" name="cargo" class="form-control" required>
											<option value="" disabled selected >Seleccione la opción</option>
											<option value="SuperUsuario">Super Usuario</option>
											<option value="Coach Fase 2">Coach Fase 2</option>
											<option value="Coach Fase 3">Coach Fase 3</option>
											<option value="SuperVisor">Supervisor</option>
											<option value="Auxiliar">Auxiliar</option>
										</select>
										<label for="materialRegisterFormFirstName">Cargo</label>
									</div>
								</div>

								<div class="col">
										<!-- First name   Tema , fecha , la hora y el tipo de taller -->
										<div class="md-form">
											<select type="text" id="Asistencia" name="Asistencia" class="form-control" required>
										<option value="" disabled selected >Seleccione la opción</option>
										<option value="SSFT" >San Salvador</option>
										<option value="SAFT" >Santa Ana</option>
									</select>


									<label for="materialRegisterFormFirstName">Lugar de asistencia</label>
								</div>
							</div>

						</div>

						<input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Cuenta" value="Crear Cuenta" id="Guardar_Cuentas2">


						<hr>
					</form>
					<!-- Fin del Formulario -->
				</div> <!--Fin de la caja contendora Formulario-->
			</div> 

		</div> <!--Fin de la caja responsivo de la tabla-->
	</div>
</div>







	







<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>
