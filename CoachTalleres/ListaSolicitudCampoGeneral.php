<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Lista de reuniones</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

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
		<a class="navbar-brand" href="#">Solicitudes</a>

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
        <a class="nav-link" href="CampoLaboral.php">Campo Laboral</a>
      </li>

      <li class="nav-item">
        <a class="nav-link active" href="ListaSolicitudCampoGeneral.php">Lista General</a>
      </li>

    </ul>
    <!-- Links -->   
  </div>
  <!-- Collapsible content -->
</nav>


	<br>
  <div class="card">
    <div class="card-header">
    <h4 style="color:black">Solicitudes</h4>
   
    
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="table-secondary">
  				<tr>  
  					
  					<th scope="col">ID</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Sede</th>
            <th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Comprobante</th>
  					
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  				  <th scope="col">ID</th>
            <th scope="col">Alumno</th>
            <th scope="col">Sede</th>
            <th scope="col">Sede</th>
            <th scope="col">Universidad</th>
            <th scope="col">Estado</th>
            <th scope="col">Comprobante</th>
  				</tr>
  			</tfoot>
  			<tbody> 
          <?php include 'Modelo/ModeloSolicitudCambio/MostrarTodosSolicitud.php'?>
			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>





<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

