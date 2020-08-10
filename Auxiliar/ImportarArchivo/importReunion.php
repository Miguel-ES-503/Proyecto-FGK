<?php
include("../../BaseDatos/conexion.php"); //Conexion con la base de datos

include "class.upload.php";
$ID = $_POST['MantenerID'];
session_start();

if(isset($_FILES["name"])){
    $up = new Upload($_FILES["name"]);
    if($up->uploaded){
        $up->Process("./uploads/");
        if($up->processed){
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 3; $row <= $highestRow; $row++)
            { 
                $IDAlumno = $sheet->getCell("A".$row)->getValue();
                $IDTaller = $sheet->getCell("B".$row)->getValue();
                $Asis = $sheet->getCell("I".$row)->getValue();

                $consulta=$pdo->prepare("UPDATE inscripcionreunion  SET   asistencia=:asistencia   WHERE id_alumno =:id_alumno AND id_reunion = :id_reunion");
                $consulta->bindParam(":asistencia",$Asis);
                $consulta->bindParam(":id_alumno",$IDAlumno);
                $consulta->bindParam(":id_reunion",$IDTaller);

                 //Verifica si ha insertado los datos
                if ($consulta->execute()) 
                {   

                    $_SESSION['message'] = 'Importacion De Datos exitoso';
                    $_SESSION['message2'] = 'success';
                    header("Location: ../ListaReunion.php?id=".urlencode($ID));
                }
                else
                {
                    $_SESSION['message'] = 'No se pudo consultar la consulta';
                    $_SESSION['message2'] = 'danger';
                  header("Location: ../ListaReunion.php?id=".urlencode($ID));
                }




      
            }//Fin del for

           
        unlink($archivo);
        }// fin del if  
}else
{
    $_SESSION['message'] = 'No has selecciona el archivo';
    $_SESSION['message2'] = 'danger';
    header("Location: ../ListaReunion.php?id=".urlencode($ID));
}

}else
{
    $_SESSION['message'] = 'No se pudo ejecutar la acción';
    $_SESSION['message2'] = 'success';
    header("Location: ../ListaReunion.php?id=".urlencode($ID));
}

?>