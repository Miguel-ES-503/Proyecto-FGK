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
    $consulta=$pdo->prepare("SELECT alumnos.Nombre , one_on_one.titulo , one_on_one.estado ,one_on_one.estado_alumno, one_on_one.ID_Sede ,  one_on_one.id_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id, one_on_one.id_alumno, one_on_one.ciclo  FROM one_on_one LEFT JOIN alumnos ON  alumnos.ID_Alumno = one_on_one.id_alumno ");
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
$pagina->setCellValue('A2','Titulo');
$pagina->setCellValue('B2','Nombre');
$pagina->setCellValue('C2','Sede');
$pagina->setCellValue('D2','Asistencia');
$pagina->setCellValue('E2','Estado');
$pagina->setCellValue('F2','Fecha');
$pagina->setCellValue('G2','Hora Inicial');
$pagina->setCellValue('H2','Hora Final');

$i = 2;
if ($consulta->rowCount()>=1)
{
	while ($fila2=$consulta->fetch())
	{
		$pagina->setCellValue('A'.($i+1), utf8_encode($fila2['titulo']));
		$pagina->setCellValue('B'.($i+1), $fila2['Nombre']);
		$pagina->setCellValue('C'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('D'.($i+1), $fila2['estado_alumno']);
		$pagina->setCellValue('E'.($i+1), $fila2['estado']);
		$pagina->setCellValue('F'.($i+1), utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($fila2['fecha']))));
		$pagina->setCellValue('G'.($i+1), $fila2['hora_inicio']);
		$pagina->setCellValue('H'.($i+1), $fila2['hora_fin']);

		$i++;
	}		
}


 foreach (range('A','I') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }
	


$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output')


 ?>