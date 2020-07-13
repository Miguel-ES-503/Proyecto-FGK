<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['crear_Horario']))
{	
	$iduser = $_POST['iduser'];
	$idciclo = $_POST['ciclo'];
	$rutas = $_POST['rutas'];
	$dia=$_POST['duracion'];
	$horainicio = $_POST['horainicio'];
	$horafinal = $_POST['horafinal'];


	$consulta=$pdo->prepare("INSERT INTO horario (ID_Alumno,ID_Ciclo,id, dia,horaentrada,horasalida) VALUES(:ID_Alumno,:ID_Ciclo,:id,:dia,:horaentrada,:horasalida)");
	$consulta->bindParam(':ID_Alumno',$iduser);
	$consulta->bindParam(':ID_Ciclo',$idciclo);
	$consulta->bindParam(':id',$rutas);
	$consulta->bindParam(':dia',$dia);
	$consulta->bindParam(':horaentrada',$horainicio);
	$consulta->bindParam(':horasalida',$horafinal);
	


	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../CrearSoliTransporte.php?id=".$iduser);
	   		echo "No se puedo guardar el dato";
	    }
		else
		{			 	
			header("Location: ../../CrearSoliTransporte.php?id=".$iduser);
			
		}




}
else
{
	echo "dATOS NO RECIBIDO";
}

 

