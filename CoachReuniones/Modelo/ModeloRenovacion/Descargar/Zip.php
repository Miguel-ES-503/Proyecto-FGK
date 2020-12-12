<?php 

    $rootPath = realpath('Archivos');

// Initialize archive object
$zip = new ZipArchive();
$zip->open('Renovaciones.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();
//Creamos las cabezeras que forzaran la descarga del archivo como archivo zip.
 header("Content-type: application/octet-stream");
 header("Content-disposition: attachment; filename=Renovaciones.zip");
 // leemos el archivo creado
 readfile('Renovaciones.zip');
 // Por último eliminamos el archivo temporal creado
 unlink('Renovaciones.zip');//Destruye el archivo temporal
     	$_SESSION['noti'] = "<script>swal({
  title: 'Aviso!',
  text: 'No existe renovaciones!',
  icon: 'error',
  button: 'Cerrar',
});</script>";
 header("../../../descargas.php");
?>