<?php 
//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');


session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];
setlocale(LC_TIME, 'spanish');
$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra

//Concatenamos
$FullTime = "FT";
$Sabatino = "SAT";

$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT
$LugarSAT=$InicialDep . $FinalDep .$Sabatino; //Ejemplo SSSAT

	// Consulta De La BASE DE DATOS

    $consulta=$pdo->prepare("SELECT alumnos.Nombre , one_on_one.titulo , one_on_one.estado ,one_on_one.estado_alumno, one_on_one.ID_Sede ,  one_on_one.id_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id, one_on_one.id_alumno, one_on_one.ciclo, one_on_one.cupo  FROM one_on_one LEFT JOIN alumnos ON  alumnos.ID_Alumno = one_on_one.id_alumno ");
    $consulta->execute(array($LugarFT,$LugarSAT));




header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ListaReunionesfinalizados.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Listado De Alumnos');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet()->setTitle('Listado De Alumnos');

$pagina->setCellValue('A1','Lista De Alumnos');
$pagina->setCellValue('B2','Titulo');
$pagina->setCellValue('C2','Nombre');
$pagina->setCellValue('D2','ID_Alumnos');
$pagina->setCellValue('E2','Sede');
$pagina->setCellValue('F2','Cupo');
$pagina->setCellValue('G2','Asistencia');
$pagina->setCellValue('H2','Estado');
$pagina->setCellValue('I2','Ciclo');
$pagina->setCellValue('J2','Fecha');
$pagina->setCellValue('K2','Hora inicio');
$pagina->setCellValue('L2','Hora fin');

$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina->setCellValue('B'.($i+1), utf8_encode($fila2['titulo']));
		$pagina->setCellValue('C'.($i+1), $fila2['Nombre']);
		$pagina->setCellValue('D'.($i+1), $fila2['id_alumno']);
		$pagina->setCellValue('E'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('F'.($i+1), $fila2['cupo']);
		$pagina->setCellValue('G'.($i+1), $fila2['estado_alumno']);
		$pagina->setCellValue('H'.($i+1), $fila2['estado']);
		$pagina->setCellValue('I'.($i+1), $fila2['ciclo']);
		$pagina->setCellValue('J'.($i+1), utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($fila2['fecha']))));
		$pagina->setCellValue('K'.($i+1), $fila2['hora_inicio']);
		$pagina->setCellValue('L'.($i+1), $fila2['hora_fin']);

		$i++;
	}		
}


 foreach (range('A','M') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>