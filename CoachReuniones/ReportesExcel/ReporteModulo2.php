<?php 
//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');


session_start();  
setlocale(LC_TIME, 'spanish');
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra

//Concatenamos
$FullTime = "FT";
$Sabatino = "SAT";

$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT
$LugarSAT=$InicialDep . $FinalDep .$Sabatino; //Ejemplo SSSAT

	// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class, alumnos.Sexo, alumnos.ID_Sede, datos_modulos.fechain, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.estado, datos_modulos.id_modulo , empresas.Nombre FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = 'MOD20000002' ");
$consulta->execute(array($LugarFT,$LugarSAT));




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ListaModulo2.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Listado De Alumnos');

$excel->setActiveSheetIndex(0);

$excel ->getActiveSheet()->setTitle('Listado De Alumnos');
$excel->mergeCells('B1:I1');
$pagina->setCellValue('B1','Lista De Alumnos');
$pagina->setCellValue('A2','ID-Alumno');
$pagina->setCellValue('B2','Nombre');
$pagina->setCellValue('C2','Sexo');
$pagina->setCellValue('D2','Sede/Modalidad');
$pagina->setCellValue('E2','Class');
$pagina->setCellValue('F2','Universidad');
$pagina->setCellValue('G2','ID-Modulo');
$pagina->setCellValue('H2','Fecha inscripcion');
$pagina->setCellValue('I2','Estado');

$excel->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_JUSTIFY);

$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina->setCellValue('A'.($i+1), $fila2['id_alumno']);
		$pagina->setCellValue('B'.($i+1), $fila2['alumno']);
		$pagina->setCellValue('C'.($i+1), $fila2['Sexo']);
		$pagina->setCellValue('D'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('E'.($i+1), $fila2['Class']);
		$pagina->setCellValue('F'.($i+1), utf8_encode($fila2['Nombre']));
		$pagina->setCellValue('G'.($i+1), $fila2['id_modulo']);
		$pagina->setCellValue('H'.($i+1), (strftime("%A %d "." de"." %B del %Y ",strtotime($fila2['fechain']))));
		$pagina->setCellValue('I'.($i+1), $fila2['estado']);
		$i++;
	}		
}


 foreach (range('A','J') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>