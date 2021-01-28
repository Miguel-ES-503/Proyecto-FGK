<?php

$idMateria = $_GET['id'];
$idciclo = $_GET['idciclo'];
$alumno = $_GET['alumno'];
session_start(); 
// si el programa presenta errores, se ocultan con error_reporting(0);
error_reporting(0);

include "../../../Conexion/conexion.php"; 
    //consulta para eliminar la inscripcion  de la materia
    $consultaD=$dbh->prepare("DELETE FROM inscripcionmateria WHERE idMateria = :id AND Id_InscripcionC = :ciclo");
    $consultaD->bindParam(":id", $idMateria);
    $consultaD->bindParam(":ciclo", $idciclo);

    //validar que se ejecute la primera consulta para pasar a la siguiente consulta
    if ($consultaD->execute()) {
        //consulta para actualizar el estado de la materia 
        $sql = "UPDATE materias SET estadoM = ?   WHERE idMateria =  ?";
        
        if ($dbh->prepare($sql)->execute([null,$idMateria])) {
            $_SESSION['message'] = 'Materia eliminada';
            $_SESSION['message2'] = 'success';
            header("Location: ../../ModificarInscripcio.php?id=$idciclo&idAlumno=$alumno");
        }else{
            $_SESSION['message'] = 'Error al eliminar materia';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ModificarInscripcio.php?id=$idciclo&idAlumno=$alumno");
        }
    }

?>