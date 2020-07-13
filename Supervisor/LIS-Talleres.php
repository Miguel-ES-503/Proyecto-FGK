<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>
<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Listas De Taller</title>

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
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Fase Talleres</a>

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
    <a class="nav-link active" href="LIS-Talleres.php">Talleres</a>
  </li>
</li>
<li class="nav-item">
 <a class="nav-link" href="LIS-Reunion.php">Reuniones</a>
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
        Talleres Activos De <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
      </span>

      <span class="float-right">  
        <a href="SIT-CrearTaller.php" class="fas fa-key btn btn-danger px-3">Crear Taller</a>
      </span>
    
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="table-secondary">
  				<tr>  
  					
  					<th scope="col">Tema</th>
  					<th scope="col">Tipo</th>
            <th scope="col">Cargo</th>
  					<th scope="col">Fecha</th>
  					<th scope="col">Hora</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Detalles</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					
  					<th scope="col">Tema</th>
  					<th scope="col">Tipo</th>
            <th scope="col">Cargo</th>
  					<th scope="col">Fecha</th>
  					<th scope="col">Hora</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Actualizar</th>
  					<th scope="col">Ver Detalles</th>
  				</tr>
  			</tfoot>

  			<tbody>

			<?php include 'Modelo/ModeloTaller/MostrarDatosTaller.php' ?>

			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>

<br><br>

<div class="card">
  <div class="card-header">
     <span class="float-left">  
        Talleres Finalizados De <?php if($ubicacion == "SS"){ echo "San Salvador";}else{ echo "Santa Ana";}?>
      </span>
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser2" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="table-secondary">
  				<tr>  
  				  <th scope="col">Tema</th>
            <th scope="col">Tipo</th>
            <th scope="col">Cargo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Estado</th>
            <th scope="col">Actualizar</th>
            <th scope="col">Ver Detalles</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					<th scope="col">Tema</th>
            <th scope="col">Tipo</th>
            <th scope="col">Cargo</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">Estado</th>
            <th scope="col">Actualizar</th>
            <th scope="col">Ver Detalles</th>
  				</tr>
  			</tfoot>

  			<tbody>

			<?php include 'Modelo/ModeloTaller/TallerFinalizado.php'?>

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

