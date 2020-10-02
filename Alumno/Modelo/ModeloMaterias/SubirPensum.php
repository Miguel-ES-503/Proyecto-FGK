<?php
require_once "../../../BaseDatos/conexion.php";
// Desactivar toda notificación de error
error_reporting(0);


 if(isset($_POST['actualizar']))
{



    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfPensum/";

    $iduser = $_POST['alumno'];
    //$cometario = $_POST['Comentario'];
    //$ciclo=$_POST['ciclo'];
    $idsOLI = $_POST['expediente'];

    $consulta2=$pdo->prepare("SELECT pensum FROM expedienteu where idExpedienteU = :idExpedienteU");
    $consulta2->bindParam(":idExpedienteU", $idsOLI);
    $consulta2->execute();
  
   $ArchivoPDF;
 if ($consulta2->rowCount() >=0)
 {
  $fila2=$consulta2->fetch();
  $ArchivoPDF = $fila2['pensum'];
}


if ($tama«Ðoarchivo <= 5000000 ) {



         $RutaArchivo = "../../../pdfPensum/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 

        
          unlink($RutaArchivo);  // Eliminanos el archivo
        





        if(!file_exists($destino)){
            mkdir($destino);
        }

        
        $nombrearchivo = $iduser."-pensum".".pdf";
        
        $destino .= $nombrearchivo;
      

        if(copy($rutaarchivo,$destino))
        {
        $consulta=$pdo->prepare("UPDATE `expedienteu` SET `pensum`= :pensum WHERE `ID_Alumno` = :ID_Alumno AND `estado` = 'Activo'");
         
        //$consulta->bindParam(":Comentario1",$cometario );
        $consulta->bindParam(":pensum",$nombrearchivo);
        $consulta->bindParam(":ID_Alumno",$iduser );

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
           $insertaNoti=$pdo->prepare("INSERT INTO `notificaciones`(`Id_Remitente`, `Id_Receptor`, `Tipo`,`idSolicitud`) VALUES (:idAlumnoUser,:idSuperUser,'Pensum',:idSoli)");
           //asignamos valor al campo por medio de las variables
           $insertaNoti->bindParam(":idAlumnoUser",$IdAlumnoUser);
           $insertaNoti->bindParam(":idSuperUser",$fila3['IDUsuario']);
           $insertaNoti->bindParam(":idSoli",$idsOLI);

           $insertaNoti->execute();//ejecutamos la consulta



           
         //*Cuarto paso: Enviamos el correo al receptor(Coaches, super usuario)
         //--------------------------------------------------------------------------------
           $PrimerNombre = explode(" ", $fila3['nombre']);
           $asunto = "Solicitud de transporte";//asunto correo
           $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. "";//encabezado
           $Mensaje= "El estudiante " .$NombreAlumno. " Ha hecho una solicitud para que se le apruebe los gastos de transporte. Accede al portal http://portal.workeysoportunidades.org/ para revisar esta solicitud. \n Saludos Cordiales.";//cuerpo del correo

           //creacion de corre y union de cada una de las partes anteriores
           // mail($fila3['correo'],$asunto,$Mensaje,$header);

         }

         //FIN NOTIFICACIONES





          





                //Si todo fue correcto muestra el resultado con exito;
          header("Location: ../../pensum.php?id=". $iduser);
          echo $iduser;
           
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

}








 ?>