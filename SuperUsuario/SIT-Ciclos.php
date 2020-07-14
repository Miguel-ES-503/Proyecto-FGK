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
	<div class="title">
    <a href="javascript:history.back();" class="icon"><img src="../img/back.png" class="icon"></a>
	<h2 class="main-title" >Creación de Ciclos</h2>
	<div class="title2">
	<a class="nav-link active" href="SIT-Ciclos.php">Ciclo</a>
</div>

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
					<center><button name="Guardar_ciclos" value="Crear Ciclo" id="Guardar_ciclos" style="border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
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
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2" style="border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
     color:white;">
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
