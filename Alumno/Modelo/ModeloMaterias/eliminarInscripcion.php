<?php
require_once "../../../BaseDatos/conexion.php";
  // si ocure un error se ocultara con error_reporting(0);
  error_reporting(0);
  session_start();
  $iddescripcion = $_POST['idmateria'];
  $idInscripcionCiclo= $_POST['idsoliTrans'];

  $sql = "DELETE FROM `inscripcionmateria` WHERE idMateria = '$iddescripcion' ";        
  $q = $pdo->prepare($sql);
// validar si  la consulta se ejecuto exitosamente, sino devolvemos una alerta
if ($response = $q->execute()) {
  $sql2 = $pdo->prepare("UPDATE  materias SET estadoM = ? WHERE idMateria = ? ");
  // validar si la segunda consulta se ejecuto
  if($sql2->execute(array(null,$iddescripcion))){
      //Si todo fue correcto muestra el resultado con exito;
	    $_SESSION['message'] = 'materia desinscrita';
	    $_SESSION['message2'] = 'success';
      header("Location: ../../InscripcionMateriasCiclo.php?id=".$idInscripcionCiclo);
  }else{
    $_SESSION['message'] = 'Error, No se pudo actualizar el estado de la materia: '.$iddescripcion;
    $_SESSION['message2'] = 'danger';
    header("Location: ../../InscripcionMateriasCiclo.php?id=".$idInscripcionCiclo);
  }
}else{
  $_SESSION['message'] = 'Error, No se pudo desincribir la materia: '.$iddescripcion;
  $_SESSION['message2'] = 'danger';
  header("Location: ../../InscripcionMateriasCiclo.php?id=".$idInscripcionCiclo);
}
?>