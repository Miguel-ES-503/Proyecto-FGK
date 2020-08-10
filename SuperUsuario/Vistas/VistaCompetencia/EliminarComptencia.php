<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM competencias WHERE IDComptenecia= :IDComptenecia");
	$consulta->bindParam(":IDComptenecia",$id);
	$consulta->execute();

	$ID = '';
	$Correo = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();

		$ID  = $fila['IDComptenecia']; 
		$nombreComptencia = $fila['Nombre'];
		
		
	}



}// Fin del consulta del if   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>eliminar competencia | Workeys</title>
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	
	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content"  style="border-radius: 30px;">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Eliminar Competencia</h5>

			</div>
				<div class="modal-body">
				<form class="text-left" action="../../Modelo/ModeloCompetencia/EliminarComptencia.php" method="POST">

						<div class="col">
							<div class="md-form">
								<p>Seguro que desea eliminar la empresa:</p>
				<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="hidden" id="id" name="id" class="form-control" value="<?php echo utf8_encode($ID) ?>"> 
				<!-- E-mai -->
				<div class="md-form">
					<label for="materialSubscriptionFormEmail">Competencia</label>
<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;"  type="text"  id="" class="form-control" value="<?php echo utf8_encode($nombreComptencia)?>"  disabled="true" >
					
				</div>
<br>
				<!-- Sign in button -->
				<center><button name="EliminarComptencia" value="Eliminar Competencia" style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;">Eliminar Competencia</button></center>
				<!--<button class="btn btn-outline-light  btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Eliminar Empresa</button>-->

			</form>
			<!-- Form -->
			<a href="../../SIT-Competencias.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
		</div>


	</div>	
</body>
</html>