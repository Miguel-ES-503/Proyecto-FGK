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

$fecha1 = new DateTime($fecha.' '.$HoraInicio.':00');
$fecha2 = new DateTime($fecha.' '.$HoraFinal.':00');

 $intervalo = $fecha1->diff($fecha2);
  $cupos = $intervalo->format('%h')*3600/60/$tiempoN;//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos

	$consulta3=$pdo->prepare("INSERT INTO horariosreunion (ID_Reunion,HorarioInicio,HorarioFinalizado ,Canitdad, TiempoReunion) VALUES(:idreunion,:horainicio,:horafinalizado,:cantidad,:tiemporeu)");
	$consulta3->bindParam(':idreunion',$IDreunion);
    $consulta3->bindParam(':horainicio',$HoraInicio);
	$consulta3->bindParam(':horafinalizado',$HoraFinal);
	$consulta3->bindParam(':cantidad',$cupos);
	$consulta3->bindParam(':tiemporeu',$tiempoN);

	if (!$consulta3->execute()) 
	{
		$_SESSION['message'] = 'Fallo al crear horario';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../ListaReunion.php?id=".urlencode($IDreunion));
	}
	else
	{			 	
		$_SESSION['message'] = 'Horario creado con exito';
		$_SESSION['message2'] = 'success';
	header("Location: ../../ListaReunion.php?id=".urlencode($IDreunion));
	}





}else 
{
	echo "datos no llegando";
}


 ?>