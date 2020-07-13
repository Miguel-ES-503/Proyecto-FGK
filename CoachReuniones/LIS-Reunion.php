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
<link rel="stylesheet" type="text/css" href="css/Reuniones-Finalizadas.css">
<div class="title">
    <img src="../img/back.png" class="icon">
    <h2 class="main-title" >Reuniones</h2>
    <div class="title2">
        <br>
    <div class="title2-text">
    <a href="SIT-CrearReunion.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Crear Reunión</p></a>
    
</div>
</div>
</div>
<div class="container-fluid text-center">
<!--/.Navbar-->

<!--/.Navbar-->
<br>


<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>


<br>

<div>
  <div>
     <span class="first-title">  
        Reuniones Activos 
      </span>
  </div>
  <br>
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

