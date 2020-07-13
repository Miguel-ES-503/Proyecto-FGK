<?php 
require_once "../../../BaseDatos/conexion.php"; 
session_start();
if (isset($_POST['actualizarHora'])) {
	
	$HoraInicio = $_POST['horaInicio'];
	$HoraFinal = $_POST['horafinalizar'];
	$Cantidad = $_POST['cantidad'];
	$id = $_POST['idhorario'];
	$IDreunion = $_POST['idreunion'];

	$consulta=$pdo->prepare("UPDATE horariosreunion SET  HorarioInicio = :HorarioInicio , HorarioFinalizado = :HorarioFinalizado , Canitdad = :Canitdad  WHERE IDHorRunion = :id");

	$consulta->bindParam(":HorarioInicio",$HoraInicio);
	$consulta->bindParam(":HorarioFinalizado",$HoraFinal);
	$consulta->bindParam(":Canitdad",$Cantidad);
	$consulta->bindParam(":id",$id);

			//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Horario Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../ListaReunion.php?id=".$IDreunion);
	}
	else
	{
		$_SESSION['message'] = 'Horario No Actualizdo';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../ListaReunion.php?id=".$IDreunion);
	}

}
else
{
	echo "Datos no entrando";
}


 ?>