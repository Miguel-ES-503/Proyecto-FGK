<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['Guardar_Ruta']))
{	
	$iduser = $_POST['iduser'];
	$ruta = $_POST['nombreruta'];
	$costo = $_POST['costo'];
	$cantidad = $_POST['cantidad'];
	$total = $costo * $cantidad;
	$observ = $_POST['observaciones'];

	$consulta=$pdo->prepare("INSERT INTO rutasbuses(ID_Alumno,ruta,costo,cantidad,total,observaciones) VALUES(:ID_Alumno,:ruta,:costo,:cantidad,:total,:observaciones)");
	$consulta->bindParam(':ID_Alumno',$iduser);
	$consulta->bindParam(':ruta',$ruta);
	$consulta->bindParam(':costo',$costo);
	$consulta->bindParam(':cantidad',$cantidad);
	$consulta->bindParam(':total',$total);
	$consulta->bindParam(':observaciones',$observ);


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

 





?>