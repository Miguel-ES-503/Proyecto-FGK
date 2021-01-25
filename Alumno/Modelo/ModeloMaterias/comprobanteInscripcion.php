<?php
require_once "../../../BaseDatos/conexion.php";

// Desactivar toda notificación de error
error_reporting(0);

    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfCicloInscripcion/";

    $iduser = $_POST['alumno'];  //guarda el id del alumno
    $ciclo=$_POST['ciclo'];      //ciclo correspondiente de u
    $idExpediente = $_POST['expediente'];   //codigo del expediente u
    $incripCiclo = $_POST['idInscripcionCiclo'];   
    $comprobante = $_POST['comprobante'];


    //pruebas de extracion de datos
    // echo $iduser."<br/>";
    // echo $ciclo."<br/>";
    // echo $idExpediente."<br/>";
    // echo $incripCiclo."<br/>";
    // echo $comprobante."<br/>";

if ($tama«Ðoarchivo <= 5000000 ) {


         $RutaArchivo = "../../../pdfCicloInscripcion/".$comprobante; //Buscammos el archivo con el nombre que se encuentra en la base 

          unlink($RutaArchivo);  // Eliminanos el archivo
        if(!file_exists($destino)){
            mkdir($destino);
        }

        
        $nombrearchivo = $iduser."-".$ciclo.".pdf";
        
        $destino .= $nombrearchivo;
      

        if(copy($rutaarchivo,$destino))
        {
        $consulta=$pdo->prepare("UPDATE `inscripcionciclos` SET  `comprobante`= :comprobante WHERE `idExpedienteU` = :idExpedienteU AND `Id_InscripcionC` = :Id_InscripcionC");
         
        
        $consulta->bindParam(":comprobante",$nombrearchivo );
        $consulta->bindParam(":idExpedienteU",$idExpediente );
        $consulta->bindParam(":Id_InscripcionC",$incripCiclo );

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         { 

            //NOTIFICACIONES
        //---------------

        //Primer paso: Extraer el id del remitente (alumno) 

        //consulta del remitente
        $extraeRemitente=$pdo->prepare("SELECT `SedeAsistencia`, `correo`,`Nombre` FROM `alumnos` WHERE `ID_Alumno`=:alumno");

        //asignamos valor al campo por medio de la variable
        $extraeRemitente->bindParam(":alumno",$iduser);

        $extraeRemitente->execute();//ejecuto la consulta

        
        //condiciono la consulta de extraer Remitente
        if ($extraeRemitente->rowCount()>0) {

          $fila1=$extraeRemitente->fetch();
          $sedeAlumno=$fila1["SedeAsistencia"]; //sede a la que pertenece
          $Correo=$fila1["correo"]; //correo oportunidades del alumno
          $NombreAlumno=$fila1["Nombre"];//nombre del alumno
        }


        //*Segundo paso: Extraer el id del usuario
         //--------------------------------------------------------------------------------

         //consulta que extrae el usuario
         $extraeAlumnoUser=$pdo->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`=:correo");//alida si los correos de ambas consultas son iguales

         //asignamos valor al campo por medio de la variable
         $extraeAlumnoUser->bindParam(":correo",$Correo);//es la variable de la consulta anterior

         $extraeAlumnoUser->execute();//ejecuto la consulta

         //condiciono la consulta de extraer el Usuario
         if ($extraeAlumnoUser->rowCount()>0) {
          
           $fila2=$extraeAlumnoUser->fetch();
           $IdAlumnoUser=$fila2["IDUsuario"]; //id del usuario que pertenece al alumno
         }

         
         //*Tercer paso: Extraer el id del receptor(Coaches, super usuario)
         //--------------------------------------------------------------------------------

         //consulta que extrae el usuario
         $extraeSuperUser=$pdo->prepare("SELECT `IDUsuario`,`nombre`,`correo` FROM `usuarios` WHERE `SedeAsistencia`=:sede AND `cargo`='Coach Fase 2'");

         //asignamos valor al campo por medio de la variable
         $extraeSuperUser->bindParam(":sede",$sedeAlumno);

         $extraeSuperUser->execute();//ejecuto la consulta

        

         
         while ($fila3 = $extraeSuperUser->fetch()) {

          //consulta que inserta la notificacion en la base
           $insertaNoti=$pdo->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Materias',:idSoli)");
           //asignamos valor al campo por medio de las variables
           $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
           $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
           $insertaNoti->bindParam(":idSoli",$incripCiclo);

           $insertaNoti->execute();//ejecutamos la consulta
          
          


           
         //*Cuarto paso: Enviamos el correo al receptor(Coaches, super usuario)
         //--------------------------------------------------------------------------------
           $PrimerNombre = explode(" ", $fila3['nombre']);
           $asunto = "Solicitud de transporte";//asunto correo
           $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. "";//encabezado
           $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud para que se le apruebe los gastos de transporte. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";//cuerpo del correo
         }
                //Si todo fue correcto muestra el resultado con exito;
          header("Location: ../../ModificarInscripcio.php");       
        }
        else
        {
            echo " no se guarda";
        }
    }
    else
    {
        $_SESSION['message'] = 'Error al guardar el documento';
        $_SESSION['message2'] = 'danger';
       echo "Error al guardar el documento";
    }
}
else
{
    $_SESSION['message'] = 'Archivo Demasiado Grande';
    $_SESSION['message2'] = 'danger';
  
   echo "Archivo Demasiado Grande";
}


 ?>