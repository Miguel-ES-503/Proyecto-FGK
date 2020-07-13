<?php
require_once "../../../BaseDatos/conexion.php";



if(isset($_POST["comprobante"])){
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfTransporte/";

    $iduser = $_POST['iduser'];
    $cometario = $_POST['Comentario'];
    $ciclo=$_POST['ciclo'];

    
  
  


if ($tama«Ðoarchivo <= 5000000 ) {

        if(!file_exists($destino)){
            mkdir($destino);
        }

        
        $nombrearchivo = $iduser."-".$ciclo.".pdf";
        
        $destino .= $nombrearchivo;
      

        if(copy($rutaarchivo,$destino))
        {
        $consulta=$pdo->prepare("INSERT INTO solitransporte(ID_Alumno,ID_Ciclo,Comentario1,comprobante) VALUES(:ID_Alumno,:ID_Ciclo,:Comentario1,:comprobante)");
         $consulta->bindParam(":ID_Alumno", $iduser);
         $consulta->bindParam(":ID_Ciclo", $ciclo);
         $consulta->bindParam(":Comentario1",$cometario );
         $consulta->bindParam(":comprobante",$nombrearchivo);


              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            header("Location: ../../DetallesSolicitud.php?id=". $iduser);
           
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






}else if(isset($_POST['actualizar']))
{



    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfTransporte/";

    $iduser = $_POST['iduser'];
    $cometario = $_POST['Comentario'];
    $ciclo=$_POST['ciclo'];
    $idsOLI = $_POST['idsoli'];

    $consulta2=$pdo->prepare("SELECT comprobante FROM solitransporte where ID_Slicitud = :ID_Slicitud");
    $consulta2->bindParam(":ID_Slicitud", $idsOLI);
    $consulta2->execute();
  
   $ArchivoPDF;
 if ($consulta2->rowCount() >=0)
 {
  $fila2=$consulta2->fetch();
  $ArchivoPDF = $fila2['comprobante'];
}


if ($tama«Ðoarchivo <= 5000000 ) {



         $RutaArchivo = "../../../pdfTransporte/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 

        
          unlink($RutaArchivo);  // Eliminanos el archivo
        





        if(!file_exists($destino)){
            mkdir($destino);
        }

        
        $nombrearchivo = $iduser."-".$ciclo.".pdf";
        
        $destino .= $nombrearchivo;
      

        if(copy($rutaarchivo,$destino))
        {
        $consulta=$pdo->prepare("UPDATE `solitransporte` SET `Comentario1`= :Comentario1 ,`comprobante`= :comprobante WHERE `ID_Alumno` = :ID_Alumno AND `estado` = 'Proceso'");
         
        $consulta->bindParam(":Comentario1",$cometario );
        $consulta->bindParam(":comprobante",$nombrearchivo);
        $consulta->bindParam(":ID_Alumno",$iduser );

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            header("Location: ../../DetallesSolicitud.php?id=". $iduser);
           
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