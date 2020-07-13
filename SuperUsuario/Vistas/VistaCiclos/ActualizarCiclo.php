<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM ciclos WHERE ID_Ciclo = :ID_Ciclo");
	$consulta->bindParam(":ID_Ciclo",$id);
	$consulta->execute();

}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar Ciclo| FGK</title>
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
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Actualizar Ciclo</h5>
				</div>
				<div class="modal-body">

					<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch();?>
						<form action="../../Modelo/ModeloCiclos/AcutalizarCiclo.php" method="POST">
							
							<div class="md-form">
								<input type="text" id="idciclo" name="idciclo" class="form-control" placeholder="20##0#" <?php echo 'value="'.$fila['ID_Ciclo'] .'"';?>>
								<label for="materialRegisterFormFirstName" style="color: black" >Ciclo Actual</label>
							</div>							
						</div>


						<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
								<input type="date" id="fechaInicio" name="fechaInicio" class="form-control" <?php echo 'value="'.$fila['Fechanicio'] .'"';?>>
								<label for="materialRegisterFormFirstName" style="color: black" >Fecha Inicio</label>
							</div>




							<div class="md-form">
								<input type="date" id="fechaFinal" name="fechaFinal" class="form-control" <?php echo 'value="'.$fila['FechaFinal'] .'"';}?>>
								<label for="materialRegisterFormFirstName" style="color: black" >Fecha Final</label>
							</div>

							<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Ciclo" value="Actualizar Ciclo" id="Guardar_Ciclo" style="padding: 10px;">
							<a href="../../SIT-Ciclos.php">Regresar inicio?</a>
						</div>

						<!-- Sign up button -->
						
						<hr> 
						<input type="hidden" id="id" name="id" class="form-control" placeholder="20##0#" <?php echo 'value="'.$fila['ID_Ciclo'] .'"';?>>	         

					</form>
					
				</div>

			</div>
		</div>
	</div>
</body>
</html>