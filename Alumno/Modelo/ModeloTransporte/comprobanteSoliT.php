<?php
require_once "../../../BaseDatos/conexion.php";


if(isset($_POST['subirComprobante']))
{
 
    
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfTransporte/";
    //variables
    $cometario = $_POST['Comentario'];
    $idsOLI = $_POST['soli'];


    //Consulta en la base si exite pdf
  $Consulta = $pdo->prepare("SELECT `comprobante` FROM solitransporte WHERE idSoliTrans = ?");
  $Consulta->execute(array($idsOLI));
  $fila=$Consulta->fetch();
  $ArchivoPDF;
  $ArchivoPDF = $fila['comprobante'];
  
  //Condcion si existe un documento
  if ($ArchivoPDF != ""|| $ArchivoPDF != null) {
  		 
  		$RutaArchivo = "../../../pdfTransporte/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 
         unlink($RutaArchivo);  // Eliminanos el archivo
  }



   if ($tipoarchivo != null) {
   			if ($tama«Ðoarchivo <= 5000000 ) {

   				 if(!file_exists($destino)){
            mkdir($destino); //aQui solo entra si no exite la carpeta
            }
            //Entra a guardar el archivo
        $nombrearchivo = $idsOLI.".pdf";
        $destino .= $nombrearchivo;
        if(copy($rutaarchivo, $destino))
        {
      
       $consulta2=$pdo->prepare("UPDATE `solitransporte` SET `observacion1`= :observacion1 ,`comprobante`= :comprobante WHERE `idSoliTrans` = :idSoliTrans ");

    	$consulta2->bindParam(":idSoliTrans",$idsOLI );
        $consulta2->bindParam(":observacion1",$cometario );
        $consulta2->bindParam(":comprobante",$nombrearchivo);

        if ($consulta2->execute()) {

        header("Location: ../../SoliTransporte.php?id=".urlencode($idsOLI));

        }else
        {
        	echo "FAllo al actualizar en la base de datos";
        }

        }else
        {
        	echo "se produjo un error al guardar el archivo";
        }	

   	}else
   	{
        echo "ARCHIVO DEMASIANDO GRAN";
    }
   }else
   {
   	echo "NO hay archivo";
   }
   



  
}


?>
