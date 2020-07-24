<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM carrera WHERE Id_Carrera= :Id_Carrera");
	$consulta->bindParam(":Id_Carrera",$id);
	$consulta->execute();

	$IDCuenta = '';
	$Correo = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$IDCuenta  = utf8_encode($fila['Id_Carrera']); 
		$Correo = utf8_encode($fila['nombre']);
		
		
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
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Eliminar Carrera</h5>

			</div>
				<div class="modal-body">
					<form class="text-left" action="../../Modelo/ModeloCarrera/EliminarCarrera.php" method="POST">

						<div class="col">
							<div class="md-form">
								<p>Seguro que desea eliminar la carrera:</p>
				<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="hidden" id="id" name="id" class="form-control" value="<?php echo $IDCuenta?>"> 
								
				<!-- E-mai -->
				<div class="md-form">
					<b><label for="materialSubscriptionFormEmail">Carrera</label></b>
					<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="" disabled="true" class="form-control" value="<?php echo $Correo?>">
					
				</div>

<br>
				<!-- Sign in button -->
				<center><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Eliminar Carrera</button></center>
				<!--<button class="btn btn-outline-light  btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Eliminar Empresa</button>-->

			</form>
			<!-- Form -->
				<a href="../../SIT-CrearCarrera.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
		</div>


	</div></center>




</body>
</html>