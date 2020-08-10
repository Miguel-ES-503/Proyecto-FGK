<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Notas del alumno</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos  


if (isset($_GET['id'])) {

	$id=$_GET['id'];


	$consulta=$pdo->prepare("SELECT alu.Nombre, alu.correo , `CicloU` , `Year` , `ComprobanteNotas` FROM notas nota INNER JOIN alumnos alu on nota.`ID_Alumno` = alu.`ID_Alumno` WHERE alu.`ID_Alumno` = :ID_Alumno");
	$consulta->bindParam(":ID_Alumno",$id);
	$consulta->execute();


	$consulta2=$pdo->prepare("SELECT * FROM alumnos WHERE ID_Alumno = :ID_Alumno");
	$consulta2->bindParam(":ID_Alumno",$id);
	$consulta2->execute();


	$NombreAlumno = '';
	$Correo;
	if ($consulta2->rowCount()>=1)
	{
		while ($fila3=$consulta2->fetch())
		{		
			$NombreAlumno = $fila3['Nombre'];
			$Correo = $fila3['correo'];

		}
	}


}


?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<br>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >
		<!-- Navbar brand -->
		<a class="navbar-brand" href="#">Notas del alumno</a>

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
				<a class="nav-link active" href="AlumnoInicio.php?id=<?php echo$Correo ?>">Regresar</a>
			</li>
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



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel" style="color:black">Subir Notas</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Modelo/ModeloNotas/SubirPDFnotas.php" method="POST" accept-charset="utf-8" enctype="multipart/form-data" >
					<input type="hidden" name="IDalumno"  value="<?php echo $id ?>"   >
					<div class="col">
						<div class="md-form">
							<input type="number" name="CilcoActual" id="CicloActual" min="1" max="3" required  class="form-control" placeholder="Ciclo correspodiente del estudiante">
							<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Correspodiente</label>
						</div>
					</div>
					<br>

					<div class="col">
						<div class="md-form">
							<input type="number" name="yearNota" id="yearNota" min="2000" required  class="form-control" placeholder="Ingrese el año correspodiente de la nota">
							<label for="materialRegisterFormFirstName" style="color: black" >Año</label>
						</div>
					</div>



					<div class="custom-file">
						<div class="custom-file">
							<input type="file" class="custom-file-input"   name="archivo" id="archivo"  accept="application/pdf,application/vnd.ms-excel"  required />
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
						</div>
					</div>
					<p style="color: black; text-align: center;">El archivo no debe pesar más de 5MB</p>

					<div id="alerta6">						
					</div>
			
					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="GuardarNotas" value="Subir Nota" id="notas">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
</div>






<div class="card">
	<h5 class="card-header" style="color: black;" >Notas de <?php echo $NombreAlumno ?>
	<span class="float-right">	
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
			Subir Nota
		</button>
	</span>
</h5>	
<div class="card-body">
	<div class="table-responsive">
		<br>
		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
			<thead class="table-secondary">
				<tr>  
					<th scope="col">Ciclo</th>
					<th scope="col">Año</th>
					<th scope="col">Comprobante</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tfoot class="table-secondary">
				<tr>
					<th scope="col">Ciclo</th>
					<th scope="col">Año</th>
					<th scope="col">Comprobante</th>
					<th scope="col">Eliminar</th>
				</tr>
			</tfoot>
			<tbody>
				<?php 

				if ($consulta->rowCount()>=1)
				{
					while ($fila2=$consulta->fetch())
						{		echo "
					<tr class='table-light'>
					<th>".$fila2['CicloU']."</th>
					<th>".$fila2['Year']."</th>
					<td><a href='../pdfNotasAlumnos/".$fila2['ComprobanteNotas']."' class='fas fa-clipboard  btn btn-success'></a> </td>
					<td><a href='Vistas/VistaNotas/EliminarNotaAlumno.php?id=".$fila2['ComprobanteNotas']."' class='fas fa-trash  btn btn-danger'></a> </td>

					</tr>";

				}
			}

			?>
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

