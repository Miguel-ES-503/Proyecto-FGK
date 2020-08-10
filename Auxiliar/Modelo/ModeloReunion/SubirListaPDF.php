<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$IDTaller = $_POST['idtaller'];

if(isset($_POST["crear"])){
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tamañoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfListaReunion/";
    $Renombrar = $_POST['idpdf'];
    $consulta2=$pdo->prepare("SELECT * FROM reuniones where ID_Reunion = :ID_Reunion");
    $consulta2->bindParam(":ID_Reunion", $IDTaller);
    $consulta2->execute();

    $ArchivoPDF;
    if ($consulta2->rowCount() >=0)
    {
        $fila2=$consulta2->fetch();
        $ArchivoPDF = $fila2['ComprobanteLista'];
    }
    
    //**********************************************
    // Subir PDF 
    //**********************************************


    // Consulta para ver si existe un docuemento
    if ($ArchivoPDF != null) {

      if ($tamañoarchivo <= 5000000 ) 
      {

         $RutaArchivo = "../../../pdfListaReunion/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 
         unlink($RutaArchivo);  // Eliminanos el archivo

         if(!file_exists($destino)){
            mkdir($destino);
        }


        $nombrearchivo = "";
        $nombrearchivo = $Renombrar.".pdf";
        $destino .= $nombrearchivo;

        if(copy($rutaarchivo, $destino))
        {
          //Consulta de actualización de datos
         $consulta=$pdo->prepare("UPDATE reuniones SET  ComprobanteLista=:ComprobanteLista   WHERE ID_Reunion=:id");
         $consulta->bindParam(":ComprobanteLista",$nombrearchivo);
         $consulta->bindParam(":id",$IDTaller);

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            $_SESSION['message'] = 'PDF Subido con exito';
            $_SESSION['message2'] = 'success';
            header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));

        }
        else
        {
            $_SESSION['message'] = 'PDF No Subido';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
        }

    }
    else
    {
        $_SESSION['message'] = 'No has seleccionado un archivo';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
    }




}else 
{
    $_SESSION['message'] = 'Archivo Demasiado Grande';
    $_SESSION['message2'] = 'danger';
    header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
}


} 
 else // Si no existe un documento realize este operacion
 {


    if ($tamañoarchivo <= 5000000 ) {

        if(!file_exists($destino)){
            mkdir($destino);
        }
        
        $nombrearchivo = "";
        $nombrearchivo = $Renombrar.".pdf";
        $destino .= $nombrearchivo;

        if(copy($rutaarchivo, $destino))
        {
            //Consulta de actualización de datos
         $consulta=$pdo->prepare("UPDATE reuniones SET  ComprobanteLista=:ComprobanteLista   WHERE ID_Reunion=:id");
         $consulta->bindParam(":ComprobanteLista",$nombrearchivo);
         $consulta->bindParam(":id",$IDTaller);

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            $_SESSION['message'] = 'PDF Subido con exito';
            $_SESSION['message2'] = 'success';
            header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));

        }
        else
        {
            $_SESSION['message'] = 'PDF No Subido';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
        }

    }
    else
    {
        $_SESSION['message'] = 'Error al guardar el documento';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
    }
}
else
{
    $_SESSION['message'] = 'Archivo Demasiado Grande';
    $_SESSION['message2'] = 'danger';
    header("Location: ../../ListaReunion.php?id=".urlencode($IDTaller));
}

}// aqui termina de verificar si exite un archivo


}


?>