<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
error_reporting(0);
?>
<title>Notas del alumno</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.topnav {
  overflow: hidden;
  background-color: #ADADB2;
  max-width: 100%;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  border-width: 3px;
  font-weight: bold;

 
}
.submenu1{
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 18px;
  background-color: #9d120e;
  border-width: 3px;
  font-weight: bold;
  height: 68px;
  letter-spacing: 2px;



}
.icon{
  

}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon1 {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon1 {
    float: right;
    display: inline-block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
    font-size: 15px;
    height: 50px;
  }
  .titulomenu a{
    font-size: 15px;
  }
}
</style>
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

  <script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
<!--Comiezo de estructura de trabajo -->
<div class="container-fluid text-center">

	<div class="topnav" id="myTopnav">
  <a href="javascript:history.back();"><img src="../img/proximo.svg" class="icon"></a>
  <a  class="titulomenu" style="background-color:#ADADB2; color: #2D2D2E; font-size: 25px;">Notas del alumno</a>
  <a href="AlumnoInicio.php?id=<?php echo$idcorreo ?>" class="submenu1">Expediente Alumno</a>
  
  <a href="javascript:void(0);" class="icon1" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
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

