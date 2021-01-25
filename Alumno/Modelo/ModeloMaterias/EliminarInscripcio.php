<?php

require_once "../../../BaseDatos/conexion.php";
session_start(); 
$ID= $_GET['id'];
$idAlumno = $_GET['idAlumno'];

//inicio de consultas de tipo SELECT

//consulta para extraer las notas de la tablas materias
$stmt = $pdo->prepare("SELECT * FROM `inscripcionmateria` WHERE Id_InscripcionC = ?");
$stmt->execute([$ID]); 

//consulta para contar cuantos registros fueron selecionados de la tabla  inscripcionmateria
$stmt8162168 = $pdo->prepare("SELECT COUNT(*) FROM `inscripcionmateria` WHERE Id_InscripcionC = ?");
$stmt8162168->execute([$ID]); 
$number_of_rows = $stmt8162168->fetchColumn(); 

// fin de consultas de tipo SELECT




//Este for sirve para eliminar todas las materias que fueron inscritas en la inscripcion selecionada,
//Ademas actualiza las materias que se inscribieron

//INICIO DE FOR
   $stmt1645641 = $consultaD=$pdo->prepare("DELETE FROM inscripcionmateria WHERE  	Id_InscripcionC = :Id_InscripcionC");
   $stmt1645641->bindParam(":Id_InscripcionC",$ID);

    //validación para saber si la consulta que elimina las inscripciones de materias fue ejecutada 
    if ($stmt1645641->execute()) {
        //consulta para eliminar la inscripcion de ciclo selecionada
        $consultaD=$pdo->prepare("DELETE FROM inscripcionciclos WHERE  Id_InscripcionC=:id AND idExpedienteU =:idAlumno");
        $consultaD->bindParam(":id", $ID);
        $consultaD->bindParam(":idAlumno", $idAlumno);
        // validar si la consulta que la inscripcion de ciclo fue eliminada
        if ($consultaD->execute()) {
            //consulta para actualizar la tabla materias
            while ($row = $stmt->fetch()) {
                $materia = $row['idMateria'];         
                for ($i=0; $i < $number_of_rows; $i++) { 
                    //consulta para actualizar las materias
                    $consulta2=$pdo->prepare("UPDATE materias SET estadoM = null WHERE idMateria = :idmateria AND idExpedienteU =:idAlumno");        
                    $consulta2->bindParam(":idmateria",$materia);
                    $consulta2->bindParam(":idAlumno",$idAlumno);
                    $consulta2->execute();
                }

            }  
            if ($consulta2->execute()) {
                //Si todo fue correcto muestra el resultado con exito;
                $_SESSION['message'] = 'Inscripción eliminada';
                $_SESSION['message2'] = 'success';
                header("Location: ../../expedienteU.php");
            }else{
                $_SESSION['message'] = 'Error al eliminar al actualizar las materias, ERROR'.$number_of_rows.'';
                $_SESSION['message2'] = 'danger';
                header("Location: ../../expedienteU.php");
            }
	      
        }else{
            $_SESSION['message'] = 'Error al eliminar la inscripción  de ciclo, ERROR2';
    	    $_SESSION['message2'] = 'danger';
    	    header("Location: ../../expedienteU.php");
        }
    }
    else
    {
    	//Si todo fue correcto muestra el resultado con exito;
    	$_SESSION['message'] = 'Error al eliminar la inscripción  de materias, ERROR1';
    	$_SESSION['message2'] = 'danger';
    	header("Location: ../../expedienteU.php");
    }

?>