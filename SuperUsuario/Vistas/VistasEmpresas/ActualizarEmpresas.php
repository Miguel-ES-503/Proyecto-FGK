<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM empresas WHERE ID_Empresa = :ID_Empresa");
	$consulta->bindParam(":ID_Empresa",$id);
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
	<link rel="stylesheet" type="text/css" href="css/global.css">
</head>

<body class="container">

	

	<!-- Comienzo del MODAL DEL FORMULARIO -->

	<!-- Modal -->
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content"  style="border-radius: 30px;">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Actualizar Empresa</h5>
				</div>
				<div class="modal-body">
					<div id="alerta3"></div>

					<!--Creación de empresas-->
					<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch();
						$Tipo =$fila['Tipo'];
					?>
					<form action="../../Modelo/ModeloEmpresas/ActualizarEmpresa.php" method="POST">
						<div class="col">
							<div class="md-form">
								<label for="materialRegisterFormFirstName" style="color: black" >Siglas Empresa</label>
			<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="siglas" name="siglas" class="form-control" <?php echo 'value="'.utf8_encode($fila['ID_Empresa']) .'"';?>>
								
							</div>
						</div>

						<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
								<label for="materialRegisterFormFirstName" style="color: black" >Nombre Empresa</label>
		<input  style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="NombreEmpresa" name="NombreEmpresa" class="form-control" <?php echo 'value="'.utf8_encode($fila['Nombre']) .'"';?>>
								
							</div>
						</div>

						<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
								<label for="materialRegisterFormFirstName" style="color: black" >Descripción</label>
								<select  style="border-radius: 20px; background-color: #ADADB2;
	color: black;" id="opciones" name="opciones" class="form-control">
	<option <?php echo 'value="'.$fila['Tipo'] .'"';}?>  > <?php echo $Tipo; ?></option>
									<option value="Universidad">Universidad</option>
									<option value="Empresa Externa">Empresa Externa</option>
									<option value="Oportunidades">Oportunidades</option>
									

								</select>
								
							</div>
						</div>
		<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="hidden" name="id" name="id" <?php echo 'value="'.utf8_encode($fila['ID_Empresa']) .'"';?>>
		<br>
						<center><button name="Guardar_Datos" value="Actualizar Empresa" class="actualizarempresa" id="Guardar_Datos">Actualizar Empresa</button></center>
    <!--<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" >-->

					</form>
	<a href="../../SIT-CrearEmpresas.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
				</div>
			</div>
		</div>
	</div>



</body>
</html>