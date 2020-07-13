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

                $consulta2=$pdo->prepare("SELECT `TotalTalleres`FROM alumnos WHERE `ID_Alumno` = :ID_Alumno ");
                $consulta2->bindParam(":ID_Alumno",$IDAlumno);
                $consulta2->execute();

                $TotalTaller;
                if ($consulta2->rowCount() >=0)
                {
                    $fila=$consulta2->fetch();
                    $TotalTaller = $fila['TotalTalleres'];     
                }

                if($Asis == "Asistio")
                {
                    $historico = 1 + $TotalTaller;
                    $consulta3=$pdo->prepare("UPDATE alumnos SET   TotalTalleres=:TotalTalleres WHERE ID_Alumno=:idAlumno ");
                    $consulta3->bindParam(":TotalTalleres",$historico);
                    $consulta3->bindParam(":idAlumno",$IDAlumno);
                    $consulta3->execute();
                }
    

                $consulta=$pdo->prepare("UPDATE inscripciontalleres  SET   Asistencia=:Asistencia   WHERE ID_Alumno =:ID_Alumno AND ID_Taller = :ID_Taller");
                $consulta->bindParam(":Asistencia",$Asis);
                $consulta->bindParam(":ID_Alumno",$IDAlumno);
                $consulta->bindParam(":ID_Taller",$IDTaller);

                 //Verifica si ha insertado los datos
                if ($consulta->execute()) 
                {   

                    $_SESSION['message'] = 'Importacion De Datos exitoso';
                    $_SESSION['message2'] = 'success';
                    header("Location: ../ListaTaller.php?id=".urlencode($ID));
                }
                else
                {
                    $_SESSION['message'] = 'No se pudo consultar la consulta';
                    $_SESSION['message2'] = 'danger';
                  header("Location: ../ListaTaller.php?id=".urlencode($ID));
                }




      
            }//Fin del for

           
        unlink($archivo);
        }// fin del if  
}else
{
    $_SESSION['message'] = 'No has selecciona el archivo';
    $_SESSION['message2'] = 'danger';
    header("Location: ../ListaTaller.php?id=".urlencode($ID));
}

}else
{
    $_SESSION['message'] = 'No se pudo ejecutar la acción';
    $_SESSION['message2'] = 'success';
    header("Location: ../ListaTaller.php?id=".urlencode($ID));
}

?>