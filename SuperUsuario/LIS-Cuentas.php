<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Listas De Cuentas</title>
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
<link rel="stylesheet" href="css/Competencia.css">
<div class="container-fluid text-center"> 
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
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Lista de cuentas</a>
  <a href="LIS-Alumnos.php" class="submenu1">Alumnos</a>
  <a href="LIS-Cuentas.php" class="submenu1">Cuentas</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
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


