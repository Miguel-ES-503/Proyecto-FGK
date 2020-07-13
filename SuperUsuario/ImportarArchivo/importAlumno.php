<?php
include("../../BaseDatos/conexion.php"); //Conexion con la base de datos

include "class.upload.php";

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
            for ($row = 4; $row <= $highestRow; $row++)
            { 
                $IDAlumno = $sheet->getCell("A".$row)->getValue();
                $Nombre = $sheet->getCell("B".$row)->getValue();
                $Class = $sheet->getCell("C".$row)->getValue();
                $Correo = strtolower($sheet->getCell("D".$row)->getValue());
                $IDCarrera = $sheet->getCell("E".$row)->getValue();
                $IDEmpresa = $sheet->getCell("F".$row)->getValue();
                $Sexo = $sheet->getCell("G".$row)->getValue();
                $EstadoAlum = "Activo";
                $IDLab = $sheet->getCell("H".$row)->getValue();
                $SedeAsis = $sheet->getCell("I".$row)->getValue();
                $IDSedeCorres = $sheet->getCell("J".$row)->getValue();

                $StatusActual = $sheet->getCell("K".$row)->getValue();
                $Financiamiento = $sheet->getCell("L".$row)->getValue();
                $TotalTaller = $sheet->getCell("M".$row)->getValue();
                

                // Inseción de datos del alumno
    $consulta=$pdo->prepare("INSERT INTO alumnos(ID_Alumno,Nombre,Id_Carrera,Class,correo,ID_Empresa,Sexo,Estado,ID_Status,ID_Sede,SedeAsistencia,TotalTalleres,StatusActual,FuenteFinacimiento) VALUES(:CarnetAlumno,:NombreAlumno,:NombreCarrera,:NClass,:correo,:idempresa,:Sexo,:estadoAlumno,:IDStatus,:sede,:Asistencia,:TotalTalleres,:StatusActual,:FuenteFinacimiento)");

            // Pasamos los parametros para la inserción de datos
                $consulta->bindParam(':CarnetAlumno',$IDAlumno);
                $consulta->bindParam(':NombreAlumno',$Nombre);
                $consulta->bindParam(':NombreCarrera',$IDCarrera);
                $consulta->bindParam(':NClass',$Class);
                $consulta->bindParam(':correo',$Correo);
                $consulta->bindParam(':idempresa',$IDEmpresa);
                $consulta->bindParam(':Sexo',$Sexo);
                $consulta->bindParam(':estadoAlumno',$EstadoAlum);
                $consulta->bindParam(':IDStatus',$IDLab);
                $consulta->bindParam(':sede',$IDSedeCorres);
                $consulta->bindParam(':Asistencia',$SedeAsis);
                $consulta->bindParam(':TotalTalleres',$TotalTaller);
                $consulta->bindParam(':StatusActual',$StatusActual);
                $consulta->bindParam(':FuenteFinacimiento',$Financiamiento);
                


                if (!$consulta->execute()) 
                {
                    $_SESSION['message'] = 'Fallo al crear expediente';
                    $_SESSION['message2'] = 'danger';

                }else
                {


                //Generador de contraseña
                $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz1234567890";
                $password = "";
                      //Reconstruimos la contraseña segun la longitud que se quiera
                for($i=0;$i <= 10 ;$i++) {
                      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
                    $password .= substr($str,rand(0,62),1);
                }


                  $Clave= password_hash($password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente
                  $rol = "Estudiante";
                  $ImgDefault = "imgDefault.png";
                    //Preparamaos la consulta de inserción


                  $consulta3=$pdo->prepare("INSERT INTO usuarios(nombre,correo,contrasena,ID_Sede,cargo,SedeAsistencia,imagen) VALUES(:nombre,:correo,:contra,:sede,:cargo,:asi,:imagen)");


                    $consulta3->bindParam(':nombre',$Nombre);
                    $consulta3->bindParam(':correo',$Correo);
                    $consulta3->bindParam(':sede',$IDSedeCorres);
                    $consulta3->bindParam(':cargo',$rol);
                    $consulta3->bindParam(':contra',$Clave);
                    $consulta3->bindParam(':asi',$SedeAsis);
                    $consulta3->bindParam(':imagen',$ImgDefault);
                    $consulta3->execute();


                   // Enviamos el correo para  mandar la contraseña generado
                    $PrimerNombre = explode(" ", $Nombre);

                    //Enviamos el correo para  mandar la contraseña generado 
                    $asunto = "Bienvenido a Workeys Oportunidades";
                    $header = "Este correo electrónico ha sido generado automaticamente, por favor no responda a este correo. Hola ".$PrimerNombre[0]. " queremos darte  la noticia que te han inscrito a una plataforma  llamada  Workeys Oportunidades la cual podrá acceder en la siguiente  URL  http://portal.workeysoportunidades.org/";
                    $Mensaje= "La cual podrás acceder  con tu correo  oficial de  Oportunidades y tu contraseña  es " .$password. " una  vez accediendo a la plataforma podrás cambiarla.\n\n Saludos Cordiales.";

                    $_SESSION['message'] = 'Importacion De Datos exitoso';
                    $_SESSION['message2'] = 'success';



                     if ( mail($Correo,$asunto,$Mensaje,$header)) 
                    {
                        //Si todo fue correcto muestra el resultado con exito;
                        $_SESSION['message3'] = 'Correos Enviado';
                        $_SESSION['message4'] = 'success';
                    }else
                    {
                        //Si todo fue correcto muestra el resultado con exito;
                        $_SESSION['message3'] = 'Correos No Enviado';
                        $_SESSION['message4'] = 'danger';
                    }



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