<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$IDAlumno = $_POST['IDalumno'];
$CicloActual = "0". $_POST['CilcoActual'];
$YearNota = $_POST['yearNota'];

if(isset($_POST["GuardarNotas"])){
    $nombrearchivo = $_FILES["archivo"]["name"];
    $tipoarchivo = $_FILES["archivo"]["type"];
    $tama«Ðoarchivo = $_FILES["archivo"]["size"];
    $rutaarchivo = $_FILES["archivo"]["tmp_name"];
    $destino = "../../../pdfNotasAlumnos/";
    
  
   
    
    //**********************************************
    // Subir PDF 
    //**********************************************

    $nombrearchivo2 = $IDAlumno."-". $YearNota  . "-" . $CicloActual . ".pdf";
  

$consulta5=$pdo->prepare("SELECT COUNT(`ComprobanteNotas`) as existe FROM notas where `ComprobanteNotas`= ? ");
$consulta5->execute(array($nombrearchivo2));

$ArchivoPDF;
if ($consulta5->rowCount() >=0)
{
  $fila2=$consulta5->fetch();
  $ArchivoPDF = $fila2['existe'];
}


if($ArchivoPDF >= 1)
{
  $_SESSION['message'] = 'Comprobante ya existe';
  $_SESSION['message2'] = 'danger';
  header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
}
else
{


if ($tama«Ðoarchivo <= 5000000 ) {

        if(!file_exists($destino)){
            mkdir($destino);
        }

        $nombrearchivo = "";
        $nombrearchivo = $IDAlumno."-". $YearNota  . "-" . $CicloActual . ".pdf";
        $destino .= $nombrearchivo;
      

        if(copy($rutaarchivo, $destino))
        {
            //Consulta de actualizaci«Ñn de datos
         $consulta=$pdo->prepare("INSERT INTO notas(ID_Alumno,CicloU,Year,ComprobanteNotas) VALUES(:ID_Alumno,:CicloU,:Year,:ComprobanteNotas)");
         $consulta->bindParam(":ID_Alumno", $IDAlumno);
         $consulta->bindParam(":CicloU", $CicloActual);
         $consulta->bindParam(":Year",$YearNota );
         $consulta->bindParam(":ComprobanteNotas",$nombrearchivo);


              //Verifica si ha insertado los datos
         if ($consulta->execute()) 
         {
                //Si todo fue correcto muestra el resultado con exito;
            $_SESSION['message'] = 'PDF Subido con exito';
            $_SESSION['message2'] = 'success';
            header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));

        }
        else
        {
            $_SESSION['message'] = 'PDF No Subido';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
        }

    }
    else
    {
        $_SESSION['message'] = 'Error al guardar el documento';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
    }
}
else
{
    $_SESSION['message'] = 'Archivo Demasiado Grande';
    $_SESSION['message2'] = 'danger';
   header("Location: ../../NotasPorAlumno.php?id=".urlencode($IDAlumno));
}

}




}// aqui termina de verificar si exite un archivo





?>