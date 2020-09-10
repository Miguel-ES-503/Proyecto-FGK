<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Ciclos</title>
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
<link rel="stylesheet" href="css/Competencia.css">
<!--Comiezo de estructura de trabajo -->
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
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Creación de Ciclos</a>
  <a href="SIT-Ciclos.php" class="submenu1">Ciclo</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

	
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
							<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Actual</label>
							<input type="text" id="idciclo" name="idciclo" class="form-control" placeholder="00-0000" required>
							
						</div>							
					</div>


					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Inicio</label>
							<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" required>
							
						</div>

						
						

						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Fecha Final</label>
							<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" required>
							
						</div>

						
					</div>
					<br>
					<center><button name="Guardar_ciclos" value="Crear Ciclo" id="Guardar_ciclos" class="boton" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Crear Ciclo</button></center>
     <!--<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">-->
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->

<br>
<div class="card">
		<h5 class="card-header" style="color: black; font-weight: bold">Lista de Ciclos

		<span class="float-right">	
			<br>
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white; text-align">
				<img src="img/facultad.png" width="25px" height="25px">
				Crear Ciclo
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="thead-dark">
					<tr>  
						<th scope="col">Ciclo</th>
						<th scope="col">Fecha de Inicio</th>
						<th scope="col">Fecha Final</th>
						<th scope="col">Actualizar</th>
						
					</tr>
				</tr>
			</thead>
			<tfoot class="thead-dark">
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
