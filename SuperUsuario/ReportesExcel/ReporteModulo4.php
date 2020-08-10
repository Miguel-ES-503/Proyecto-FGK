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
$consulta=$pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class, alumnos.Sexo, alumnos.ID_Sede, alumnos.EstadoCerti, datos_modulos.fechain, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.estado, datos_modulos.id_modulo , empresas.Nombre FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = 'MOD40000004' ");
$consulta->execute(array($LugarFT,$LugarSAT));


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ListaModulo4.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Listado De Alumnos');
//$gdImage = imagecreatefrompng('Recursos/funda.png');//Logotipo

//$objDrawing = new PHPExcel_Worksheet_Drawing(); //create object for Worksheet drawing $objDrawing->setName('Customer Signature'); //set name to image $objDrawing->setDescription('Customer Signature'); //set description to image $signature = $reportdetails[$rowCount][$value]; //Path to signature .jpg file $objDrawing->setPath($signature); $objDrawing->setOffsetX(25); //setOffsetX works properly $objDrawing->setOffsetY(10); //setOffsetY works properly $objDrawing->setCoordinates($column.$cell); //set image to cell $objDrawing->setWidth(32); //set width, height $objDrawing->setHeight(32); $objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); //save 
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo');
$objDrawing->setDescription('Logo');
$objDrawing->setPath('Recursos/funda.png');
$objDrawing->setOffsetX(100);
$objDrawing->setOffsetY(0);
$objDrawing->setCoordinates('B2');
$objDrawing->setHeight(145); 
$objDrawing->setWorksheet($excel->getActiveSheet());

$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setName('Logo2');
$objDrawing->setDescription('Logo2');
$objDrawing->setPath('Recursos/logo_oportunidades.png');
$objDrawing->setOffsetX(40);
$objDrawing->setOffsetY(100);
$objDrawing->setCoordinates('G2');
$objDrawing->setHeight(100);
$objDrawing->setWidth(400); 
$objDrawing->setWorksheet($excel->getActiveSheet());
 
$estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>25
    ),
    'fill' => array(
    'type'  => PHPExcel_Style_Fill::FILL_SOLID,
    'color' => array('rgb' => '538DD5')
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
    );
    
$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet()->setTitle('Listado De Alumnos');
$pagina->mergeCells('A8:J8');
$pagina->mergeCells('C3:F3');
$pagina->mergeCells('C4:F4');
$pagina->setCellValue('C3','FUNDACIÓN GLORIA DE KRIETE');
$pagina->setCellValue('C4','PROGRAMA OPORTUNIDADES');
$pagina->setCellValue('A8','LISTA DE ALUMNOS INSCRITOS AL MODULO 1');
$pagina->setCellValue('A9','ID-Alumno');
$pagina->setCellValue('B9','Nombre');
$pagina->setCellValue('C9','Sexo');
$pagina->setCellValue('D9','Sede/Modalidad');
$pagina->setCellValue('E9','Class');
$pagina->setCellValue('F9','Universidad');
$pagina->setCellValue('G9','ID-Modulo');
$pagina->setCellValue('H9','Fecha inscripcion');
$pagina->setCellValue('I9','Estado');
$pagina->setCellValue('J9','Estado');

$excel->getActiveSheet()->getStyle('A8:J8')->applyFromArray($estiloTituloReporte);
$excel->getActiveSheet()->getStyle('C3:F3')->applyFromArray($estiloTituloReporte);
$excel->getActiveSheet()->getStyle('C4:F4')->applyFromArray($estiloTituloReporte);

$i = 9;
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
        $pagina->setCellValue('J'.($i+1), $fila2['EstadoCerti']);
		$i++;
	}		
}


 foreach (range('A','K') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>