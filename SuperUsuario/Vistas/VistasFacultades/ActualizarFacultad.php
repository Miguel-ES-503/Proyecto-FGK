<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM facultades WHERE IDFacultates= :IDFacultates");
	$consulta->bindParam(":IDFacultates",$id);
	$consulta->execute();

}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar Empresa | FGK</title>
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	<!-- Modal -->
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color: black">Actualizar Facultad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						
					</button>
				</div>
				<div class="modal-body">
					<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch();?>
						<form action="../../Modelo/ModeloFacultades/ActualizarFacultad.php" method="POST">
							<div id="alerta6"></div>
							<div class="col">
								<div class="md-form">
									<b><label for="materialRegisterFormFirstName" style="color: black" >Nombre de la facultad</label></b>
									<input style="border-radius: 20px; background-color: #bcbcbc;
	color: black;" type="text" id="NombreFac" name="NombreFac" class="form-control"  <?php echo 'value="'.utf8_encode($fila['Nombre']) .'"';}?>>
									
								</div>
							</div>
							<br>
							<input type="hidden" name="id" id="id" <?php echo 'value="'.$fila['IDFacultates'] .'"';?>>		

							<center><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" name="Guardar_Facultad" value="Actualizar Facultad" id="Guardar_Facultad">Actualizar Facultad</button></center>
							<!--<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >-->
						</form>
						<a href="../../SIT-Facultades.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN DEL MODAL -->



	</body>
	</html>