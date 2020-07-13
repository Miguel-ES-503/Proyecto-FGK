<?php
session_start();
require_once '../Conexion/conexion.php';



$IDAlumno=$_POST['alumno'];
$Motivo=$_POST['motivo'];
$status=$_POST['status'];
$solicitud=$_POST['solicitud'];
$fecFin=$_POST['fechaFin'];

$n1=mt_rand(1,9);
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
//Generamos el id con el año y 4 numeros random
$id=date("Y")."".$n1."".$n2."".$n3."".$n4;
  $comp=1;
    while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$dbh->prepare("SELECT COUNT(`id_solicitud`) AS existe FROM `solicitudcambio` WHERE `id_solicitud`='".$id."'");
        $query->execute();
        $existe;
        if ($query->rowCount() >0)
        {
          $r=$query->fetch();
          $existe = $r['existe'];
        }
        //Comprobamos que no exista
        if ($existe>=1) {
          $n1=mt_rand(1,9);
          $n2=mt_rand(1,9);
          $n3=mt_rand(1,9);
          $n4=mt_rand(1,9);
          // Si existe generamos otro id con el año y 4 numeros random
          $id=date("Y")."".$n1."".$n2."".$n3."".$n4;
        }else {
          $comp=2;
        }
    }

    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tamañoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../ComproCambio/";

    //**********************************************
    // Subir PDF
    //**********************************************


    $consulta=$dbh->prepare("SELECT * FROM `solicitudcambio` WHERE `id_solicitud`=:idSoli");
    $consulta->bindParam(":idSoli", $solicitud);
    $consulta->execute();

    $ArchivoPDF;
    if ($consulta->rowCount() >=0)
    {
        $filas=$consulta->fetch();
        $ArchivoPDF = $filas['Comprobante'];
    }

    //**********************************************
    // Subir PDF
    //**********************************************


    // Consulta para ver si existe un docuemento
    if ($ArchivoPDF != null) {

      if ($tamañoarchivo <= 5000000 )
      {

         $RutaArchivo = "../ComproCambio/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base
         unlink($RutaArchivo);  // Eliminanos el archivo

         if(!file_exists($destino)){
            mkdir($destino);
        }

        $Renombrar=$solicitud;
        $nombrearchivo = "";
        $nombrearchivo = $Renombrar.".pdf";
        $destino .= $nombrearchivo;

        if(copy($rutaarchivo, $destino))
        {
          //Consulta de actualización de datos
         $consulta1=$dbh->prepare("UPDATE `solicitudcambio` SET `id_status`=:id_status,`id_alumno`=:id_alumno,`Comentario`=:Comentario,`Comprobante`=:Comprobante,`fechaFin`=:fecFin,`Estado`='En espera' WHERE `id_solicitud`='".$solicitud."'");
         $consulta1->bindParam(":Comprobante",$nombrearchivo);
         $consulta1->bindParam(":id_status",$status);
         $consulta1->bindParam(":id_alumno",$IDAlumno);
         $consulta1->bindParam(":Comentario",$Motivo);
         $consulta1->bindParam(":fecFin",$fecFin);
         $consulta1->execute();


         //NOTIFICACIONES
         $extraeAlumno=$dbh->prepare("SELECT `SedeAsistencia`, `correo`,`Nombre` FROM `alumnos` WHERE `ID_Alumno`=:alumno");
         $extraeAlumno->bindParam(":alumno",$IDAlumno);
         $extraeAlumno->execute();
         if ($extraeAlumno->rowCount()>0) {
           $fila1=$extraeAlumno->fetch();
           $sedeAlumno=$fila1["SedeAsistencia"];
           $Correo=$fila1["correo"];
           $NombreAlumno=$fila1["Nombre"];
         }

         $extraeAlumnoUser=$dbh->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`=:correo");
         $extraeAlumnoUser->bindParam(":correo",$Correo);
         $extraeAlumnoUser->execute();
         if ($extraeAlumnoUser->rowCount()>0) {
           // code...
           $fila2=$extraeAlumnoUser->fetch();
           $IdAlumnoUser=$fila2["IDUsuario"];
         }

         $extraeSuperUser=$dbh->prepare("SELECT `IDUsuario`,`nombre`,`correo` FROM `usuarios` WHERE `SedeAsistencia`=:sede AND `cargo`='SuperUsuario'");
         $extraeSuperUser->bindParam(":sede",$sedeAlumno);
         $extraeSuperUser->execute();

         while ($fila3 = $extraeSuperUser->fetch()) {
           $insertaNoti=$dbh->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Cambio de estado',:idSoli)");
           $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
           $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
           $insertaNoti->bindParam(":idSoli",$solicitud);
           $insertaNoti->execute();
           //Enviamos el correo para  mandar la contraseña generado
           $PrimerNombre = explode(" ", $fila3['nombre']);
           $asunto = "Solicitud de desinscribir de taller";
           $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. "";
             $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud para que se le apruebe desinscribirse de un taller. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";

             mail($fila3['correo'],$asunto,$Mensaje,$header);

         }
         //FIN NOTIFICACIONES

         header("Location: AlumnoInicio.php");

    }
    else
    {
      $_SESSION['message'] = 'No se pudo actualizar la solicitud';
      $_SESSION['message2'] = 'danger';
      header("Location: AlumnoInicio.php");
    }




}else
{
  $_SESSION['message'] = 'Muy pesado el archivo';
  $_SESSION['message2'] = 'danger';
  header("Location: AlumnoInicio.php");
}


}else {
  if ($tamañoarchivo <= 5000000 ) {

      if(!file_exists($destino)){
          mkdir($destino);
      }

      $Renombrar=$id;
      $nombrearchivo = "";
      $nombrearchivo = $Renombrar.".pdf";
      $destino .= $nombrearchivo;

      if(copy($rutaarchivo, $destino))
      {
          //Consulta de actualización de datos
          $consulta2=$dbh->prepare("INSERT INTO `solicitudcambio`(`id_solicitud`,`id_status`,`id_alumno`, `Comentario`, `Comprobante`,`fechaFin`, `Estado`) VALUES (:idSolicitud,:id_status,:id_alumno,:comentario,:comprobante,:fecFin,'En espera')");
          $consulta2->bindParam(":comprobante",$nombrearchivo);
          $consulta2->bindParam(":id_status",$status);
          $consulta2->bindParam(":id_alumno",$IDAlumno);
          $consulta2->bindParam(":comentario",$Motivo);
          $consulta2->bindParam(":fecFin",$fecFin);
          $consulta2->bindParam(":idSolicitud",$id);
          $consulta2->execute();


          $extraeAlumno=$dbh->prepare("SELECT `SedeAsistencia`, `correo`,`Nombre` FROM `alumnos` WHERE `ID_Alumno`=:alumno");
          $extraeAlumno->bindParam(":alumno",$IDAlumno);
          $extraeAlumno->execute();
          if ($extraeAlumno->rowCount()>0) {
            $fila=$extraeAlumno->fetch();
            $sedeAlumno=$fila["SedeAsistencia"];
            $Correo=$fila["correo"];
            $NombreAlumno=$fila["Nombre"];
          }

          $extraerIdSolicitud=$dbh->prepare("");

          $extraeAlumnoUser=$dbh->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`=:correo");
          $extraeAlumnoUser->bindParam(":correo",$Correo);
          $extraeAlumnoUser->execute();
          if ($extraeAlumnoUser->rowCount()>0) {
            // code...
            $fila2=$extraeAlumnoUser->fetch();
            $IdAlumnoUser=$fila2["IDUsuario"];
          }

          $extraeSuperUser=$dbh->prepare("SELECT `IDUsuario`,`nombre`,`correo` FROM `usuarios` WHERE `SedeAsistencia`=:sede AND `cargo`='SuperUsuario'");
          $extraeSuperUser->bindParam(":sede",$sedeAlumno);
          $extraeSuperUser->execute();

          while ($fila3 = $extraeSuperUser->fetch()) {
            $insertaNoti=$dbh->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Cambio de estado',:idSoli)");
            $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
            $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
            $insertaNoti->bindParam(":idSoli",$id);
            $insertaNoti->execute();
            //Enviamos el correo para  mandar la contraseña generado
            $PrimerNombre = explode(" ", $fila3['nombre']);
            $asunto = "Solicitud de cambio de estado";
            $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]."";
              $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud de cambio de estado. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";

              mail($fila3['correo'],$asunto,$Mensaje,$header);

          }
          $_SESSION['message'] = 'Solicitud enviada, espere la respuesta.';
          $_SESSION['message2'] = 'success';
          header("Location: AlumnoInicio.php");
     }
     else
      {
        $_SESSION['message'] = 'No se pudo crear la solicitud';
        $_SESSION['message2'] = 'danger';
        header("Location: AlumnoInicio.php");
      }
    }
    else
    {
      $_SESSION['message'] = 'Muy pesado el archivo';
      $_SESSION['message2'] = 'danger';
      header("Location: AlumnoInicio.php");
    }
}

?>
