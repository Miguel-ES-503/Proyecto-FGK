<?php
include '../Conexion/conexion.php';

    $taller=$_POST['taller'];
    $alumno=$_POST['alumno'];
    $Rating=$_POST['rate'];
    $Comentario=$_POST['comentario'];
    $sql=$dbh->prepare("INSERT INTO `evaluaciontalleres`(`ID_Alumno`, `ID_Taller`, `Rating`, `Comentario`) VALUES (:ID_Alumno, :ID_Taller, :Rating, :Comentario)");
    $sql->bindParam(':ID_Alumno',$alumno);
    $sql->bindParam(':ID_Taller',$taller);
    $sql->bindParam(':Rating',$Rating);
    $sql->bindParam(':Comentario',$Comentario);
    $sql->execute();

    header("Location: AlumnoInscritos.php");





?>
