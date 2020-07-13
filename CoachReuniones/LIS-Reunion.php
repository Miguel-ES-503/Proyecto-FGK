<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Lista de reuniones</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<br>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Reuniones Activos</a>

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
			<a class="nav-link active" href="#">Reuniones</a>
		</li> 
	</ul>
	<!-- Links -->   
</div>
<!-- Collapsible content -->
</nav>
<!--/.Navbar-->

<!--/.Navbar-->
<br>


<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>


<br>

<div class="card">
  <div class="card-header">
     <span class="float-left">  
        Reuniones Activos 
      </span>
    
    <span class="float-right"> 
  <a href="SIT-CrearReunion.php" class="btn btn-danger"><img src="../img/add.png" width="25px" height="30px">Crear Reunión</a>
    </span> 
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed " >
  			<thead class="table-secondary">
  				<tr>  
  					<th scope="col">ID Reunión</th>
  					<th scope="col">Titulo</th>
  					<th scope="col">Fecha</th>
					<th scope="col">Lugar</th>
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					<th scope="col">ID Reunión</th>
  					<th scope="col">Titulo</th>
  					<th scope="col">Fecha</th>
					 <th scope="col">Lugar</th>
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</tfoot>

  			<tbody>

				<?php include 'Modelo/ModeloReunion/MostrarDatosReunionActivo.php' ?>

			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>

<br><br>


<div class="card">
  <div class="card-header">
     <span class="float-left">  
        Reuniones Finalizados 
      </span>
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="table-secondary">
  				<tr>  
  					<th scope="col">ID Reunión</th>
  					<th scope="col">Titulo</th>
  					<th scope="col">Fecha</th>
					  <th scope="col">Lugar</th>
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					<th scope="col">ID Reunión</th>
  					<th scope="col">Titulo</th>
  					<th scope="col">Fecha</th>
					  <th scope="col">Lugar</th>
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</tfoot>

  			<tbody>

				<?php include 'Modelo/ModeloReunion/MostrarDatosReunionFinalizado.php' ?>

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

