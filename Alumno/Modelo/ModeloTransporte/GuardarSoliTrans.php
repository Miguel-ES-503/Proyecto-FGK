<?php
require_once "../../../BaseDatos/conexion.php";





//Guardar solicitud
if(isset($_POST['Guardar_SoliTrans']))
{	
	
//variables de campos soli transporte
$Id_Solicitud=$_POST['solicitud'];
$IDAlumno=$_POST['iduser'];
$ciclo=$_POST['ciclo'];


 //consulta para insertar solicitud de transporte
    $consulta=$pdo->prepare("INSERT INTO solitransporte(idSoliTrans,ID_Alumno,ID_Ciclo,observacion1,observacion2,totalSolicitado,totalAprobado,comprobante,estado) VALUES(:idSoliTrans,:ID_Alumno,:ID_Ciclo,'','', '0','0','','Proceso')");


		$consulta->bindParam(':idSoliTrans',$Id_Solicitud);
		$consulta->bindParam(':ID_Alumno',$IDAlumno);
		$consulta->bindParam(':ID_Ciclo',$ciclo);




	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../SoliTransporte.php?id=".$Id_Solicitud);
	   		echo "No se puedo guardar el dato";

	   		
	    }
		else
		{			 	
		header("Location: ../../SoliTransporte.php?id=".$Id_Solicitud);

		echo "Funciona";
		}






}
else
{
	echo "dATOS NO RECIBIDO";
}












?>