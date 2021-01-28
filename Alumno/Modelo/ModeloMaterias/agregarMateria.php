<?php
include "../../../Conexion/conexion.php";
 $idMateria = utf8_encode($_POST['idMateria']);
 $idinscripcion = $_POST['idInscripcion'];
 $idexpedienteU = $_POST['idalumno'];
 session_start(); 
//dbh


//creacion de codigo aleatorio para solicitud
$MI="MI";
$n1="-";
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
$n5=mt_rand(1,9);
$n6=mt_rand(1,9);
$n7=mt_rand(1,9);
$n8=mt_rand(1,9);
$n9=mt_rand(1,9);

 //Generamos el id con el año y 4 numeros random
 $materia= $MI.$n1.$n2.$n3.$n4.$n5.$n6.$n8.$n9;
  $comp=1;


$sql = "SELECT idMateria FROM materias WHERE nombreMateria = '$idMateria' AND idExpedienteU = '$idexpedienteU' ";
$stmt= $dbh->prepare($sql);

if ($stmt->execute()) {
    while ($row = $stmt->fetch()) {
        $id =  $row['idMateria'];
    }
      //consulta para insertar solicitud de materias 
      $consulta=$dbh->prepare("INSERT INTO `inscripcionmateria`(`Id_InscripcionM`, `idMateria`,
      `Id_InscripcionC`, `nota`, `matricula`, `estado`) VALUES(:Id_InscripcionM,:idMateria,:Id_InscripcionC,
      0,1,'Inscrita')");

      $consulta->bindParam(':Id_InscripcionM',$materia);
      $consulta->bindParam(':idMateria',$id);
      $consulta->bindParam(':Id_InscripcionC',$idinscripcion);
  
  if($consulta->execute()){
        $consulta2=$dbh->prepare("UPDATE `materias` SET `estadoM`= 'Reprobada' WHERE idExpedienteU 
        = :idExpedienteU and idMateria = :idMateria");
        $consulta2->bindParam(':idExpedienteU',$idExpedienteU);
        $consulta2->bindParam(':idMateria',$id);

        if ($consulta2->execute()) {
            $_SESSION['message'] = 'Materia ingresada a la inscripcion :'. $idinscripcion;
            $_SESSION['message2'] = 'success';
            header("Location: ../../ModificarInscripcio.php?id=$idinscripcion&idAlumno=$idexpedienteU");
       }else{
            $_SESSION['message'] = 'Erro al actualizar la Materia '.$idMateria.' a la inscripcion :'. $idinscripcion;
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ModificarInscripcio.php?id=$idinscripcion&idAlumno=$idexpedienteU");
        }
    }else{
        $_SESSION['message'] = 'Erro al insertar la Materia '.$idMateria.' a la inscripcion :'. $idinscripcion;
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ModificarInscripcio.php?id=$idinscripcion&idAlumno=$idexpedienteU");
    }
        }else{
            $_SESSION['message'] = 'Error fatal';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ModificarInscripcio.php?id=$idinscripcion&idAlumno=$idexpedienteU");
    
}

?>