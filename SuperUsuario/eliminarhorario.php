<?php
require_once '../Conexion/conexion.php';
// delete preguntas
$id = $_POST['Disponible2'];
$sql = "DELETE FROM one_on_one WHERE id = $id";
if ($dbh->query($sql) === TRUE) {
  echo "Registro Eliminado";
  header("Location:../preguntas.php");

} else {
  echo "Error al eliminar: " . $dbh->error;
  header("Location:sessionesOneonOne.php");
}
$dbh->close();