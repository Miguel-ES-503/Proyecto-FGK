<?php 

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

error_reporting(0);

if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}

date_default_timezone_set('America/El_Salvador');

 $fecha =  date('Y-m-d');

if(isset($_POST['Guardar_Datos']))
{
	$IDreunion = $_POST['idreunion'];
	 $HoraInicio = $_POST['horaInicio'];
	 $HoraFinal = $_POST['horafinalizar'];
	$tiempoN = $_POST['cantidad'];
	$horafin = $fecha." ".$HoraFinal.":00";
	$date2 = $fecha." ".$HoraInicio.":00";
	$diff = $horafin->diff($date2);
	echo $cupos =(( ($diff->days * 24 ) * 60 ) + ( $diff->i ));
	$error = (($diff->invert == 1 ) ? '' : ' to go ');

	$Cantidad = ($cupos/$tiempoN);

	// $consulta3=$pdo->prepare("INSERT INTO horariosreunion (ID_Reunion,HorarioInicio,HorarioFinalizado ,Canitdad) VALUES(:idreunion,:horainicio,:horafinalizado,:cantidad)");
	// $consulta3->bindParam(':idreunion',$IDreunion);
	// $consulta3->bindParam(':horainicio',$HoraInicio);
	// $consulta3->bindParam(':horafinalizado',$HoraFinal);
	// $consulta3->bindParam(':cantidad',$Cantidad);




	// if (!$consulta3->execute()) 
	// {
	// 	$_SESSION['message'] = 'Fallo al crear horario';
	// 	$_SESSION['message2'] = 'danger';
	// 	header("Location: ../../ListaReunion.php?id=".urlencode($IDreunion));
	// }
	// else
	// {			 	
	// 	$_SESSION['message'] = 'Horario creado con exito';
	// 	$_SESSION['message2'] = 'success';
	// header("Location: ../../ListaReunion.php?id=".urlencode($IDreunion));
	// }





}else 
{
	echo "datos no llegando";
}


 ?>