<?php 
//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');


session_start();  
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
$consulta=$pdo->prepare("SELECT `ID_Alumno` , A.`Nombre` , `Class` , `correo` , C.nombre AS 'Carrera' , E.Nombre AS 'Univerisdad' , S.Nombre AS 'Status'  , `Sexo` , `ID_Sede` , `SedeAsistencia` , `Estado` FROM alumnos A INNER JOIN carrera C ON A.`ID_Carrera` = C.`ID_Carrera` LEFT JOIN empresas E on A.`ID_Empresa` = E.`ID_Empresa` LEFT JOIN status S on A.`ID_Status` = S.`ID_Status` WHERE SedeAsistencia = ? OR SedeAsistencia = ? ");
$consulta->execute(array($LugarFT,$LugarSAT));




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ListaAlumnos.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Listado De Alumnos');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet()->setTitle('Listado De Alumnos');


$pagina->setCellValue('A1','Lista De Alumnos');
$pagina->setCellValue('A2','Carnet');
$pagina->setCellValue('B2','Nombre');
$pagina->setCellValue('C2','Class');
$pagina->setCellValue('D2','Correo');
$pagina->setCellValue('E2','Carrera');
$pagina->setCellValue('F2','Univerisdad');
$pagina->setCellValue('G2','Status');
$pagina->setCellValue('H2','Sexo');
$pagina->setCellValue('I2','SEDE');
$pagina->setCellValue('J2','Asistencia');
$pagina->setCellValue('K2','Estado');

$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina->setCellValue('A'.($i+1), $fila2['ID_Alumno']);
		$pagina->setCellValue('B'.($i+1), $fila2['Nombre']);
		$pagina->setCellValue('C'.($i+1), $fila2['Class']);
		$pagina->setCellValue('D'.($i+1), $fila2['correo']);
		$pagina->setCellValue('E'.($i+1), $fila2['Carrera']);
		$pagina->setCellValue('F'.($i+1), $fila2['Univerisdad']);
		$pagina->setCellValue('G'.($i+1), $fila2['Status']);
		$pagina->setCellValue('H'.($i+1), $fila2['Sexo']);
		$pagina->setCellValue('I'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('J'.($i+1), $fila2['SedeAsistencia']);
		$pagina->setCellValue('K'.($i+1), $fila2['Estado']);

		$i++;
	}		
}


 foreach (range('A','L') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>