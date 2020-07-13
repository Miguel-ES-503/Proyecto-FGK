<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$IDTaller = $_POST['idtaller'];

if(isset($_POST["crear"])){
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tamaè´–oarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../pdfListaTaller/";
    $Renombrar = $_POST['idpdf'];
    
    $consulta2=$pdo->prepare("SELECT * FROM talleres where ID_Taller = :ID_Taller");
    $consulta2->bindParam(":ID_Taller", $IDTaller);
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

      if ($tamaè´–oarchivo <= 5000000 ) 
      {

         $RutaArchivo = "../../pdfListaTaller/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 
         unlink($RutaArchivo);  // Eliminanos el archivo

         if(!file_exists($destino)){
            mkdir($destino);
        }

        $nombrearchivo = "";
        $nombrearchivo = $Renombrar.".pdf";
        $destino .= $nombrearchivo;

        if(copy($rutaarchivo, $destino))
        {
          //Consulta de actualizaciè´—n de datos
         $consulta=$pdo->prepare("UPDATE talleres SET  ComprobanteLista=:ComprobanteLista   WHERE ID_Taller=:id");
         $consulta->bindParam(":ComprobanteLista",$nombrearchivo);
         $consulta->bindParam(":id",$IDTaller);

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            $_SESSION['message'] = 'PDF Subido con exito';
            $_SESSION['message2'] = 'success';
            header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));

        }
        else
        {
            $_SESSION['message'] = 'PDF No Subido';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));
        }

    }
    else
    {
        $_SESSION['message'] = 'No has seleccionado un archivo';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));
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


    if ($tamaè´–oarchivo <= 5000000 ) {

        if(!file_exists($destino)){
            mkdir($destino);
        }
         $nombrearchivo = "";
        $nombrearchivo = $Renombrar.".pdf";

        $destino .= $nombrearchivo;

        if(copy($rutaarchivo, $destino))
        {
            //Consulta de actualizaciè´—n de datos
         $consulta=$pdo->prepare("UPDATE talleres SET  ComprobanteLista=:ComprobanteLista   WHERE ID_Taller=:id");
         $consulta->bindParam(":ComprobanteLista",$nombrearchivo);
         $consulta->bindParam(":id",$IDTaller);

              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            $_SESSION['message'] = 'PDF Subido con exito';
            $_SESSION['message2'] = 'success';
            header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));

        }
        else
        {
            $_SESSION['message'] = 'PDF No Subido';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));
        }

    }
    else
    {
        $_SESSION['message'] = 'Error al guardar el documento';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));
    }
}
else
{
    $_SESSION['message'] = 'Archivo Demasiado Grande';
    $_SESSION['message2'] = 'danger';
   header("Location: ../../ListaTaller.php?id=".urlencode($IDTaller));
}

}// aqui termina de verificar si exite un archivo


}


?>