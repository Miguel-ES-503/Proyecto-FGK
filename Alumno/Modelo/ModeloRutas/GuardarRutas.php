<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST['Guardar_Ruta']))
{	
	//$iduser = $_POST['iduser'];
	$ruta = $_POST['nombreruta'];
	$costo = $_POST['costo'];
	$Id_Soli = $_POST['solicitud'];
	//$cantidad = $_POST['cantidad'];
	//$total = $costo * $cantidad;
	$observ = $_POST['observaciones'];

	$consulta=$pdo->prepare("INSERT INTO rutasbuses(idSoliTrans,nombreruta,costo,observacion) VALUES(:idSoliTrans,:nombreruta,:costo,:observacion)");

	$consulta->bindParam(':idSoliTrans',$Id_Soli);
	$consulta->bindParam(':nombreruta',$ruta);
	$consulta->bindParam(':costo',$costo);
	$consulta->bindParam(':observacion',$observ);
	


	if (!$consulta->execute()) 
	   {
	   		header("Location: ../../CrearSoliTransporte.php?id=".$Id_Soli);
	   		echo "No se puedo guardar el dato";
	    }
		else
		{			 
			//echo $Id_Soli;
			header("Location: ../../CrearSoliTransporte.php?id=".$Id_Soli);
		}




}
else
{
	echo "dATOS NO RECIBIDO";
}

 





?>