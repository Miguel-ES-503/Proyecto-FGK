<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$IDHoriaro= $_GET['id'];
$IDtRASNPO = $_GET['id2'];
$idSolicitud = $_GET['id3'];
$consultaD=$pdo->prepare("DELETE FROM ruta_horario WHERE  idHorarioTrans= :idHorarioTrans AND idRuta=:idRuta");
$consultaD->bindParam(":idHorarioTrans", $IDHoriaro);
$consultaD->bindParam(":idRuta", $IDtRASNPO);

if ($consultaD->execute()) {
	
	
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Empresa elimando con exito';
	$_SESSION['message2'] = 'success';
	header("Location: ../../CrearSoliTransporte.php?id=".$idSolicitud);
	
}
else
{
	//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Fallo  al Eliminar Empresas';
	$_SESSION['message2'] = 'success';
	header("Location: ../../CrearSoliTransporte.php?id=".$idSolicitud);
}

?>