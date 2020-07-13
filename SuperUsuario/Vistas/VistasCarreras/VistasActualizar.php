<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT c.Id_Carrera, c.nombre, c.Duracion ,c.ID_Facultades ,f.Nombre AS 'Facultad' From carrera c inner JOIN facultades f on c.ID_Facultades=f.IDFacultates WHERE Id_Carrera = :Id_Carrera");
	$consulta->bindParam(":Id_Carrera",$id);
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
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Actualizar Carrera</h5>
					
				</div>
				<div class="modal-body">
					<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch();
						$Tipo= utf8_encode($fila['Facultad']) ;
						?>
						<form action="../../Modelo/ModeloCarrera/ActualizarCarrera.php" method="POST">
							<div id="alerta5"></div>
							<div class="col">
								<!-- First name   Tema , fecha , la hora y el tipo de taller -->
								<div class="md-form">
					<input type="text" id="Codigo"  name="Codigo" class="form-control" <?php echo 'value="'.utf8_encode($fila['Id_Carrera']).'"';?>>
									<label for="materialRegisterFormFirstName" style="color: black" >Sigla Carrera</label>
								</div>							
							</div>


							<div class="col">
								<!-- First name   Tema , fecha , la hora y el tipo de taller -->
								<div class="md-form">
					<input type="text" id="NomCarr" name="NomCarr" class="form-control" <?php echo 'value="'.utf8_encode($fila['nombre']).'"';?>>
									<label for="materialRegisterFormFirstName" style="color: black" >Nombre Carrera</label>
								</div>

								<div class="md-form">
									<select id="Faculta" name="Faculta" class="form-control">
										<option <?php echo 'value="'.$fila['ID_Facultades'] .'"';?>  > <?php echo $Tipo; ?></option>	
										<?php     
										foreach($pdo->query('SELECT IDFacultates,Nombre FROM facultades') as $row) 
										{
											echo '<option value="'.$row['IDFacultates'].'">'.utf8_encode($row['Nombre']).'</option>';
										}
										echo '</select>';
										?>

									</select>

									

									
									<label for="materialRegisterFormFirstName" style="color: black" >Nombre de la Faculta</label>
								</div>
							</div>


							<div class="col">
								<!-- First name   Tema , fecha , la hora y el tipo de taller -->
								<div class="md-form">
									<select id="duracion" name="duracion" class="form-control">
										<option <?php echo 'value="'.$fila['Duracion'] .'"';?> ><?php echo utf8_encode($fila['Duracion']); }?></option>
										<option value="Corta Duración">Corta Duración</option>
										<option value="Larga Duración">Larga Duración</option>
									</select>
									<label for="materialRegisterFormFirstName" style="color: black" >Duración Carrera</label>
								</div>
							</div>
							<input type="hidden" name="id" id="id" <?php echo 'value="'.$fila['Id_Carrera'] .'"';?>>	
							<input class="btn btn-primary btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Carrera" value="Actualizar Carrera" id="Guardar_Carrera">
						</form>
						<a href="../../SIT-CrearCarrera.php">Regresar inicio?</a>
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
		<!-- FIN DEL MODAL -->



	</body>
	</html>