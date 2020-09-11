<?php
require_once "../../../BaseDatos/conexion.php";
 
$idMateria=$_POST['materia'];
$nota=$_POST['nota'];
$estado=$_POST['estado'];

$idInscripcionCiclo=$_POST['idInscripcionCiclo'];
$idInscripcionM=$_POST['idInscripcionM'];
$idExpedienteU=$_POST['expedienteu'];

echo "ID materia: ".$idInscripcionM."<br>"."nota: ".$nota."<br>"."estado: ".$estado."<br>";
$sql = "UPDATE inscripcionmateria SET  nota=?, estado = ? WHERE idMateria=?";
$pdo->prepare($sql)->execute([ $nota, $estado,$idMateria]);

$sql2 = "UPDATE materias SET estadoM = ? WHERE idMateria=?";
$pdo->prepare($sql2)->execute([$estado,$idMateria]);
header("Location: ../../Notas.php?id=".$idInscripcionCiclo);
?>