<?php
require_once "../../../BaseDatos/conexion.php";
 
echo $iddescripcion = $_POST['idmateria'];

$sql = "DELETE FROM `inscripcionmateria` WHERE idMateria = '$iddescripcion' ";        
$q = $pdo->prepare($sql);

$response = $q->execute();


  $sql2 = $pdo->prepare("UPDATE  materias SET estadoM = ? WHERE idMateria = ? ");
  if($sql2->execute(array(" ",$iddescripcion))){
      echo "Chale ya funcionado";
      header("Location: ../../InscripcionMateriasCiclo.php?id=".$idInscripcionCiclo);
  }else{
      echo "Chale no funciona";
  }
?>