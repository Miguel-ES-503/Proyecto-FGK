<?php
require_once "../../../BaseDatos/conexion.php";
// Desactivar toda notificación de error
error_reporting(0);


 if(isset($_POST['pdfMaterias']))
{


    //variables para la creacion del archivo
    //----------------------------------------
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    //variable que crea el path de donde se guardara el pdf
    $destino = "../../../pdfCiclos/";
    //-------------------------------------------


    //Variables de los campos del modal
    //-------------------------------------------  
    $iduser = $_POST['alumno'];
    $ciclo = $_POST['ciclou'];
    $IdCiclo=$_POST['codigoIdCiclo'];
    $idExpedienteU = $_POST['expediente'];
    //-------------------------------------------


    //Consulta que selcciona el comprobante
    //-------------------------------------------

    $consulta2=$pdo->prepare("SELECT comprobante 
                              FROM inscripcionciclos 
                              WHERE Id_InscripcionC = :Id_InscripcionC");

    $consulta2->bindParam(":Id_InscripcionC", $IdCiclo);
    $consulta2->execute();
    //--------------------------------------------


     $ArchivoPDF;  //variable que guardara pdf


     if ($consulta2->rowCount() >=0)
     {
      $fila2=$consulta2->fetch();
      $ArchivoPDF = $fila2['comprobante'];
     }

     //--------------------------------------------




    if ($tama«Ðoarchivo <= 5000000 ) {


        //Buscammos el archivo con el nombre que se encuentra en la base 
         $RutaArchivo = "../../../pdfCiclos/".$ArchivoPDF; 

          //unlink($RutaArchivo);  // Eliminanos el archivo
        
      //condicion que verifica si existe archivo en el path
        if(!file_exists($destino)){

              //crea directorio
            mkdir($destino);
        }//fin if


      //nombre que tendra el archivo
        $nombrearchivo = $iduser."-".$ciclo."U".".pdf";
        
        $destino .= $nombrearchivo;
      


        if(copy($rutaarchivo,$destino))
        {

          //consulta que actualiza campos de la tabla 
          // de inscripcion ciclo y guarda el comprobante
          //----------------------------------------------

        $consulta=$pdo->prepare("UPDATE `inscripcionciclos` 
                                 SET `cicloU`= :cicloU, `comprobante`= :comprobante 
                                 WHERE `Id_InscripcionC` = :Id_InscripcionC ");
         
        $consulta->bindParam(":cicloU",$ciclo );
        $consulta->bindParam(":comprobante",$nombrearchivo);
        $consulta->bindParam(":Id_InscripcionC",$IdCiclo );

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
           header("Location: ../../InscribirCiclo.php?id=". $IdCiclo);
          echo "funciona";
           
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