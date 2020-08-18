<?php
require_once "../../../BaseDatos/conexion.php";





//Guardar solicitud
if(isset($_POST['Guardar_InscriCiclo']))
{	
	
//variables de campos soli transporte
$expediente=$_POST['expediente'];
$idCicloInscripcion=$_POST['inscriCiclo'];



 //consulta para insertar solicitud de transporte
    $consulta=$pdo->prepare("INSERT INTO inscripcionciclos (Id_InscripcionC,idExpedienteU, cicloU, comprobante) VALUES(:Id_InscripcionC,:idExpedienteU,'','')");


		$consulta->bindParam(':Id_InscripcionC',$idCicloInscripcion);
		$consulta->bindParam(':idExpedienteU',$expediente);
		




	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../InscripcionMateriasCiclo.php?id=".$idCicloInscripcion);
	   		echo "No se puedo guardar el dato";

	   		
	    }
		else
		{			 	
		header("Location: ../../InscripcionMateriasCiclo.php?id=".$idCicloInscripcion);

		echo "Funciona";
		}






}
else
{
	echo "dATOS NO RECIBIDO";
}












?>