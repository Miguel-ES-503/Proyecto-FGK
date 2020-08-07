<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Record Alumnos</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos ?>
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
<div class="title div0">
     <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
	<h2 class="main-title">Record  de alumnos</h2>
	<div class="title2 div1" style="background-color: #9d120e">
		<a class="nav-link active" href="#">Alumnos</a>
	</div>
</div>
	
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>

<br><br><br>

<div class="card">
	<h5 class="card-header" style="color: black;">Lista general
		<a href="ReportesExcel/RecordAlumnos.php" class="float-right">
		<button type="button" class="btn btn-success px-3" style="border-radius: 20px;
    border: 2px solid green;
    width: 200px;height: 38px;
 background-color: green;
     color:white;">
			<img src="img/excell.png" width="25px" height="25"> Descargar

		</button>
	</a>
	</h5>

	     			
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
				<thead class="thead-dark">
					<tr>  
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Interno</th>
						<th scope="col">Externo</th>
						<th scope="col">Reuniones</th>
						<th scope="col">Conteo del sistema</th>
						<th scope="col">Historico</th>
						<th scope="col">Status Certifición</th>

					</tr>
				</tr>
			</thead>
			<tfoot class="thead-dark">
				<tr>
						<th scope="col">ID</th>
						<th scope="col">Nombre</th>
						<th scope="col">Class</th>
						<th scope="col">Sede</th>
						<th scope="col">Interno</th>
						<th scope="col">Externo</th>
						<th scope="col">Reuniones</th>
						<th scope="col">Total</th>
						<th scope="col">Cantidad Talleres</th>
						<th scope="col">Status Certifición</th>		
				</tr>
			</tr>
		</tfoot>
		<tbody>
			
			<?php
			include 'Modelo/ModeloBecas/DatosRecordAlumnos.php'
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

