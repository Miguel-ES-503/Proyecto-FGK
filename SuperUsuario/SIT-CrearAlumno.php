<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>


<title>FGK | Creación de alumnos</title>
<link rel="stylesheet" type="text/css" href="css/estiloIndexSuperU.css">
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

<div class="container-fluid " style="text-align: center;">
	    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>



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


<!--NOTA: IMPORTANTE
CAMBIAR MENU, CONSULTAR-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<div class="text-justify">
 
<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Creación de cuentas</a>
  <a href="SIT-CrearAlumno.php" class="submenu1">Alumnos</a>
  <a href="SIT-CrearCuenta.php" class="submenu1">Acceso</a>
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<div class="float-right">
<?php include 'Modularidad/AlertaCorreo.php'?>	
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color: black;" >Subir lista de alumnos</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form method="post" id="addproduct" action="ImportarArchivo/importAlumno.php" enctype="multipart/form-data" role="form">

					<label id="lblimg" style="color: black;">Seleccione un Archivo Excel en Formato (.xlsx)</label>
					<br>
					<div class="custom-file">
						<div class="custom-file">
							<input type="file"  name="name"  id="name"  class="custom-file-input" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required />
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
						</div>

						<br><br>
						<div id="alerta2"></div>
					</div>	


					
					<center><button type="submit" id="SubirArchivo" class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Importar Datos</button></center>

				</form>


			</div>
			
		</div>
	</div>
</div>





<div class="table-responsive">
<div class="card">
	<div class="card-header" >
	<h5 class="float-left" style="color: black;">Crear Alumnos</h5>
		<span class="float-right">	
			<a href="LIS-Alumnos.php">
				<button class="botonresponsivo" type="button" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">
					<img src="img/team.png" width="25px" height="25px">
					Ver Alumnos
				</button>
			</a>

			<button type="button" class="botonresponsivo" data-toggle="modal" data-target="#exampleModal2" style="border-radius: 20px;
    border: 2px solid green;
    width: 200px;height: 38px;
     background-color: green;
     color:white;">
				<img src="img/excell.png" width="25px" height="25px">
				Subir excel
			</button>

			<a href="ReportesExcel/PlantillaAlumno.php">
				<button type="button" class="botonresponsivo" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #196fb0;
    width: 200px;height: 38px;
     background-color: #196fb0;
     color:white;">
				<img src="img/paper1.png" width="25px" height="25px">
					 Plantilla
				</button>
			</a>

		</span>
	</div>
	<div class="card-body">
		<div class="card-body px-lg-5 pt-0">
			<!-- Form -->
			<form class="text-left" id="crearcuenta"  action="Modelo/ModeloAlumno/GuardarAlumno.php" method="POST" >

				<div id="alerta"></div>
				<h6 style="color: black;" class="float-left">Datos generales</h6><br>
				<hr>
				<div class="form-row" id="formularioalumno">
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<label for="materialRegisterFormLastName">Nombre del alumno</label>
							<input type="text" id="NombreAlumno" name="NombreAlumno" class="form-control" placeholder="Nombre Completo" required >
							
						</div>
					</div>
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName">Carnet del alumno</label>
							<input type="text" id="CarnetAlumno" name="CarnetAlumno" class="form-control" placeholder="0000-SS-FT-0000" required >
							
						</div>
					</div>
					
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName">Class</label>
							<input type="number" min="2009" id="NClass" name="NClass" class="form-control" placeholder="Promoción" required >
							
						</div>
					</div>

				</div>
				<div class="form-row" id="formularioalumno1">
					
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<label for="materialRegisterFormLastName">Correo</label>
							<input type="text" id="correo"  name="correo" class="form-control" placeholder="ejemplo@oportunidades.org.sv" required>
							
						</div>
					</div>
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName">Carrera</label>
							<select type="text" id="NombreCarrera" name="NombreCarrera" class="form-control" required>
								<?php     
								echo '<option value="" disabled selected >Seleccione la opción</option>';
								foreach($pdo->query('SELECT Id_Carrera,nombre FROM carrera') as $row) 
								{
									echo '<option value="'.$row['Id_Carrera'].'">'.utf8_encode($row['nombre']).'</option>';
								}
								echo '</select>';
								?>
								
							</div>
						</div>
						<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
								<label for="materialRegisterFormFirstName">Universidad</label>
								<select id="idempresa" name="idempresa" class="form-control" required>
									<?php     
									echo '<option value="" disabled selected >Seleccione la opción</option>';
									foreach($pdo->query('SELECT ID_Empresa,Nombre FROM empresas where Tipo = "Universidad"') as $row) 
									{
										echo '<option value="'.$row['ID_Empresa'].'">'. utf8_encode($row['Nombre']).'</option>';
									}
									echo '</select>';
									?>
									
								</div>
							</div>
				</div>
				<div class="form-row" id="formularioalumno2">
					<div class="col">
								<!-- Last name -->
								<div class="md-form">
									<label for="materialRegisterFormLastName">Sexo</label>
									<select id="Sexo" name="Sexo" class="form-control" required>
										<option value="" disabled selected >Seleccione la opción</option>
										<option value="M">Hombre</option>
										<option value="F">Mujer</option>

									</select>
									
								</div>
							</div>

						<div class="col">
								
								<div class="md-form">
									<label for="materialRegisterFormLastName">Proceso</label>
									<select id="IDStatus" name="IDStatus" class="form-control" required>
										<?php 
										echo '<option value="" disabled selected >Seleccione la opción</option>';
										foreach($pdo->query('SELECT ID_Status,Nombre FROM status') as $row) 
										{
											echo '<option value="'.$row['ID_Status'].'">'.$row['Nombre'].'</option>';
										}
										echo '</select>';
										?>
										
									</div>



							</div>
						
						<div class="col">
									<!-- First name   Tema , fecha , la hora y el tipo de taller -->
									<div class="md-form">
										<label for="materialRegisterFormFirstName">Sede</label>
										<select type="text" id="sede" name="sede" class="form-control" required>
											<?php 
											echo '<option value="" disabled selected >Seleccione la opción</option>';
											foreach($pdo->query('SELECT ID_Sede,Nombre FROM sedes') as $row) 
											{
												echo '<option value="'.$row['ID_Sede'].'">'. utf8_encode($row['Nombre']).'</option>';
											}
											echo '</select>';
											?>
											
										</div>
									</div>
						</div>
					
				<div class="form-row" id="formularioalumno3">	

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

								<div class="col">
										<!-- Last name -->
										<div class="md-form">
											<label for="materialRegisterFormFirstName">Status actual (A LA FECHA)</label>
											<select type="text" id="estadoAlumno" name="statusActual" class="form-control" required >
												<option value="" disabled selected >Seleccione la opción</option>
												<option value="Becado" >Becado</option>
												<option value="Declinado" >Declinado</option>
												<option value="Declinado-apoyo extraordinario">Declinado-apoyo extraordinario</option>
												<option value="Beca Denegada" >Beca Denegada</option>
												<option value="Crédito Educativo" >Crédito Educativo</option>
												<option value="Cambio Tipo Carrera Graduado">Cambio Tipo Carrera Graduado</option>
												<option value="Cambio Tipo Carrera No Graduado">Cambio Tipo Carrera No Graduado</option>
												<option value="Beca a la Perseverancia">Beca a la Perseverancia</option>
												<option value="Beca Cancelada">Beca Cancelada</option>
												<option value="Egresado">Egresado</option>
												<option value="Graduado" >Graduado</option>
												<option value="Pausa" >Pausa</option>
												<option value="Fallecido">Fallecido</option>
											</select>	
											
										</div>
									</div>	
										<div class="col">
										<div class="md-form">
											<label for="materialRegisterFormFirstName">Fuente de financiamiento</label>
											<select type="text" id="financiamiento" name="financiamiento" class="form-control" required >
												<option value="" disabled selected >Seleccione la opción</option>
												<option value="Beca Externa con Apoyo Adicional" >Beca Externa con Apoyo Adicional</option>
												<option value="Borja" >Borja</option>
												<option value="FGK" >FGK</option>
												<option value="FOM" >FOM</option>
												<option value="Financiamiento Propio" >Financiamiento Propio</option>
											</select>	
											
										</div>
									</div>
								</div>

								<br>
						<h6 style="color: black;" class="float-left">Histórico del alumno de los talleres</h6><br>
						<hr>

						<div class="form-row" id="formularioalumno4">

							<div class="col">
								<!-- Last name -->
								<div class="md-form">
									<label for="materialRegisterFormFirstName">Estado del alumno</label>
									<select type="text" id="estadoAlumno" name="estadoAlumno" class="form-control" required >
										<option value="" disabled selected >Seleccione la opción</option>
										<option value="Activo" >Activo</option>
										<option value="Graduado" >Graduado</option>
										<option value="Inactivo" >Inactivo</option>
									</select>	
									
								</div>
							</div>
							<div class="col">
								<div class="md-form">
									<label for="materialRegisterFormFirstName">Cantidad de talleres</label>
									<input type="number" name="cantidaTaller" class="form-control" placeholder="Ingrese la cantida de talleres" min="0" required >
									
								</div>

							</div>

							<div class="col">
							<div class="md-form">
							<input type="hidden" id="cargo" name="cargo"  value="Estudiante">
						<!-- Sign up button -->		
									<label for="materialRegisterFormFirstName">Finalizar</label>	
									<br>
								<button name="Guardar_Datos" value="Crear Alumno" id="Guardar_Alumno" class="alumnoboton"> Crear Alumno</button>
								<!--<input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >-->
							</div>
						</div>
					</div>
							</form>
						</div>
						<!-- Fin del Formulario -->

					</div>
				</div>
			</div>
</div>
<br>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>