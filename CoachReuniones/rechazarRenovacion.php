<?php
//Modularidad para inicializar el Head y <!DOCTYPE html>
include 'Modularidad/CabeceraInicio.php';
?>
<title>Rechazar Renovacion</title>
<?php include("../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos
	  include '../Conexion/conexion.php';
	  session_start();
	  if (!(isset($_SESSION['idRenovacion']))) {
	  header("Location:listadoRenovacion.php");
	  }
	  foreach ($dbh->query("SELECT alumnos.correo,LEFT(alumnos.Nombre,LOCATE(' ',alumnos.Nombre) - 1) AS 'nombre'FROM alumnos
                            JOIN renovacion
                            ON renovacion.ID_Alumno = alumnos.ID_Alumno
                            WHERE renovacion.idRenovacion = '".$_SESSION['idRenovacion']."'") as $mail) {
	  	
	  	$correo = $mail['correo'];
	  	$nombre = $mail['nombre'];
	  }
?>
<?php
//Modularaidad para extraere los enlaces en HEAD
include 'Modularidad/EnlacesCabecera.php';
//Incluir el menu horizontal
include 'Modularidad/MenuHorizontal.php';
include 'Modularidad/MenuVertical.php';
//echo $_SESSION['idRenovacion'];
?>
  
<link rel="stylesheet" type="text/css" href="css/modulos-moodle.css">
<style type="text/css">
	#mensaje
	{
		background-color: #ADADB2;
		border-color: white;
		border-radius: 20px;
		height: 200px; 
	}
	#btn
	{
		background-color: #BE0032;
		width:100px;
		font-size: 15px;
		margin: 0 auto;

	}
</style>
<div class="title">
  <a href="javascript:history.back();" title=""><img src="../img/back.png" class="icon"></a>
    <h2 class="main-title" ><?php echo'Rechazar renovacion' ?></h2>
    <div class="title2">
</div>
</div>

<link rel="stylesheet" href="css/main.css">
<body>
	<div style="margin: 0 auto;width: 50%;color: black;text-align: center;margin-top: 80px;" >
	<form action="Modelo/ModeloRenovacion/rechazoRenovacion.php" method="POST">

	<div class="form-group">
		<label style="color: black">Motivo</label>
		<textarea type="text" name="mensaje" class="form-control" id="mensaje" required></textarea>
	</div>
	<input type="hidden" name="correo" value="<?php echo $correo?>">
	<input type="hidden" name="nombre" value="<?php echo $nombre?>">
	<input type="hidden" name="id" value="<?php echo $_SESSION['idRenovacion']?>">
	<input type="submit" name="enviar" class="btn btn-primary" value="Enviar" id="btn">
	</form>
</div>
</body>



