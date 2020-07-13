<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
?>
<title>Reportes</title>



<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid">

	<div class="card">
		<div class="card-header">
			Lista de talleres Activos 
		</div>
		
		<div class="card-body">
			<!--div class=""-->
				<div style="margin: 0px 0px 0px 50px;">
					<table class="ui sinlge line  selectable  striped table " id="example" style="width: 100%;" >
						<thead>
							<tr>
								<th scope="col">
									Titulo
								</th>
								<th scope="col">
									Mes
								</th>
								<th scope="col">
									Año
								</th>
								<th scope="col">
									Tipo
								</th>
								<th scope="col">
									Sede
								</th>
								<th scope="col">
									Empresa
								</th>	
								<th scope="col">
									Reporte
								</th>																
							</tr>
						</thead>
						<tbody>
						
							<?php
							require_once 'Modelo/CargarMesesReporte.php';						
							?>

						</tbody>
					</table>
				</div>
			<!--/div-->

		</div> <!--Fin de la caja responsivo de la tabla-->
	</div>
</div>


<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

