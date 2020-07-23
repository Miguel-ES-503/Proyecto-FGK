<?php 
require_once '../Conexion/conexion.php';
$idmod = $_POST['id'];
$sql = "UPDATE modulos SET estado = 1 WHERE id_modulo=?";
$dbh->prepare($sql)->execute([$idmod]);
header("Location:activarmodulos.php");
?>
