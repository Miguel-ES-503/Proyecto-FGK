<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>FGK | Creación de alumnos</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
	

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
}
</style>
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
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>


	<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Creación de cuentas de acceso</a>
  <a href="SIT-CrearAlumno.php" class="submenu1">Alumnos</a>
  <a href="SIT-CrearCuenta.php" class="submenu1">Acceso</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="float-right">
	<?php include 'Modularidad/Alerta.php'?>
</div>
<!--/.Navbar-->


<div class="float-right">
<?php include 'Modularidad/AlertaCorreo.php'?>	
</div>
	

	<div class="card">
		<h5 class="card-header" style="color: black;">  
	        Crear Cuenta Acceso

	     	<span class="float-right">	
	     		<a href="LIS-Cuentas.php">

	     			<button type="button" id="veralumno" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
	     				<img src="img/team.png" width="25px" height="25px">
	     				Ver Cuentas
	     			</button>
	     		</a>
			
	     	</span>
	     </h5>	
		<div class="card-body">
			<h6 style="color: black;" class="float-left">Datos generales</h6><br>
				<hr>
			<div class="table-responsive">
				<!--Contenido de la caja de crear Cuentas de alumnos Formulario-->
					<div class="card-body px-lg-5 pt-0" >
						<!--Inicio del Formulario-->
						<form class="text-left" action="Modelo/ModeloCuentas/GuardarCuenta.php" method="POST">	
						<br>
							<div id="alerta2"></div>
						<br>
					
						<div class="form-row" id="Formularioacceso">
								<div class="col">
									<div class="md-form">
										<label for="materialRegisterFormFirstName">Nombre completo</label>
										<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre completo" required>
										
									</div>
								
								</div>

								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<label for="materialRegisterFormFirstName">Correo electrónico</label>
										<input type="email" id="CuentaCorreo" name="CuentaCorreo" class="form-control" placeholder="ejemplo@oportunidades.org.sv" required>
										
									</div>
									
								</div>
								
							</div>

							<div class="form-row" id="Formularioacceso1">
								
								<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<label for="materialRegisterFormFirstName">Cargo</label>
										<select type="text" id="cargo" name="cargo" class="form-control" required>
											<option value="" disabled selected >Seleccione la opción</option>
											<option value="SuperUsuario">Super Usuario</option>
											<option value="Coach Fase 2">Coach Fase 2</option>
											<option value="Coach Fase 3">Coach Fase 3</option>
											<option value="SuperVisor">Supervisor</option>
											<option value="Auxiliar">Auxiliar</option>
										</select>
										
									</div>
								</div>

								<div class="col">
										<!-- First name   Tema , fecha , la hora y el tipo de taller -->
										<div class="md-form">
											<label for="materialRegisterFormFirstName">Lugar de asistencia</label>
											<select type="text" id="Asistencia" name="Asistencia" class="form-control" required>
										<option value="" disabled selected >Seleccione la opción</option>
										<option value="SSFT" >San Salvador</option>
										<option value="SAFT" >Santa Ana</option>
									</select>


									
								</div>
							</div>

						</div>
<br>
						<center><button class="botonacceso" type="submit" name="Guardar_Cuenta" value="Crear Cuenta" id="Guardar_Cuentas2">Crear Cuenta</button></center>

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
