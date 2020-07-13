<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  



$idComprobante = $_POST['id'];
$IDAlumno = $_POST['id2'];




$consulta2=$pdo->prepare("DELETE FROM notas WHERE  ComprobanteNotas=:ComprobanteNotas");
$consulta2->bindParam(":ComprobanteNotas", $idComprobante );

//Verifica si ha insertado los datos
if ($consulta2->execute()) 
    {
				//Si todo fue correcto muestra el resultado con exito;
	$_SESSION['message'] = 'Nota Eliminado con exito';
	$_SESSION['message2'] = 'success';
         	$RutaArchivo = "../../../pdfNotasAlumnos/".$idComprobante; //Buscammos el archivo con el nombre que se encuentra en la base 
         unlink($RutaArchivo);  // Eliminanos el archivo
         header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
     }
     else
     {
     	$_SESSION['message'] = 'Fallo al Eliminar Nota';
     	$_SESSION['message2'] = 'danger';
     	header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
     }




     ?>