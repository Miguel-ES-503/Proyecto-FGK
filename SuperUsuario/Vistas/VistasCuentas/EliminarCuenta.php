<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE IDUsuario = :IDUsuario");
	$consulta->bindParam(":IDUsuario",$id);
	$consulta->execute();

	$IDCuenta = '';
	$Correo = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$IDCuenta  = $fila['IDUsuario']; 
		$Correo = $fila['correo'];
		
		
	}



}// Fin del consulta del if   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Eliminar usuario | FGK</title>
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
			<strong style="color:black;">Eliminar Usuario</strong>
		</h5>

		<!--Card content-->
		<div class="card-body px-lg-5">

			<!-- Form -->
			<form class="text-center" style="color: #757575;" action="../../Modelo/ModeloCuentas/EliminarCuenta.php" method="POST">

				<p>Seguro que desea eliminar la cuenta:</p>
				<input type="hidden" id="IDCuentaUsuario" name="IDCuentaUsuario" class="form-control" value="<?php echo $IDCuenta?>"> 
				<!-- E-mai -->
				<div class="md-form">
					<input type="email" id="materialSubscriptionFormEmail" class="form-control" value="<?php echo $Correo?>">
					<label for="materialSubscriptionFormEmail">E-mail</label>
				</div>

				<!-- Sign in button -->
				<button class="btn btn-outline-light  btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Eliminar Usuario</button>

			</form>
			<!-- Form -->
			<a href="../../LIS-Cuentas.php">Regresar inicio?</a>
		</div>


	</div>
	<!-- Material form subscription -->

	



</body>
</html>