<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
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
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title" >Creación de Facultades</h2>
	<div class="title2" style="background-color: #9d120e">
	<a class="nav-link active" href="SIT-CrearEmpresas.php">Empresas</a>
</div>
	<div class="title21" style="background-color: #9d120e">
    <a class="nav-link" href="SIT-CrearCarrera.php">Carreras</a>
</div>
<div class="title21" style="background-color: #9d120e">
    <a class="nav-link" href="SIT-Facultades.php">Facultades</a>
</div>

</div>
	
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<!-- Comienzo del MODAL DEL FORMULARIO -->
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black;">Nueva Facultad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Modelo/ModeloFacultades/GuardarDatosFacultades.php" method="POST">
					<div id="alerta6"></div>
					<div class="col">
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black"  >Nombre de la facultad</label>
							<input type="text" id="NombreFac" name="NombreFac" class="form-control" required placeholder="Nombre completo de la facultad ">
							
						</div>
					</div>
<br>
					<center><button name="Guardar_Facultad" value="Registrar Facultad" id="Guardar_Facultad" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Registrar Facultad</button></center>
     <!--<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >-->
				</form>

			</div>
		
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->




<br>
<div class="card">
	<h5 class="card-header" style="color: black;">Lista de facultades

		<span class="float-right">	
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal2" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
				<img src="img/facultad.png" width="25px" height="25px">Nueva Facultad
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed">
				<thead class="thead-dark">
					<tr>  
						<th scope="col">#</th>
						<th scope="col">Nombre Facultadad</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tr>
			</thead>
			<tfoot class="thead-dark">
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
