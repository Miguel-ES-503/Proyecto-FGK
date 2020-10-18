<?php
require_once "../../../BaseDatos/conexion.php";
error_reporting(0);
if(isset($_POST["pdfRetiros"])){

  //variables del archivo
  //*********************************************
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfRetiros/";


    //variables de campos retiro
    //*********************************************
    $idMateria=$_POST['materiaRetirada'];
  $comentario=$_POST['Comentario'];
  $Idexpediente=$_POST['expediente1'];
  $IdAlumno=$_POST['idalumno'];
  //*********************************************

  //Cconsulta para mostrar el id de la inscripcion materias
  //*******************************************************
  /*$consulta1=$pdo->prepare("SELECT IM.Id_InscripcionC, IM.Id_InscripcionM 
                             FROM inscripcionmateria  IM INNER JOIN materias M
                             ON M.idMateria = IM.idMateria
                             WHERE M.idExpedienteU = :idExpedienteU AND IM.idMateria= :idMateria");

     $consulta1->bindParam(":idExpedienteU",$Idexpediente );
     $consulta1->bindParam(":idMateria",$idMateria);*/
     //$consulta1->execute();

     //creacion de variable inscripcionM  
    /* $Id_InscripcionM;

     if ($consulta1->rowCount()>=1)
          {
          while ($fila=$consulta1->fetch())
           {   
             $Id_InscripcionM = $fila['Id_InscripcionM'];
           }
     }//fin if*/


     //Consulta en la base si exite pdf
    $consulta2 = $pdo->prepare("SELECT `comprobante` FROM retiros WHERE Id_InscripcionM = ?");
    $consulta2->execute(array($idMateria));
   $fila=$consulta2->fetch();

    $ArchivoPDF;
    $ArchivoPDF = $fila['comprobante'];


    //Condcion si existe un documento
  if ($ArchivoPDF != ""|| $ArchivoPDF != null) {
       
      $RutaArchivo = "../../../pdfRetiros/".$ArchivoPDF; //Buscammos el archivo con el nombre que se encuentra en la base 
         unlink($RutaArchivo);  // Eliminanos el archivo
  }




   if ($tipoarchivo != null) {
        if ($tama«Ðoarchivo <= 5000000 ) {

           if(!file_exists($destino)){
            mkdir($destino); //aQui solo entra si no exite la carpeta
            }
            //Entra a guardar el archivo
        $nombrearchivo = $IdAlumno."retiro".".pdf";
        $destino .= $nombrearchivo;



        if(copy($rutaarchivo, $destino))
        {

           $consulta3=$pdo->prepare("INSERT INTO retiros(Id_InscripcionM,motivo,observacion,comprobante) VALUES(:Id_InscripcionM,:motivo,'',:comprobante)");
      

      

      $consulta3->bindParam(":Id_InscripcionM",$idMateria );
        $consulta3->bindParam(":motivo",$comentario );
        $consulta3->bindParam(":comprobante",$nombrearchivo);

        if ($consulta3->execute()) {

        //header("Location: ../../RetiroMateria.php?id=".urlencode($Id_InscripcionM));
          echo "funciona";

        }else
        {
          echo "FAllo al insertar en la base de datos";
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