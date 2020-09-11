<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<title>Lista de reuniones</title>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/horas-sociales.main.css">
<link rel="stylesheet" type="text/css" href="css/Menu.css">
<!--<div class="title">
    <a href="javascript:history.back();" ><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" >Horas Sociales</h2>
    <div class="title2">
    <div class="title2-text">
    <a href="HorasVinculacion.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Solicitudes</p></a>
    
</div>
</div>
    <div class="title3">
    <div class="title3-text">
    <a href="ListaHorasSociales.php" style="text-decoration: none;"><p><img src="../img/Ver.png" class="icon-2">Lista General</p></a>
    
</div>
</div>
</div>-->
<nav class="navbar navbar-expand-lg navbar-light" id="row">
  <a href="javascript:history.back();"><img src="../img/back.png" class="icon"></a>
  <a class="navbar-brand"  id="T1">Horas Sociales</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

      <!--<li class="nav-item" id="bloque">
        <a class="nav-link" href="HorasVinculacion.php"><img src="../img/Ver.png" class="icon-2">Solicitudes</a>
      </li>-->
      <li class="nav-item" id="bloque">
        <a class="nav-link" href="ListaHorasSociales.php"><img src="../img/Ver.png" class="icon-2">Lista General</a>
      </li>
    </ul>
  </div>
</nav>
<br>
<br>
<br>
<br>
<br class="salto">
<br class="salto">
<br class="salto">
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="card">
  <div class="card-header">
    <b style="font-size: 20px;">Solicitudes</b>
   
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed " >
  			<thead class="table-secondary">
  				<tr>  
  					<th scope="col">ID Solicitud</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</thead>
  			<tfoot class="table-secondary">
  				<tr>
  				<th scope="col">ID Solicitud</th>
  					<th scope="col">Alumno</th>
  					<th scope="col">Class</th>
  					<th scope="col">Sede</th>
  					<th scope="col">Universidad</th>
  					<th scope="col">Estado</th>
  					<th scope="col">Ver</th>
  				</tr>
  			</tfoot>

  			<tbody>

					<?php include 'Modelo/ModeloHorasSociales/MostrarSolicitudes.php' ?>

			</tbody>        
		</table> 

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>









<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

