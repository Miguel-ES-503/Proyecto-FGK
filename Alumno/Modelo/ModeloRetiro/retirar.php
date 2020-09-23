<?php
require_once "../../../BaseDatos/conexion.php";
echo $idMateria = $_GET['id'];

$sql = "UPDATE materias SET  estadoM = ? WHERE idMateria = ? ";
$stmt= $pdo->prepare($sql);
echo $stmt->execute(['Retirada',$idMateria]);
header("Location: ../../MateriasRetiradas.php");
?>