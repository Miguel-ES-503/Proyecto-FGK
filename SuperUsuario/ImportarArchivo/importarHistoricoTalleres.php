<?php
include("../../BaseDatos/conexion.php"); //Conexion con la base de datos

include "class.upload.php";

session_start();

if(isset($_FILES["name"])){
   
    $up = new Upload($_FILES["name"]);
    
    if($up->uploaded){
       
        $up->Process("./uploads/");
        if($up->processed){
            echo "<script>alert('alertar');</script>";
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';
            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();
            for ($row = 2; $row <= $highestRow; $row++)
            { 
                $Nombre = $sheet->getCell("A".$row)->getValue();
                $TotalHistorico = $sheet->getCell("B".$row)->getValue();
                //$Class = $sheet->getCell("C".$row)->getValue();
                
                

                // Inseción de datos del alumno
                 $consulta=$pdo->prepare("update alumnos set TotalTalleres = ':Total' where Nombre = '' ");

                // Pasamos los parametros para la inserción de datos
                $consulta->bindParam(':Total',$TotalHistorico);
                $consulta->bindParam(':Nombre',$Nombre);

                if (!$consulta->execute()) 
                {
                    $_SESSION['message'] = 'Fallo al crear expediente';
                    $_SESSION['message2'] = 'danger';
                }else
                {
                    $_SESSION['message3'] = 'Datos importados correctamente';
                    $_SESSION['message4'] = 'success';
                }

    


                   

                    header("Location: ../SIT-CrearAlumno.php");
      
            }//Fin del for

     
            
        unlink($archivo);
        }// fin del if  
}else
{
    $_SESSION['message'] = 'No has selecciona el archivo';
    $_SESSION['message2'] = 'danger';
    header("Location: ../SIT-CrearAlumno.php");
}

}else
{
    $_SESSION['message'] = 'No se pudo ejecutar la acción';
    $_SESSION['message2'] = 'success';
    header("Location: ../SIT-CrearAlumno.php");
}

?>