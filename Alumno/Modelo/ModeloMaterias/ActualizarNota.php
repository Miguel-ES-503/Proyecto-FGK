<?php
error_reporting(0);
require_once "../../../BaseDatos/conexion.php";
header('Content-Type: text/html; charset=utf-8');
session_start(); 
$idMateria=$_POST['materia'];
$nota=$_POST['nota'];
$estado=$_POST['estado'];

$idInscripcionCiclo=$_POST['idInscripcionCiclo'];
$idInscripcionM=$_POST['idInscripcionM'];
$idExpedienteU=$_POST['expedienteu'];

$sql = "UPDATE inscripcionmateria SET  nota=?, estado = ? WHERE idMateria=?";
$pdo->prepare($sql)->execute([ $nota, $estado,$idMateria]);

$sql2 = "UPDATE materias SET estadoM = ? WHERE idMateria=?";
if($pdo->prepare($sql2)->execute([$estado,$idMateria])){
    $_SESSION['message'] = 'Nota actualizada';
	$_SESSION['message2'] = 'success';
header("Location: ../../Notas.php?id=".$idInscripcionCiclo);
}
else{
    $_SESSION['message'] = 'No se pudo actualizar la nota';
	$_SESSION['message2'] = 'Erro';
header("Location: ../../Notas.php?id=".$idInscripcionCiclo);
}
?>