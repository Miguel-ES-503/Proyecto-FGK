<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['crear_Horario']))
{	
	$iduser = $_POST['iduser'];
	$idciclo = $_POST['ciclo'];
	$materiaretiro = $_POST['materiaretiro'];
	$acumulado=$_POST['acumulado'];
	$motivor = $_POST['motivor'];



	$consulta=$pdo->prepare("INSERT INTO soliretiro (ID_Alumno,ID_Ciclo,ID_Materia, notaAcumulada,Motivo) VALUES(:ID_Alumno,:ID_Ciclo,:ID_Materia,:notaAcumulada,:Motivo)");
	$consulta->bindParam(':ID_Alumno',$iduser);
	$consulta->bindParam(':ID_Ciclo',$idciclo);
	$consulta->bindParam(':ID_Materia',$materiaretiro);
	$consulta->bindParam(':notaAcumulada',$acumulado);
	$consulta->bindParam(':Motivo',$motivor);

	


	if (!$consulta->execute()) 
	   {
	   		
	   		echo "No se puedo guardar el dato";
	    }
		else
		{			 	
			
			
		}




}
else
{
	echo "dATOS NO RECIBIDO";
}
 
?>
