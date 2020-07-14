<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Comptencia</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="title">
     <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Creación de Competencias</h2>
	<div class="title2">
	<a class="nav-link active" href="#">Competencia</a>
</div>

</div>
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<br>

<div class="card">
	<div class="card-header">
		<span class="float-left">	
			<h5 class="card-header">Competencias</h5>
		</span>
		
		<span class="float-right">	
			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
     color:white;">
				<img src="img/idea.png" width="25px" height="25px">Crear Competencia
			</button>
		</span>
	</div>
	<div class="card-body">
		

		<div class="table-responsive">
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="thead-dark">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</thead>
				<tfoot class="thead-dark">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tfoot>

				<tbody>

					<?php include 'Modelo/ModeloCompetencia/MostrarDatosCompetenciaTabla.php' ?>

				</tbody>        
			</table>  

		</div> <!--Fin de la caja responsivo de la tabla-->

	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Crear Competencia</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="Modelo/ModeloCompetencia/CrearComptencia.php" method="POST">
				<div class="modal-body">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Competencia</label>
							<input type="text" id="comptencia" name="comptencia" class="form-control" placeholder="Nombre de la competencia" required >
							
						</div>							
					</div>
					
					<center><button name="CrearCompetencia" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" value="Agregar" style="border-radius: 20px;
    border: 2px solid #BE0032;
    width: 200px;height: 38px;
     background-color: #BE0032;
     color:white;">Crear Competencia</button></center>
				</div>

				
			</form>
		</div>
	</div>
</div>



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

