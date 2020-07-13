<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$id2=$_GET['id2'];
	

	$consulta=$pdo->prepare("SELECT * FROM horariosreunion WHERE IDHorRunion = :IDHorRunion ");
	$consulta->bindParam(":IDHorRunion",$id);
	$consulta->execute();

	//Variables Globales
	$HoraInicio; $HorarioFinalizado; $Cantidad;

	if ($consulta->rowCount() >=0)
       {
       	
       	$fila=$consulta->fetch();
       	$HoraInicio = $fila['HorarioInicio'];
       	$HorarioFinalizado = $fila['HorarioFinalizado'];
       	$Cantidad = $fila['Canitdad'];

       }

}// Fin del consulta del if   
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualizar Horario | FGK</title>
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	<!-- Modal -->
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Actualizar Horario</h5>
					
				</div>
				<div class="modal-body">
							
					<form action="../../Modelo/ModeloReunion/ActualizarHorario.php" method="POST" accept-charset="utf-8">
						
						<input type="hidden" name="idhorario" value="<?php echo $id ?>" > 
						<input type="hidden" name="idreunion" value="<?php echo $id2 ?>" > 

					<div class="col">
						<div class="md-form">					
							<input type="time" id="horaInicio" name="horaInicio" class="form-control" value="<?php echo $HoraInicio ?>">
							<label for="materialRegisterFormFirstName" style="color: black" >Hora Inicio</label>
						</div>
					</div>

					<div class="col">
						<div class="md-form">
							<input type="time" id="horafinalizar" name="horafinalizar" class="form-control" value="<?php echo $HorarioFinalizado ?>">
							<label for="materialRegisterFormFirstName" style="color: black" >Hora Finalizar</label>
						</div>
					</div>

					<div class="col">
						<div class="md-form">
							<input type="number" id="cantidad" name="cantidad" class="form-control" min="1" value="<?php echo $Cantidad ?>">
							<label for="materialRegisterFormFirstName" style="color: black" >Cantidad</label>
						</div>
					</div>
	
				   <input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="actualizarHora" value="Actualizar Horario" id="actualizarHora">
					</div>
</form>
					<div class="modal-footer">
						<a href="../../ListaReunion.php?id=<?php echo $id2  ?>">Regresar inicio?</a>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN DEL MODAL -->
<br><br>

	</body>
	</html>