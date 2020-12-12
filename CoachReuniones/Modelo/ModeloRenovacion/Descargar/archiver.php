<?php 
include '../../../../Conexion/conexion.php';
include '../../../../BaseDatos/conexion.php';
if (isset($_POST['descargar'])) {
  $year = $_POST['year'];
  $class=$_POST['class'];
  $ciclo = $_POST['ciclo'];
  $alumnos = $_POST['alumnos'];
  $estado = $_POST['estado'];
  $dir = "Archivos/Renovaciones";
  deleteDir($dir);
  if (!(empty($year)) AND (empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
     foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  
  }
    }

  }else if ((empty($year)) AND (empty($class)) AND !(empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE ciclo = '".$ciclo."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE ciclo = '".$ciclo."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND !(empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE class = '".$class."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE class = '".$class."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND !(empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE class = '".$class."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE class = '".$class."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND (empty($class)) AND (empty($ciclo)) AND !(empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND (empty($class)) AND (empty($ciclo)) AND !(empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND (empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE Estado = '".$estado."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE Estado = '".$estado."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND !(empty($class)) AND !(empty($ciclo)) AND !(empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE Estado = '".$estado."' AND year = '".$year."' AND class = '".$class."' AND ciclo = '".$ciclo."' AND ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE Estado = '".$estado."' AND year = '".$year."' AND class = '".$class."' AND ciclo = '".$ciclo."' AND ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if ((empty($year)) AND (empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND (empty($estado)) AND !(empty($_POST['todo']))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion ") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND !(empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND class = '".$class."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND class = '".$class."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND (empty($class)) AND !(empty($ciclo)) AND (empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND ciclo = '".$ciclo."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND ciclo = '".$ciclo."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND (empty($class)) AND (empty($ciclo)) AND !(empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND (empty($class)) AND (empty($ciclo)) AND (empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND Estado = '".$estado."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND Estado = '".$estado."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND !(empty($class)) AND !(empty($ciclo)) AND !(empty($alumnos)) AND (empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND ciclo ='".$ciclo."' AND ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND ciclo ='".$ciclo."' AND ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND !(empty($class)) AND !(empty($ciclo)) AND (empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND ciclo ='".$ciclo."' AND Estado = '".$estado."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND ciclo ='".$ciclo."' AND Estado = '".$estado."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND !(empty($class)) AND (empty($ciclo)) AND !(empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND Estado ='".$estado."' AND ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND class='".$class."' AND Estado ='".$estado."' AND ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }else if (!(empty($year)) AND (empty($class)) AND !(empty($ciclo)) AND !(empty($alumnos)) AND !(empty($estado))) {
       foreach ($dbh->query("SELECT COUNT(*) AS 'condicion' FROM renovacion WHERE year = '".$year."' AND ciclo='".$ciclo."' AND Estado ='".$estado."' AND ID_Alumno = '".$alumnos."'") as $C ) {
       $condicion = $C['condicion'];
     }
    if ($condicion == 0) {
      echo "No hay Renovaciones";
    }else
    {
            foreach ($dbh->query("SELECT carpeta,archivo FROM renovacion WHERE year = '".$year."' AND ciclo='".$class."' AND Estado ='".$estado."' AND ID_Alumno = '".$alumnos."'") as $carpeta) 
    {
        $source = $carpeta['carpeta'];
   if(!is_dir('carpeta_copia')){
mkdir("Archivos/".$source,0777,true);
$destination = "Archivos/".$source;
full_copy("../../../".$source, $destination);
}
header("Location:Zip.php");
  }
    }
  }

}

 /*Funciones*/
function full_copy( $source, $target ) {
    if ( is_dir( $source ) ) {
        @mkdir( $target );
        $d = dir( $source );
        while ( FALSE !== ( $entry = $d->read() ) ) {
            if ( $entry == '.' || $entry == '..' ) {
                continue;
            }
            $Entry = $source . '/' . $entry; 
            if ( is_dir( $Entry ) ) {
                full_copy( $Entry, $target . '/' . $entry );
                continue;
            }
            copy( $Entry, $target . '/' . $entry );
        }
 
        $d->close();
    }else {
        copy( $source, $target );
    }
}
function deleteDir($path) {
       if (empty($path)) { 
           return false;
       }
       return is_file($path) ?
               @unlink($path) :
               array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}


  

?>
