<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM inscripcion WHERE IDinscripcion = :IDinscripcion");
	$consulta->bindParam(":IDinscripcion",$id);
	$consulta->execute();

	$IDCuenta = '';
	$Correo = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$IDCuenta  = $fila['IDinscripcion']; 
		$Correo = $fila['IDinscripcion'];
		
		
	}



}// Fin del consulta del if   
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>Eliminar inscripción | FGK</title>
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	<br><br><br><br><br><br><br><br><br><br>


	<!-- Material form subscription -->
	<div class="card">

		<h5 class="card-header info-color white-text text-center py-4">
			<strong style="color:black;">Eliminar inscripci贸n</strong>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" action="../../Modelo/ModeloInscripcion/eliminarInscripcion.php" method="POST">

				<p>Seguro que desea eliminar la inscripci贸n</p>
				<input type="hidden" id="id" name="id" class="form-control" value="<?php echo $IDCuenta?>"> 
				<!-- E-mai -->
				<div class="md-form">
					<input type="text" id="" class="form-control" value="<?php echo $Correo?>">
					<label for="materialSubscriptionFormEmail">inscripci贸n</label>
				</div>

				<!-- Sign in button -->
				<button class="btn btn-outline-light  btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Eliminar inscripci贸n</button>

			</form>
			<!-- Form -->
			<a href="../../SIT-ProcesoInscripcion.php">Regresar inicio?</a>
		</div>


	</div>
	<!-- Material form subscription -->

	



</body>
</html>