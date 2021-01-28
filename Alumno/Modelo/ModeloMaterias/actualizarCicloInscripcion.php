<?php
error_reporting(0);
require_once "../../../BaseDatos/conexion.php";
session_start(); 

//extraccion de datos por metodo POST
$idinscripcion = $_POST['id'];
$idalumno = $_POST['idalumno'];
$idalumno2 = $_POST['idalumno2'];
$ciclo = $_POST['ciclo'];

//prueba de extraccion de datos 
// echo $idalumno;
// echo $idinscripcion;
// echo $ciclo;

//ejemplo de como actualizar archivos 
// rename("/tmp/fichero_tmp.txt", "/home/user/login/docs/mi_fichero.txt");rename("/tmp/fichero_tmp.txt", "/home/user/login/docs/mi_fichero.txt");

//consulta para selecionar nombre de archivo
$stmt  =$pdo->prepare("SELECT comprobante  FROM inscripcionciclos WHERE Id_InscripcionC='$idinscripcion' ");
$stmt->execute();

while ($row = $stmt->fetch()) {
 $comprobante = $row['comprobante'];
}

//consulta para cambiar ciclo de inscripción
$sql2 = "UPDATE  inscripcionciclos  SET cicloU = ? , comprobante = ? WHERE 	
idExpedienteU=? AND Id_InscripcionC = ?";

//nuevo comprobante
$nuevoComprobante = ($idalumno2."-".$ciclo);

//validar si la consulta se ejecuto
if($pdo->prepare($sql2)->execute([$ciclo,$nuevoComprobante,$idalumno,$idinscripcion])){
    rename("../../pdfCicloInscripcion/$comprobante", "../../pdfCicloInscripcion/$nuevoComprobante");
    $_SESSION['message'] = 'Ciclo actualizado';
	$_SESSION['message2'] = 'success';
header("Location: ../../ModificarInscripcio.php?id=".$idinscripcion);
}
else{
    $_SESSION['message'] = 'No se pudo actualizar el ciclo';
	$_SESSION['message2'] = 'danger';
header("Location: ../../ModificarInscripcio.php?id=".$idinscripcion);
}


?>