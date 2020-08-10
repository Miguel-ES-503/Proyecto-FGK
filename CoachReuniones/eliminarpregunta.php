<?php
require_once '../Conexion/conexion.php';
// delete preguntas
$pregunta = $_POST['eliminar'];
$sql = "DELETE FROM preguntas WHERE id = $pregunta";
if ($dbh->query($sql) === TRUE) {
  echo "Horario Eliminado";
  header("Location:../preguntas.php");

} else {
  echo "Error al eliminar: " . $dbh->error;
  header("Location:preguntas.php");
}
$dbh->close();