<?php
require_once "../../../BaseDatos/conexion.php";
session_start();
// Desactivar toda notificación de error
error_reporting(0);

 if(isset($_POST['pdfNotas']))
{


    //variables para la creacion del archivo
    //----------------------------------------
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    //variable que crea el path de donde se guardara el pdf
    $destino = "../../../pdfNotas/";
    //-------------------------------------------


    //Variables de los campos del modal
    //-------------------------------------------  
    $iduser = $_POST['alumno'];
    //$ciclo = $_POST['ciclou'];
    $IdCiclo=$_POST['idInscripcionCiclo'];
    $idExpedienteU = $_POST['expediente'];
    //-------------------------------------------


    //Consulta que selcciona el comprobante
    //-------------------------------------------

    $consulta2=$pdo->prepare("SELECT pdfnotas 
                              FROM inscripcionciclos 
                              WHERE Id_InscripcionC = :Id_InscripcionC");

    $consulta2->bindParam(":Id_InscripcionC", $IdCiclo);
    $consulta2->execute();
    //--------------------------------------------


     $ArchivoPDF;  //variable que guardara pdf


     if ($consulta2->rowCount() >=0)
     {
      $fila2=$consulta2->fetch();
      $ArchivoPDF = $fila2['pdfnotas'];
     }

     //--------------------------------------------




    if ($tama«Ðoarchivo <= 5000000 ) {


        //Buscammos el archivo con el nombre que se encuentra en la base 
         $RutaArchivo = "../../../pdfNotas/".$ArchivoPDF; 

          //unlink($RutaArchivo);  // Eliminanos el archivo
        
      //condicion que verifica si existe archivo en el path
        if(!file_exists($destino)){

              //crea directorio
            mkdir($destino);
        }//fin if


      //nombre que tendra el archivo
        $nombrearchivo = $iduser."-"."notas".".pdf";
        
        $destino .= $nombrearchivo;
      


        if(copy($rutaarchivo,$destino))
        {

          //consulta que actualiza campos de la tabla 
          // de inscripcion ciclo y guarda el comprobante
          //----------------------------------------------

        $consulta=$pdo->prepare("UPDATE `inscripcionciclos` SET `pdfnotas`= :pdfnotas 
                                 WHERE `Id_InscripcionC` = :Id_InscripcionC ");
         
        
        $consulta->bindParam(":pdfnotas",$nombrearchivo);
        $consulta->bindParam(":Id_InscripcionC",$IdCiclo );

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
          // header("Location: ../../HistorialNotas.php?id=". $IdCiclo);
          header("Location: ../../expedienteU.php");
          $_SESSION['message'] = 'Comprobante de notas actualizado';
          $_SESSION['message2'] = 'success';
           
        }
        else
        {
          $_SESSION['message'] = 'Error al acualizar el comprobante';
          $_SESSION['message2'] = 'danger';
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