<?php
include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
//Modularidad para inicializar el Head y <!DOCTYPE html>
// 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Crear Empresas</title>

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
	<h2 class="main-title" >Creación de Empresas</h2>
	<div class="title2">
	<a class="nav-link active" href="SIT-CrearEmpresas.php">Empresas</a>
</div>
	<div class="title21">
    <a class="nav-link" href="SIT-CrearCarrera.php">Carrera</a>
</div>
<div class="title21">
    <a class="nav-link" href="SIT-Facultades.php">Facultades</a>
</div>

</div>
	
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>

<!-- Comienzo del MODAL DEL FORMULARIO -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black">Nueva Empresa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="alerta3"></div>

				<!--Creación de empresas-->
				<form action="Modelo/ModeloEmpresas/GuadarEmpresas.php" method="POST">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre Empresa</label>
							<input type="text" id="NombreEmpresa" name="NombreEmpresa" class="form-control" placeholder="Nombre completo de la empresa" required >
							
						</div>
					</div>

					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Descripción</label>
							<select id="opciones" name="opciones" class="form-control" required>
								<option value="" disabled selected >Seleccione la opción</option>
								<option value="Universidad">Universidad</option>
								<option value="Empresa Externa">Empresa Externa</option>
								<option value="Oportunidades">Oportunidades</option>
								

							</select>
							
						</div>
					</div>
<br>
		<center><button name="Guardar_Datos" value="Crear Empresa" id="Guardar_Datos" class="crearempresa">Crear Empresa</button></center>
    <!--<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >-->

				</form>

			</div>
			
		</div>
	</div>
</div>
<!-- FIN DEL MODAL -->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" name="" id="Codigo" placeholder="">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>


<br>
<div class="card">
	<h5 class="card-header style="color: black;">Empresas 

		<span class="float-right">	
			<button type="button" class="btn btn-danger px-3" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid;width: 200px;height: 38px;"><img src="img/company.png" width="30px" height="25px">
				
				Nueva Empresa
			</button>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="thead-dark">
					<tr>  
						<th scope="col">Sigla</th>
						<th scope="col">Empresa</th>
						<th scope="col">Tipo</th>
						<th scope="col">Actualizar</th>
						<th scope="col">Eliminar</th>
					</tr>
				</tr>
			</thead>
			<tfoot class="thead-dark">
				<tr>
					<th scope="col">Sigla</th>
					<th scope="col">Empresa</th>
					<th scope="col">Tipo</th>
					<th scope="col">Actualizar</th>
					<th scope="col">Eliminar</th>
				</tr>
			</tr>
		</tfoot>
		<tbody>
			<?php
			require_once 'Modelo/ModeloEmpresas/MostrarDatos.php';
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

