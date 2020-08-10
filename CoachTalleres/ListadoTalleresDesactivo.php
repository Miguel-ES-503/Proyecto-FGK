<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //?>
<title>Lista de reuniones</title>

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
		<a class="navbar-brand" href="#">Listado de talleres</a>

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
				<a class="nav-link active" href="#">Talleres</a>
			</li>
		
		</ul>
		<!-- Links -->   
	</div>
	<!-- Collapsible content -->
</nav>

<br>


	<div class="card">
		<div class="card-header">
			Lista De Talleres Desactivos
		</div>
		<div class="card-body">
			
			  	<div class="table-responsive">
  		<table  id="example" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="table-secondary">
  				<tr>  
  					<th scope="col">ID</th>
  					<th scope="col">Tema</th>
  					<th scope="col">Tipo</th>
  					<th scope="col">Fecha</th>
  					<th scope="col">Hora</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Empresa encargada</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Detalles</th>
  					

  					
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					<th scope="col">ID</th>
  					<th scope="col">Tema</th>
  					<th scope="col">Tipo</th>
  					<th scope="col">Fecha</th>
  					<th scope="col">Hora</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Empresa encargada</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Detalles</th>
  					
  				</tr>
  			</tfoot>

  			<tbody>

			<?php include 'Modelo/ModeloTaller/MostrarTalleresDesactivo.php'?>

			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
		</div>
	</div>

<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

