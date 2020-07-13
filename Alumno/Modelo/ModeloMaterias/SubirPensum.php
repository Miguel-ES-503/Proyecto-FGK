<?php
require_once "../../../BaseDatos/conexion.php";



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
                //Si todo fue correcto muestra el resultado con exito;
            header("Location: ../../Pensum.php?id=". $iduser);
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