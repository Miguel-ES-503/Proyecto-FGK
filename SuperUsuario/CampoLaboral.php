<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
//include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>solicitudes</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>

<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>

<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="title">
     <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Solicitudes</h2>
  <div class="title2" style="background-color: #9d120e">
  <a class="nav-link active" href="CampoLaboral.php">Campo Laboral</a>
</div>
<div class="title21" style="background-color: #9d120e">
  <a class="nav-link active" href="ListaSolicitudCampoGeneral.php">Lista General</a>
</div>

</div>

  <div class="card">
    <div class="card-header">
    <h5 style="color:black">Solicitudes</h5>
   
    
  </div>
  <div class="card-body">
  	<div class="table-responsive">
  		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
  			<thead class="thead-dark">
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
  			<tfoot class="thead-dark">
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
          <?php include 'Modelo/ModeloSolicitudCambio/SolicutudCampoLaboral.php'?>
			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->
  </div>
</div>





<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>

