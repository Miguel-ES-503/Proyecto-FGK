<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM competencias WHERE IDComptenecia= :IDComptenecia");
	$consulta->bindParam(":IDComptenecia",$id);
	$consulta->execute();
    
    $IDComptenecia;
    $NombreCompetencia;

	if ($consulta->rowCount()>=1)
   {
   		while ($fila=$consulta->fetch()) 
   		{
   		   	$IDComptenecia = utf8_encode($fila['IDComptenecia']);
   		   	$NombreCompetencia = utf8_encode($fila['Nombre']);
   		}
   }

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
					<h5 class="modal-title" id="exampleModalLabel" style="color: black">Actualizar Competencia</h5>
				</div>
				<div class="modal-body">
					<div class="col">
						<form action="../../Modelo/ModeloCompetencia/ActualizarComptencia.php" method="POST">
						<input type="hidden" name="id" value="<?php echo utf8_encode($id)  ?>"> 
						<div class="md-form">
			<input type="text" id="siglacomptencia" name="siglacomptencia" class="form-control" placeholder="Sigla de la Comptencia" value="<?php echo $IDComptenecia ?>"> 
							<label for="materialRegisterFormFirstName" style="color: black" >Sigla de la Competencia</label>
							<br>
	<input type="text" id="comptencia" name="comptencia" class="form-control" placeholder="Nombre de la competencia" value="<?php echo $NombreCompetencia ?>">
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Competencia</label>
					</div>
					<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Datos" value="Actualizar competencia" id="Guardar_Datos">
					</form>
					<a href="../../SIT-Competencias.php">Regresar</a>
				</div>
				<div class="modal-footer">

				</div>
				</div>
			</div>
		</div>
		<!-- FIN DEL MODAL -->



	</body>
	</html>