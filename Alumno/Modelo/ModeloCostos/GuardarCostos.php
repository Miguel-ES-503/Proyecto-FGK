<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['Guardar_costo']))
{	
	$soli= $_POST['solitrans'];
	$horario = $_POST['horario'];
	$ruta = $_POST['ruta'];
	
	

	$consulta=$pdo->prepare("INSERT INTO ruta_horario(idHorarioTrans,idRuta) 
							 VALUES(:idHorarioTrans,:idRuta)");

	$consulta->bindParam(':idHorarioTrans',$horario);
	$consulta->bindParam(':idRuta',$ruta);
	
	
	


	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../SoliTransporte.php?id=".$soli);
	   		echo "No funciona";
	    }
		else
		{			 
			//echo $Id_Soli;
			header("Location: ../../SoliTransporte.php?id=".$soli);
			echo " se puedo guardar el dato";
		}




}
else
{
	echo "dATOS NO RECIBIDO";
}

 





?>