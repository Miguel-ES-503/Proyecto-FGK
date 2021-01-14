<?php

// Extraer id alumno por medio de correo
$stmt1 =$dbh->prepare("SELECT `ID_Alumno` FROM `alumnos` WHERE correo='".$IDCooreoAlumno."'");
// Ejecutamos
$stmt1->execute();

while($fila = $stmt1->fetch()){
    $alumno=$fila["ID_Alumno"];
}



// inicio de consulta para extrar los datos universitarios del alumno
$stmt8 = $dbh->prepare("SELECT * FROM `expedienteu` WHERE `ID_Alumno` = '".$alumno. "'");
     $stmt8->execute();

    while ($fila16 = $stmt8->fetch()) 
    {
      # code...
       $cum = $fila16['cum'];
       $avancePensum = $fila16['avancePensum'];
    }

  //fin de consulta para extraer los datos universitarios  del alumno   



?>