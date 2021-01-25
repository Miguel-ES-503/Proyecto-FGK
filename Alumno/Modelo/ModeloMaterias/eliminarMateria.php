<?php

$idMateria = $_GET['id'];
session_start(); 


include "../../../Conexion/conexion.php"; 
    //consulta para eliminar la inscripcion  de la materia
    $consultaD=$dbh->prepare("DELETE FROM inscripcionmateria WHERE idMateria = :id ");
    $consultaD->bindParam(":id", $idMateria);

    //validar que se ejecute la primera consulta para pasar a la siguiente consulta
    if ($consultaD->execute()) {
        //consulta para actualizar el estado de la materia 
        $sql = "UPDATE materias SET estadoM = ?   WHERE idMateria =  ?";
        
        if ($dbh->prepare($sql)->execute([null,$idMateria])) {
            $_SESSION['message'] = 'Materia eliminada';
            $_SESSION['message2'] = 'success';
            header("Location: ../../expedienteU.php");
        }else{
            $_SESSION['message'] = 'Error al eliminar materia';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../expedienteU.php");
        }
    }

?>