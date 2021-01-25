<?php
error_reporting(0);
require_once "../../../BaseDatos/conexion.php";
header('Content-Type: text/html; charset=utf-8');
session_start(); 
// header("Location: ../../MateriasRetiradas.php");
 $idMateria = $_POST['idMateria'];
 $ciclo = $_POST['ciclo'];
 $idAlumno = $_POST['idAlumno'];
 $motivo = $_POST['motivo'];
 $nota = $_POST['nota'];
 $carta = $_POST['carta'];

 
    
 $tipoarchivo = $_FILES["carta"]["type"];
 $tama«Ðoarchivo = $_FILES["carta"]["size"];
 $rutaarchivo = $_FILES["carta"]["tmp_name"];
 $destino = "../../../pdfCartaRetiro/";
$ArchivoPDF;
$ArchivoPDF = $fila['carta'];

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
     $nombrearchivo = $idAlumno." ".$ciclo.".pdf";
     $destino .= $nombrearchivo;
     if(copy($rutaarchivo, $destino))
     {
        $sql = "UPDATE materias SET  estadoM = ? WHERE idMateria = ? ";
        $stmt= $pdo->prepare($sql);
        echo $stmt->execute(['Retirada',$idMateria]);
        
        // actualizar la inscripcion de materia a retirada
        $sql = "UPDATE inscripcionmateria SET estado = ? WHERE idMateria = ? ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute('Retirada',$idMateria);
       
       $sql = "INSERT INTO `soliretiro`(`ID_Alumno`, `ID_Ciclo`, `ID_Materia`,`Comentario`, `notaAcumulada`, `Motivo`, `CartaRetiro`) VALUES (?,?,?,?,?,?,?)";
       $stmt= $pdo->prepare($sql);
     if ($stmt->execute([$idAlumno, $ciclo, $idMateria," ",$nota,$motivo,$nombrearchivo])) {
        $_SESSION['message'] = 'Materia retirada';
        $_SESSION['message2'] = 'success';
        //header("Location: ../../MateriasRetiradas.php");
        echo'<script type="text/javascript">
			window.location.href="../../MateriasRetiradas.php";
			</script>';
     }else
     {
        $_SESSION['message'] = 'Error al retirar la materia';
        $_SESSION['message2'] = 'success';
         echo'<script type="text/javascript">
			window.location.href="../../MateriasRetiradas.php";
			</script>';
     }
     }else
     {
        $_SESSION['message'] = 'Error al retirar la materia,se produjo un error al guardar el archivo';
        $_SESSION['message2'] = 'success';
        echo'<script type="text/javascript">
        window.location.href="../../MateriasRetiradas.php";
        </script>';
     }	
    }else
    { 
        $_SESSION['message'] = 'Error al retirar la materia, ARCHIVO DEMASIANDO GRANDE';
        $_SESSION['message2'] = 'success';
        echo'<script type="text/javascript">
        window.location.href="../../MateriasRetiradas.php";
        </script>';
 }
}else
{
    echo "NO hay archivo";
}
?>