<?php
session_start();
require_once '../Conexion/conexion.php';



$IDAlumno=$_POST['alumno'];
$ciclo=$_POST['ciclo'];
$cantidad=$_POST['cantidad'];
$fecInicio=$_POST['fecInicio'];
$fecFin=$_POST['fecFin'];
$encargado=$_POST['Encargado'];
$descripcion=$_POST['descrip'];
$solicitud=$_POST['solicitud'];

$n1=mt_rand(1,9);
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
//Generamos el id con el año y 4 numeros random
$id=date("Y")."".$n1."".$n2."".$n3."".$n4;
  $comp=1;
    while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$dbh->prepare("SELECT COUNT(`ID_HSociales`) AS existe FROM `hsociales` WHERE `ID_HSociales`='".$id."'");
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
    $destino = "../ComproHoras/";


    //**********************************************
    // Subir PDF
    //**********************************************

    $consulta=$dbh->prepare("SELECT * FROM `hsociales` WHERE `ID_HSociales`=:idSoli");
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
      $RutaArchivo = "../ComproCambio/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base
      unlink($RutaArchivo);  // Eliminanos el archivo
      if ($tamañoarchivo <= 5000000 ) {
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
         $consulta1=$dbh->prepare("UPDATE `hsociales` SET `CantidadH`=:CantidadH,`FechaInicio`=:FechaInicio,`FechaFinal`=:FechaFinal,`Encargado`=:Encargado,`Descripcion`=:Descripcion,`Comprobante`=:Comprobante,`ID_Ciclo`=:ID_Ciclo,`ID_Alumno`=:ID_Alumno,`estado`='En espera' WHERE `ID_HSociales`='".$solicitud."'");
         $consulta1->bindParam(":Comprobante",$nombrearchivo);
         $consulta1->bindParam(":CantidadH",$cantidad);
         $consulta1->bindParam(":FechaInicio",$fecInicio);
         $consulta1->bindParam(":FechaFinal",$fecFin);
         $consulta1->bindParam(":Encargado",$encargado);
         $consulta1->bindParam(":Descripcion",$descripcion);
         $consulta1->bindParam(":ID_Ciclo",$ciclo);
         $consulta1->bindParam(":ID_Alumno",$IDAlumno);
         $consulta1->execute();


         //NOTIFICACIONES
         $extraeAlumno=$dbh->prepare("SELECT `SedeAsistencia`, `correo`,`Nombre` FROM `alumnos` WHERE `ID_Alumno`=:alumno");
         $extraeAlumno->bindParam(":alumno",$IDAlumno);
         $extraeAlumno->execute();
         if ($extraeAlumno->rowCount()>0) {
           $fila=$extraeAlumno->fetch();
           $sedeAlumno=$fila["SedeAsistencia"];
           $Correo=$fila["correo"];
           $NombreAlumno=$fila["Nombre"];
         }

         $extraeAlumnoUser=$dbh->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`=:correo");
         $extraeAlumnoUser->bindParam(":correo",$Correo);
         $extraeAlumnoUser->execute();
         if ($extraeAlumnoUser->rowCount()>0) {
           // code...
           $fila2=$extraeAlumnoUser->fetch();
           $IdAlumnoUser=$fila2["IDUsuario"];
         }

         $extraeSuperUser=$dbh->prepare("SELECT `IDUsuario`,`nombre`,`correo` FROM `usuarios` WHERE `SedeAsistencia`=:sede AND `cargo`='Coach Reuniones'");
         $extraeSuperUser->bindParam(":sede",$sedeAlumno);
         $extraeSuperUser->execute();

         while ($fila3 = $extraeSuperUser->fetch()) {
           $insertaNoti=$dbh->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Horas de vinculacion',:idSoli)");
           $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
           $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
           $insertaNoti->bindParam(":idSoli",$id);
           $insertaNoti->execute();
           //Enviamos el correo para  mandar la contraseña generado
           $PrimerNombre = explode(" ", $fila3['nombre']);
           $asunto = "Solicitud de horas de vinculación";
           $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. "";
           $header .= "Content-Type: text/plain; charset=UTF-8";
             $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud para que se le apruebe sus horas de vinculación. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";

             mail($fila3['correo'],$asunto,$Mensaje,$header);

         }
         //FIN NOTIFICACIONES

         header("Location: AlumnoInicio.php?combi=".$id);
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
              $consulta2=$dbh->prepare("INSERT INTO `hsociales`(`ID_HSociales`, `CantidadH`, `FechaInicio`, `FechaFinal`, `Encargado`, `Descripcion`, `Comprobante`, `ID_Ciclo`, `ID_Alumno`, `estado`) VALUES (:ID_HSociales,:CantidadH,:FechaInicio,:FechaFinal,:Encargado,:Descripcion,:Comprobante,:ID_Ciclo,:ID_Alumno,'En espera')");
              $consulta2->bindParam(":Comprobante",$nombrearchivo);
              $consulta2->bindParam(":ID_HSociales",$id);
              $consulta2->bindParam(":CantidadH",$cantidad);
              $consulta2->bindParam(":FechaInicio",$fecInicio);
              $consulta2->bindParam(":FechaFinal",$fecFin);
              $consulta2->bindParam(":Encargado",$encargado);
              $consulta2->bindParam(":Descripcion",$descripcion);
              $consulta2->bindParam(":ID_Ciclo",$ciclo);
              $consulta2->bindParam(":ID_Alumno",$IDAlumno);
              $consulta2->execute();


              //NOTIFICACIONES
              $extraeAlumno=$dbh->prepare("SELECT `SedeAsistencia`, `correo`,`Nombre` FROM `alumnos` WHERE `ID_Alumno`=:alumno");
              $extraeAlumno->bindParam(":alumno",$IDAlumno);
              $extraeAlumno->execute();
              if ($extraeAlumno->rowCount()>0) {
                $fila=$extraeAlumno->fetch();
                $sedeAlumno=$fila["SedeAsistencia"];
                $Correo=$fila["correo"];
                $NombreAlumno=$fila["Nombre"];
              }

              $extraeAlumnoUser=$dbh->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`=:correo");
              $extraeAlumnoUser->bindParam(":correo",$Correo);
              $extraeAlumnoUser->execute();
              if ($extraeAlumnoUser->rowCount()>0) {
                // code...
                $fila2=$extraeAlumnoUser->fetch();
                $IdAlumnoUser=$fila2["IDUsuario"];
              }

              $extraeSuperUser=$dbh->prepare("SELECT `IDUsuario`,`nombre`,`correo` FROM `usuarios` WHERE `SedeAsistencia`=:sede AND `cargo`='Coach Reuniones'");
              $extraeSuperUser->bindParam(":sede",$sedeAlumno);
              $extraeSuperUser->execute();

              while ($fila3 = $extraeSuperUser->fetch()) {
                $insertaNoti=$dbh->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Horas de vinculacion',:idSoli)");
                $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
                $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
                $insertaNoti->bindParam(":idSoli",$id);
                $insertaNoti->execute();
                //Enviamos el correo para  mandar la contraseña generado
                $PrimerNombre = explode(" ", $fila3['nombre']);
                $asunto = "Solicitud de horas de vinculación";
                $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. "";
                
                  $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud para que se le apruebe sus horas de vinculación. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";

                  mail($fila3['correo'],$asunto,$Mensaje,$header);

              }
              //FIN NOTIFICACIONES
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
