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
						<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;"  type="hidden" name="id" value="<?php echo utf8_encode($id)  ?>"> 
						<div class="md-form">
							<label for="materialRegisterFormFirstName" style="color: black" >Sigla de la Competencia</label>
			<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;"  type="text" id="siglacomptencia" name="siglacomptencia" class="form-control" placeholder="Sigla de la Comptencia" value="<?php echo $IDComptenecia ?>"> 
							
							<br>
							<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Competencia</label>
	<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="comptencia" name="comptencia" class="form-control" placeholder="Nombre de la competencia" value="<?php echo $NombreCompetencia ?>">
							
					</div>
					<br>
					<center><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" name="Guardar_Datos" value="Actualizar competencia" id="Guardar_Datos">Actualizar Competencia</button></center>
					
					</form>
					<a href="../../SIT-Competencias.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
				</div>
				</div>
			</div>
		</div>
		<!-- FIN DEL MODAL -->
</div>



	</body>
	</html>