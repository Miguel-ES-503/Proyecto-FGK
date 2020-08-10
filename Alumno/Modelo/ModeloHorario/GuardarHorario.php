<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['crear_Horario']))
{	
	
	$idSoliTrans = $_POST['solitrans'];
	$dia = $_POST['dia'];
	$horaEntrada = $_POST['horainicio'];
	$horasalida = $_POST['horafinal'];
	$observ = $_POST['Comentario'];


	$consulta=$pdo->prepare("INSERT INTO `horariotransporte` (`idSoliTrans`, `dia`, `horaEntrada`, `horaSalida`, `observacionH`) VALUES (:idSoliTrans, :dia, :horaEntrada,:horaSalida ,:observacionH)");

    
	$consulta->bindParam(':idSoliTrans',$idSoliTrans);
	$consulta->bindParam(':dia',$dia);
	$consulta->bindParam(':horaEntrada',$horaEntrada);
	$consulta->bindParam(':horaSalida',$horasalida);
	$consulta->bindParam(':observacionH',$observ);
	


	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../CrearSoliTransporte.php?id=".$idSoliTrans);
	   	
	    }
		else
		{			 
			//echo $Id_Soli;
			header("Location: ../../CrearSoliTransporte.php?id=".$idSoliTrans);
	   }






}
else
{
	echo "dATOS NO RECIBIDO";
}

 




?>