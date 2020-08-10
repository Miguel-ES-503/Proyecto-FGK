<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT alu.`ID_Alumno` , alu.Nombre , `CicloU` , `Year` , `ComprobanteNotas` FROM notas nota INNER JOIN alumnos alu on nota.`ID_Alumno` = alu.`ID_Alumno` WHERE ComprobanteNotas = :ComprobanteNotas");
	$consulta->bindParam(":ComprobanteNotas",$id);
	$consulta->execute();

	$IDAlumno ='';
	$alumno = '';
	$Comprobante = '';
	$Ciclo = '';
	$year ='';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();
		$IDAlumno = $fila['ID_Alumno'];
		$alumno = $fila['Nombre'];
		$Comprobante = $fila['ComprobanteNotas'];
		$Ciclo = $fila['CicloU'];
		$year = $fila['Year'];
		
	}



}// Fin del consulta del if   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminar Carrera | FGK</title>
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	<br><br><br><br><br>
<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content"  style="border-radius: 30px;">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Eliminar Nota Alumno</h5>

			</div>
				<div class="modal-body">
					<form class="text-justify" action="../../Modelo/ModeloNotas/EliminarNotasPorAlumno.php" method="POST">
						<div class="col">
							<div class="md-form">
								<p>Seguro que desea eliminar la Nota:</p>
				<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;"  type="hidden" id="id" name="id" class="form-control" value="<?php echo $id?>" > 
				<input type="hidden" id="id2" name="id2" class="form-control" value="<?php echo $IDAlumno?>" > 
<!-- E-mai -->

					<div class="form-row">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName">Alumno</label>
							<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="CarnetAlumno" name="CarnetAlumno" class="form-control" value="<?php echo $alumno?>"  disabled >
							
						</div>
					</div>
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<label for="materialRegisterFormLastName">Nombre del archivo</label>
							<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="NombreAlumno" name="NombreAlumno" class="form-control" value="<?php echo $Comprobante?>" disabled  >
							
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<label for="materialRegisterFormFirstName">Ciclo</label>
							<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="CarnetAlumno" name="CarnetAlumno" class="form-control" value="<?php echo $Ciclo?>"  disabled >
							
						</div>
					</div>
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<label for="materialRegisterFormLastName">Año</label>
							<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="NombreAlumno" name="NombreAlumno" class="form-control" value="<?php echo $year?>"  disabled  >
							
						</div>
					</div>
				</div>				
<br>
				<!-- Sign in button -->
				<center><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Eliminar Nota</button></center>
				
			</form>
			<!-- Form -->
			<a href<a href="../../NotasPorAlumno.php?id=<?php echo $IDAlumno ?>"  style="color: white; "><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
		</div>


	</div></center>






</body>
</html>