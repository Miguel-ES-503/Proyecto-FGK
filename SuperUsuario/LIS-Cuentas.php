<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
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
<link rel="stylesheet" href="css/Competencia.css">
<div class="container-fluid text-center"> 

	<div class="title">

		<a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
		<h2 class="main-title" >Lista de Cuentas</h2>

		<div class="title2" style="background-color: #9d120e">
			<a class="nav-link active" href="LIS-Alumnos.php">Alumnos</a>
		</div>

		<div class="title2" style="background-color: #9d120e">
			<a class="nav-link" href="LIS-Cuentas.php" >Cuentas</a>
		</div>
	</div>

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>


<br><br><br><br>
	<div class="card">
		<h5 class="card-header" style="color: black;">Administradores de <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}   ?>
	    
	     	<span class="float-right">	
	     		<a href="SIT-CrearCuenta.php">
	     			<button type="button" class="btn btn-danger px-3" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
	     				<img src="img/team.png" width="20px" height="20px">
	     				Crear Cuentas
	     			</button>
	     		</a>
	     	</span>
	     </h5>	
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
					<thead class="thead-dark">
						<tr>  
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Lugar</th>
							<th scope="col">Cargo</th>
							<th scope="col">Actualizar</th>
							<th scope="col">Elimnar</th>
						</tr>
					</thead>
					<tfoot class="thead-dark">
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
	     		<a href="SIT-CrearAlumno.php">
	     			<button type="button" class="btn btn-danger px-3" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
	     				<img src="img/team.png" width="20px" height="20px" >
	     				Crear Alumnos
	     			</button>
	     		</a>
	     	</span>
	     </h5>	
		<div class="card-body">
			<div class="table-responsive">
				<br>
				<table  id="example2" class="table table-hover table-sm table-bordered table-fixed" >
					<thead class="thead-dark">
						<tr>  
							<th scope="col">Nombre</th>
							<th scope="col">Correo</th>
							<th scope="col">Sede</th>
							<th scope="col">Asistencia</th>
							<th scope="col">Cargo</th>
						</tr>
					</thead>
					<tfoot class="thead-dark">
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


