<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
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
//include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
?>
    <script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init()
  });
  </script>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">
<div class="title">
    <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <h2 class="main-title" >Notas del Alumno</h2>
<div class="title2" style="background-color: #9d120e">
  <a class="nav-link active" href="AlumnoInicio.php?id=<?php echo$idcorreo ?>" >Expediente Alumno</a>
</div>
</div>
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
							<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Correspodiente</label>
							<input type="number" name="CilcoActual" id="CicloActual" min="1" max="3" required  class="form-control" placeholder="Ciclo correspodiente del estudiante">
							
						</div>
					</div>
					<br>

					<div class="col">
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Año</label>
							<input type="number" name="yearNota" id="yearNota" min="2000" required  class="form-control" placeholder="Ingrese el año correspodiente de la nota">
							
						</div>
					</div>

<br>

					<div class="custom-file">
						<div class="custom-file">
							
							<input type="file" class="custom-file-input"   name="archivo" id="archivo"  accept="application/pdf,application/vnd.ms-excel"  required />
							
							<label class="custom-file-label" for="customFileLang" data-browse="Buscar">Seleccionar Archivo</label>
							<p style="color: black; text-align: center;">El archivo no debe pesar más de 5MB</p>
						</div>
					</div>
					

					<div id="alerta6">						
					</div>
			<br>
					<center><button name="GuardarNotas" value="Subir Nota" id="notas" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Subir Notas</button></center>
				</form>
			</div>
		</div>
	</div>
</div>






<div class="card">
	<h5 class="card-header" style="color: black;" >Notas de <?php echo $NombreAlumno ?>
	<span class="float-right">	
		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;"><img src="img/score.png" width="25px" height="25px">
			Subir Nota
		</button>
	</span>
</h5>	
<div class="card-body">
	<div class="table-responsive">
		<br>
		<table  id="tableUser" class="table table-hover table-sm table-bordered table-fixed" >
			<thead class="thead-dark">
				<tr>  
					<th scope="col">Ciclo</th>
					<th scope="col">Año</th>
					<th scope="col">Comprobante</th>
					<th scope="col">Eliminar</th>
				</tr>
			</thead>
			<tfoot class="thead-dark">
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

