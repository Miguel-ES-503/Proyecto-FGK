<?php
 
 



if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM alumnos WHERE ID_Alumno = :ID_Alumno");
	$consulta->bindParam(":ID_Alumno",$id);
	$consulta->execute();
} 
?>


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



<?php include 'Modularidad/Alerta.php'?>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<br>
	<h5>Lista De  Asistencia</h5>
	<!--Estructura de tabControl-->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" href="LIS-Talleres.php">Regresar</a>
		</li>
	</ul>
	<br>

<div class="container-fluid">
 
<!--Ejemplo tabla con DataTables-->
<div class="container">

    <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Taller</th>
              <th scope="col">Estado</th>
              <th scope="col" >Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-light">
              <th scope="row">PV19001</th>
              <td>Proyecto de vida</td>
              <td>Activo</td>
  <td> <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">Finalizar</button></td>

            </tr>
           </tbody>
          </table>
</div>
</div>
<br>





	<div class="table-responsive">
		<br>
		<span class="float-left" style="margin: 2%;">	
			<a href="Reportes/ReporteTalleres.php">
				<button type="button" class="btn btn-danger px-3">
				<i class="fas fa-file-pdf"></i>
				
				</button>
			</a>
			<a href="#">
				<button type="button" class="btn btn-success px-3">
				<i class="fas fa-file-excel"></i>
				
				</button>
			</a>
		</span>
		<br>
		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
			<thead class="thead-dark">
				<tr>  
					<th scope="col">ID</th>
					<th scope="col">Tema</th>
					<th scope="col">Tipo</th>
					<th scope="col">Fecha</th>
					<th scope="col">Hora</th>
					<th scope="col">Estado</th>
					<th scope="col">Actualizar</th>
					<th scope="col">Ver Lista</th>
				</tr>
			</thead>
			<tbody>
			
			
			</tbody>        
		</table>  

	</div> <!--Fin de la caja responsivo de la tabla-->



<?php
//Incluir el footer
include 'Modularidad/PiePagina.php';
?>



