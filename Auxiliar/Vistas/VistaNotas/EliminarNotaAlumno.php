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
	<title>Eliminar Nota | FGK</title>
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


	<!-- Material form subscription -->
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong style="color:black;">Eliminar Nota</strong>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" action="../../Modelo/ModeloNotas/EliminarNotasPorAlumno.php" method="POST">

				<p>Seguro que desea eliminar la Nota:</p>
				<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $id?>" > 
				<input type="hidden" id="id2" name="id2" class="form-control" value="<?php echo $IDAlumno?>" > 
				<!-- E-mai -->

				<div class="form-row">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="text" id="CarnetAlumno" name="CarnetAlumno" class="form-control" value="<?php echo $alumno?>"  disabled >
							<label for="materialRegisterFormFirstName">Alumno</label>
						</div>
					</div>
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<input type="text" id="NombreAlumno" name="NombreAlumno" class="form-control" value="<?php echo $Comprobante?>" disabled  >
							<label for="materialRegisterFormLastName">Nombre del archivo</label>
						</div>
					</div>
				</div>



				<div class="form-row">
					<div class="col">
						<!-- First name   Tema , fecha , la hora y el tipo de taller -->
						<div class="md-form">
							<input type="text" id="CarnetAlumno" name="CarnetAlumno" class="form-control" value="<?php echo $Ciclo?>"  disabled >
							<label for="materialRegisterFormFirstName">Ciclo</label>
						</div>
					</div>
					<div class="col">
						<!-- Last name -->
						<div class="md-form">
							<input type="text" id="NombreAlumno" name="NombreAlumno" class="form-control" value="<?php echo $year?>"  disabled  >
							<label for="materialRegisterFormLastName">Año</label>
						</div>
					</div>
				</div>
				


				<!-- Sign in button -->
				<button class="btn btn-outline-light  btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Eliminar Nota</button>

			</form>
			<!-- Form -->
			<a href="../../NotasPorAlumno.php?id=<?php echo $IDAlumno ?>"  style="color: white; ">Regresar</a>
		</div>


	</div>
	<!-- Material form subscription -->

	



</body>
</html>