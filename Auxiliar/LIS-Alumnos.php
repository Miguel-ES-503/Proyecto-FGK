<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Listas De Alumnos</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
	<br>
	<!--Navbar-->
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Listas  de alumnos</a>

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
				<a class="nav-link active" href="LIS-Alumnos.php">Alumnos</a>
			</li>

		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>
<!--/.Navbar-->
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>

<!--/.Navbar-->
<br><br>
<form action="select.php" method="POST">
<div class="card">
	<h5 class="card-header" style="color: black;">Alumnos de  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
		
		<span class="float-right">	
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Realizar Cambios
			</button>

		

	     		<a href="ReportesExcel/ReportesAlumnos.php">
	     			<button type="button" class="btn btn-success px-3">
	     				<i class="fas fa-arrow-circle-down"></i>
	     			</button>
	     		</a>
		</span>
	</h5>	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="table-secondary">
					<tr> 
						<th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>
						<th scope="col">Carnet</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Lugar de asistencia</th>
						<th scope="col">STATUS ACTUAL</th>
						<th scope="col">Estado de certificación</th>
						
						<th scope="col">Ver expediente</th>
					</tr>
				</thead>
				<tfoot class="table-secondary">
					<tr>
						<th scope="col">Todos</th>
						<th scope="col">Carnet</th>
						<th scope="col">Alumno</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Lugar de asistencia</th>
						<th scope="col">STATUS ACTUAL</th>
						<th scope="col">Estado de certificación</th>
						
						<th scope="col">Ver expediente</th>						
					</tr>
				</tfoot>
				<tbody>
					<?php
					require_once 'Modelo/ModeloAlumno/MostrarDatosAlumnos.php';
					?>

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
        <h5 class="modal-title" id="exampleModalLabel" style="color: black">Realizar cambios al estudiante</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
      	<select type="text" id="estadoAlumno" name="statusActual" class="form-control">
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
      	<label for="materialRegisterFormFirstName" style="color: black;">Status actual (A LA FECHA)</label>

      	<br>

      	<select type="text" id="financiamiento" name="financiamiento" class="form-control" >
      		<option value="" disabled selected >Seleccione la opción</option>
      		<option value="Beca Externa con Apoyo Adicional" >Beca Externa con Apoyo Adicional</option>
      		<option value="Borja" >Borja</option>
      		<option value="FGK" >FGK</option>
      		<option value="FOM" >FOM</option>
      		<option value="Financiamiento Propio" >Financiamiento Propio</option>
      	</select>	
      	<label for="materialRegisterFormFirstName" style="color: black;">Fuente de financiamiento</label>

      	<br>

      	<select id="IDStatus" name="IDStatus" class="form-control" >
      		<?php 
      		echo '<option value="" disabled selected >Seleccione la opción</option>';
      		foreach($pdo->query('SELECT ID_Status,Nombre FROM status') as $row) 
      		{
      			echo '<option value="'.$row['ID_Status'].'">'.$row['Nombre'].'</option>';
      		}
      		echo '</select>';
      		?>
      		<label for="materialRegisterFormLastName" style="color: black;">Proceso</label>
      		<br>

      		<select type="text" id="Asistencia" name="Asistencia" class="form-control">
      			<option value="" disabled selected >Seleccione la opción</option>
      			<option value="SSFT" >San Salvador</option>
      			<option value="SAFT" >Santa Ana</option>
      		</select>
      		<label for="materialRegisterFormFirstName" style="color: black;">Lugar de asistencia</label>

      </div>
      <div class="modal-footer">
     <input type="submit" name="cambiar" value="Actualizar" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>

</form>
<br><br>

<script type="text/javascript">

	$("#todos").on("click", function() {
		$(".case").prop("checked", this.checked);
	});

            // if all checkbox are selected, check the selectall checkbox and viceversa  
            $(".case").on("click", function() {
            	if ($(".case").length == $(".case:checked").length) {
            		$("#todos").prop("checked", true);
            	} else {
            		$("#todos").prop("checked", false);
            	}
            });
        </script>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

