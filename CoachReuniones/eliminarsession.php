<?php
ob_start();
require_once '../Conexion/conexion.php';
// delete preguntas
$pregunta = $_POST['eliminarsession'];
$sql = "DELETE FROM one_on_one WHERE id = $pregunta";
if ($dbh->query($sql) === TRUE) {
  echo "Registro Eliminado";
  header("Location:../preguntas.php");

} else {
  echo "Error al eliminar: " . $dbh->error;
  header("Location:sessionesOneonOne.php");
}
$dbh->close();
ob_flush();