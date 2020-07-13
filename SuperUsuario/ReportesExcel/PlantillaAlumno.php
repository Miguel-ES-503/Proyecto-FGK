<?php 

require_once('../../BaseDatos/conexion.php');

$consulta=$pdo->prepare("SELECT c.Id_Carrera, c.nombre, c.Duracion ,f.Nombre AS 'Facultad' From carrera c inner JOIN facultades f on c.ID_Facultades=f.IDFacultates" );
$consulta->execute();

$consulta2=$pdo->prepare("SELECT * FROM `status`");
$consulta2->execute();


$consulta3=$pdo->prepare("SELECT * FROM `empresas` WHERE `Tipo` = 'Universidad' ");
$consulta3->execute();


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="Plantilla_Alumnos.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK');

$excel->setActiveSheetIndex(0);
$pagina = $excel->getActiveSheet()->setTitle('Plantilla Alumnos');


$pagina->mergeCells('A1:L1');
$pagina->setCellValue('A1','Formato Para Importar Alumnos en la Base De Datos');

$pagina->setCellValue('A2','Carnet');
$pagina->setCellValue('B2','Nombre');
$pagina->setCellValue('C2','Class');
$pagina->setCellValue('D2','Correo');
$pagina->setCellValue('E2','Carrera');
$pagina->setCellValue('F2','Univerisdad');
$pagina->setCellValue('G2','Genero');
$pagina->setCellValue('H2','Status');
$pagina->setCellValue('I2','Sede');
$pagina->setCellValue('J2','Sede Asistir');

$pagina->setCellValue('k2','Status actual (A LA FECHA)');
$pagina->setCellValue('L2','Fuente de Financiamiento');
$pagina->setCellValue('M2','Cantidad de talleres');


//Ejemplo Formato Alumno

$pagina->setCellValue('A3','####-SS-FT-####');
$pagina->setCellValue('B3','Nombre Completo Del Alumno');
$pagina->setCellValue('C3','#### (Año)');
$pagina->setCellValue('D3','ejemplo@oportunidades.org.sv');
$pagina->setCellValue('E3','ID Carrera');
$pagina->setCellValue('F3','ID Univerisdad');
$pagina->setCellValue('G3','(M - F)');
$pagina->setCellValue('H3','ID Status');
$pagina->setCellValue('I3','(SSFT - SSSAT) SEDE CORRESPODIENTE DEL ALUMNO');
$pagina->setCellValue('J3','(SSFT o SAFT) LUGAR DONDE  Asistirá EL ALUMNO');
$pagina->setCellValue('K3','Status');
$pagina->setCellValue('L3','Tipo');
$pagina->setCellValue('M3','Total de talleres');
$pagina->setCellValue('N3','Formato De Ejemplo ("No quitar")');


 foreach (range('A','N') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }


//Lista Carreras y Univerisdades

 $excel->createSheet(); 
 $excel->setActiveSheetIndex(1);
 $pagina2 = $excel->getActiveSheet()->setTitle('Lista De Carreras_Universidades');


 $pagina2->mergeCells('A1:D1');
 $pagina2->setCellValue('A1','Lista De Carreras');

$pagina2->mergeCells('F1:G1');
 $pagina2->setCellValue('F1','Lista De Univerisdades');

 $pagina2->setCellValue('A2','ID Carrera');
 $pagina2->setCellValue('B2','Nombre de la Carrera');
 $pagina2->setCellValue('C2','Duracion');
 $pagina2->setCellValue('D2','Facultad');

 $pagina2->setCellValue('F2','ID Univerisdad');
 $pagina2->setCellValue('G2','Nombre');



//Carreras
$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina2->setCellValue('A'.($i+1), $fila2['Id_Carrera']);
		$pagina2->setCellValue('B'.($i+1),utf8_encode($fila2['nombre']) );
		$pagina2->setCellValue('C'.($i+1), utf8_encode($fila2['Duracion']));
		$pagina2->setCellValue('D'.($i+1), utf8_encode($fila2['Facultad']));
		$i++;
	}		
}



//Univerisades
$i3 = 2;
if ($consulta3->rowCount()>=1)
{
	while ($fila4=$consulta3->fetch())
	{
		$pagina2->setCellValue('F'.($i3+1), $fila4['ID_Empresa']);
		$pagina2->setCellValue('G'.($i3+1), utf8_encode($fila4['Nombre']));
		
		$i3++;
	}		
}





 foreach (range('A','D') as $columna2) 
 {
 	$pagina2->getColumnDimension($columna2)->setAutoSize(true);
 }

foreach (range('F','G') as $columna4) 
 {
 	$pagina2->getColumnDimension($columna4)->setAutoSize(true);
 }



//Status del Alumnos


 $excel->createSheet(); 
 $excel->setActiveSheetIndex(2);
 $pagina3 = $excel->getActiveSheet()->setTitle('Status De Alumnos');

 $pagina3->mergeCells('A1:B1');
 $pagina3->setCellValue('A1','Lista De Status');

 $pagina3->setCellValue('A2','ID Status');
 $pagina3->setCellValue('B2','Nombre');


 $i2 = 2;
if ($consulta2->rowCount()>=1)
{
	while ($fila3=$consulta2->fetch())
	{
		$pagina3->setCellValue('A'.($i2+1), $fila3['ID_Status']);
		$pagina3->setCellValue('B'.($i2+1),$fila3['Nombre']);
		$i2++;
	}		
}
 

foreach (range('A','B') as $columna3) 
{
	$pagina3->getColumnDimension($columna3)->setAutoSize(true);
}


 $pagina3->mergeCells('D1:E1');
 $pagina3->setCellValue('D1','STATUS ACTUAL (A LA FECHA)');

 $pagina3->setCellValue('D2','Status');
 $pagina3->setCellValue('D3','Becado');
 $pagina3->setCellValue('D4','Declinado');
 $pagina3->setCellValue('D5','Declinado-apoyo extraordinario');
 $pagina3->setCellValue('D6','Beca Denegada');
 $pagina3->setCellValue('D7','Crédito Educativo');
 $pagina3->setCellValue('D8','Cambio Tipo Carrera Graduado');
 $pagina3->setCellValue('D9','Cambio Tipo Carrera No Graduado');
 $pagina3->setCellValue('D10','Beca a la Perseverancia');
 $pagina3->setCellValue('D11','Beca Cancelada');
 $pagina3->setCellValue('D12','Egresado');
 $pagina3->setCellValue('D13','Graduado');
 $pagina3->setCellValue('D14','Pausa');
 $pagina3->setCellValue('D15','Fallecido');

	

foreach (range('D','E') as $columna4) 
{
	$pagina3->getColumnDimension($columna4)->setAutoSize(true);
}



 $pagina3->mergeCells('F1:G1');
 $pagina3->setCellValue('F1','Fuente de Financiamiento');
 $pagina3->setCellValue('F2','Tipos');
 $pagina3->setCellValue('F3','Beca Externa con Apoyo Adicional');
 $pagina3->setCellValue('F4','Borja');
 $pagina3->setCellValue('F5','FGK');
 $pagina3->setCellValue('F6','FOM');
 $pagina3->setCellValue('F7','Financiamiento Propio');

 foreach (range('F','G') as $columna5) 
 {
 	$pagina3->getColumnDimension($columna5)->setAutoSize(true);
 }

$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')






//localhost/ProyectoFGK3.0/SuperUsuario/ReportesExcel/PlantillaAlumno.php


 ?>