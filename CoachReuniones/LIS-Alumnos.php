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
		<a class="navbar-brand" href="#">Listas Alumnos</a>

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
			<li class="nav-item">
				<a class="nav-link" href="LIS-Cuentas.php">Cuentas</a>
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
<div class="card">
	<h5 class="card-header" style="color: black;">Alumnos de  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
		
	

		

	     		<a href="ReportesExcel/ReportesAlumnos.php" class="float-right">
	     			<button type="button" class="btn btn-success px-3">
	     				<img src="../img/excell.png" width="25px" height="30px">
	     			Descargar
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
						<!--<th scope="col"><input type='checkbox' name='' class='case' value="" id="todos">Todos</th>-->
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

