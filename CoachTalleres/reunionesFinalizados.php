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
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/Menu.css">
<link rel="stylesheet" type="text/css" href="css/Reuniones-Finalizadas.css">
<nav class="navbar navbar-expand-lg navbar-light" id="row">
 <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
  <a class="navbar-brand" id="T1">Reuniones</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
      <li class="nav-item" id="bloque">
        <a class="nav-link" href="SIT-CrearReunion.php"><img src="../img/Ver.png" class="icon-2">Crear Reuniones</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container-fluid text-center">
<br>
<div class="float-right"> <?php include 'Modularidad/Alerta.php'?></div>
<br>

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
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
            <th scope="col">Tipo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  					<th scope="col">ID Reunión</th>
  					<th scope="col">Titulo</th>
  					<th scope="col">Fecha</th>
  					<th scope="col">Univerisdad</th>
  					<th scope="col">Ciclo</th>
            <th scope="col">Tipo</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver Lista</th>
  				</tr>
  			</tfoot>

  			<tbody>

				<?php include 'Modelo/ModeloReunion/ReunionesFinalizados.php' ?>

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

