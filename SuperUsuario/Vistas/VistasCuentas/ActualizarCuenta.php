<?php require_once "../../../BaseDatos/conexion.php"; ?>
<?php
// Realizamos la consulta del usuario
if (isset($_GET['id'])) {
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE IDUsuario = :IDUsuario");
	$consulta->bindParam(":IDUsuario",$id);
	$consulta->execute();
}// Fin del consulta del if   
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
	
	<title>Actualizar Usuario | FGK</title>
	<link rel="shortcut icon" href="../img/WorkeysIcon.png" />
    <meta charset="utf-8">
    <meta charset="utf8_spanish_ci">
    <meta charset="utf_unicode_ci">
    <meta charset="ISO-8859-1">
	<link rel="stylesheet" href="../css/master.css">
	<link rel="stylesheet" type="text/css" href="../../css/EstiloCrearCuentas.css">
	<link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!--Estilo css CrearCuentas-->
	<link rel="stylesheet" type="text/css" href="css/EstiloCrearCuentas.css">
</head>

<body class="container">

	<br> <br> <br> <br> <br> <br>
	<!-- Estructura de la caja -->

	<div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="display: block; padding-right: 16px;" aria-modal="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color: black">Actualizar Cuenta</h5>
				</div>
				<div class="modal-body">
					<div class="col">
			<?php if ($consulta->rowCount() >=0) {$fila=$consulta->fetch()?>
				<form class="text-justify" action="../../Modelo/ModeloCuentas/ActualizarCuenta.php" method="POST">	
					<br>
					<div id="alerta2"></div>
					<br>
					
					<div class="form-row">
						<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
								<label>Correo Electrónico </label>
				<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="email" id="CuentaCorreo" required  name="CuentaCorreo" class="form-control" <?php echo 'value="'.$fila['correo'] .'"';?>  >
								
							</div>
						</div>
						<div class="col">
							<!-- Last name -->
							<div class="md-form">
								<label for="materialRegisterFormLastName">SEDE</label>
								<select style="border-radius: 20px; background-color:#ADADB2;color: black;" type="text" id="CuentaSede" name="CuentaSede" class="form-control">

									<?php 

									$ResuConulta= $fila['ID_Sede'];
									$consulta1=$pdo->prepare("SELECT * FROM sedes WHERE ID_Sede = :ID_Sede");
									$consulta1->bindParam(":ID_Sede",$ResuConulta);
									$consulta1->execute();
									if ($consulta1->rowCount() >=0) 
									{
										$fila1=$consulta1->fetch()

										?>
										<option <?php echo 'value="'.$ResuConulta.'"';  ?>  selected > <?php echo $fila1['Nombre'];}?> </option>
										<option value="SSFT" >San Salvador</option>
										<option value="SAFT" >Santa Ana</option>
									</select>


									
									
								</div>
							</div>
						</div>

						<div class="form-row">
							<div class="col">
								<!-- First name   Tema , fecha , la hora y el tipo de taller -->
								<div class="md-form">
							<label for="materialRegisterFormFirstName">Cargo</label>
									<select style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="cargo" name="cargo" class="form-control">
										<option <?php echo 'value="'.$fila['cargo'] .'"';?> ><?php echo $fila['cargo'];?></option>
										<option value="Estudiante">Estudiante</option>
										<option value="SuperUsuario">Super Usuario</option>
									    <option value="Coach Fase 2">Coach Fase 2</option>
										<option value="Coach Fase 3">Coach Fase 3</option>
										<option value="SuperVisor">Supervisor</option>
										<option value="Auxiliar">Auxiliar</option>
									</select>
									
								</div>
							</div>

							<div class="col">
							<!-- First name   Tema , fecha , la hora y el tipo de taller -->
							<div class="md-form">
					<label for="materialRegisterFormFirstName">Nombre</label>
		<input style="border-radius: 20px; background-color: #ADADB2;
	color: black;" type="text" id="nombreUser" name="nombreUser" class="form-control"  <?php   echo 'value="'.$fila['nombre'] .'"';}?> >
								
							</div>
						</div>

						</div>
						<input type="hidden" name="id" id="id" <?php echo 'value="'.$fila['IDUsuario'] .'"';?>>

    <center><button style="border-radius: 20px;
    border: 2px solid #9d120e;
    width: 200px;height: 38px;
     background-color: #9d120e;
     color:white;" name="Guardar_Cuenta" value="Actualizar Cuenta" id="Guardar_Cuentas">Actualizar Cuenta</button></center>
						<!--<input class="btn btn-light btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="Guardar_Cuenta" value="Actualizar Cuenta" id="Guardar_Cuentas">-->


						<hr>
					</form>
					<a href="../../LIS-Cuentas.php"><img src="../../img/left-arrow.png" width="40px" height="40px"></a>
					<!-- Fin del Formulario -->
				</div> <!--Fin de la caja contendora Formulario-->
			</div> 
		</div><!-- Fin de la caja --> 


</div>
</div>
	</body>
	</html>