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
$consulta=$pdo->prepare("SELECT `ID_Alumno` , A.`Nombre` , `Class` , `correo` , C.nombre AS 'Carrera', F.Nombre AS 'Facultada' ,C.Duracion, E.Nombre AS 'Univerisdad' , S.Nombre AS 'Status' , `Sexo` , `ID_Sede` , `SedeAsistencia` , `Estado` , TotalTalleres , StatusActual , FuenteFinacimiento FROM alumnos A INNER JOIN carrera C ON A.`ID_Carrera` = C.`ID_Carrera` LEFT JOIN empresas E on A.`ID_Empresa` = E.`ID_Empresa` LEFT JOIN status S on A.`ID_Status` = S.`ID_Status`LEFT JOIN facultades F ON C.ID_Facultades = F.IDFacultates WHERE SedeAsistencia = ? OR SedeAsistencia = ?  ");
$consulta->execute(array($LugarFT,$LugarSAT));




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="AsistenciaDeTalleres.xlsx"');
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
$pagina->setCellValue('F2','Facultada');
$pagina->setCellValue('G2','Duración');
$pagina->setCellValue('H2','Univerisdad');
$pagina->setCellValue('I2','Status');
$pagina->setCellValue('J2','Sexo');
$pagina->setCellValue('K2','SEDE');
$pagina->setCellValue('L2','Lugar de asistencia');
$pagina->setCellValue('M2','Estado de certificación');
$pagina->setCellValue('N2','Total de talleres asistido');
$pagina->setCellValue('O2','Status actual');
$pagina->setCellValue('P2','Fuente de finacimiento');


$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina->setCellValue('A'.($i+1), $fila2['ID_Alumno']);
		$pagina->setCellValue('B'.($i+1), $fila2['Nombre']);
		$pagina->setCellValue('C'.($i+1), $fila2['Class']);
		$pagina->setCellValue('D'.($i+1), $fila2['correo']);
		$pagina->setCellValue('E'.($i+1), utf8_encode($fila2['Carrera']));
		$pagina->setCellValue('F'.($i+1), utf8_encode($fila2['Facultada']));
		$pagina->setCellValue('G'.($i+1), utf8_encode($fila2['Duracion']));
		$pagina->setCellValue('H'.($i+1), utf8_encode($fila2['Univerisdad']));
		$pagina->setCellValue('I'.($i+1), $fila2['Status']);
		$pagina->setCellValue('J'.($i+1), $fila2['Sexo']);
		$pagina->setCellValue('K'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('L'.($i+1), $fila2['SedeAsistencia']);
		$pagina->setCellValue('M'.($i+1), $fila2['StatusActual']);
		$pagina->setCellValue('N'.($i+1), $fila2['TotalTalleres']);
		$pagina->setCellValue('O'.($i+1), $fila2['StatusActual']);
		$pagina->setCellValue('P'.($i+1), $fila2['FuenteFinacimiento']);

		$i++;
	}		
}


 foreach (range('A','P') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>