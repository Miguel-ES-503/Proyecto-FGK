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
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Alumnos.css">
<div class="title">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title" >Listas-Alumnos</h2>
    <div class="title2">
        <br>
    <div class="title2-text">
    <a href="LIS-Alumnos.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Alumnos</p></a>
    
</div>
</div>
<div class="title3">
        <br>
    <div class="title3-text">
    <a href="LIS-Cuentas.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Cuentas</p></a>
    
</div>

</div>
</div>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
	<br>
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<div class="float-right"> <?php include 'Modularidad/AlertaCorreo.php'?></div>

<!--/.Navbar-->
<br><br>
<div>
	<br class="salto">
	<br class="salto">
	<br class="salto">
	<br class="salto">
	<h5 id="Titulo">Alumnos de  <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
	     		<a href="ReportesExcel/ReportesAlumnos.php" class="float-right">
	     			<button type="button" class="btn btn-success px-3" id="btn-excel">
	     				<img src="../img/excell.png" width="25px" height="30px">
	     			Descargar
	     			</button>
	     		</a>
	     		
	     
		</span>
	</h5>	
	
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="example" class="table table-hover w-100 table-sm table-bordered table-fixed" >
				<thead class="table-secondary w-100">
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
				<tbody class="table h-100 w-100">
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

