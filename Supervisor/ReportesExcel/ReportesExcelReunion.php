<?php 
//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');

if (isset($_GET['id'])) {

	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM reuniones WHERE ID_Reunion = :ID_Reunion");
	$consulta->bindParam(":ID_Reunion",$id);
	$consulta->execute();


	$TituloReunion = '';
	$Ubicacикon = '';
	$Fecha = '';
	$Ciclo = '';
	

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();
		$TituloReunion = $fila['Titulo'];
		$Ubicacикon = $fila['ID_Empresa'];
		$Fecha = $fila['Fecha'];
		$Ciclo = $fila['ID_Ciclo'];

	}



	$consulta2=$pdo->prepare("SELECT  reu.ID_Reunion, alu.ID_Alumno , alu.Nombre , alu.Class , alu.ID_Sede , alu.Sexo , alu.ID_Empresa, reu.Titulo , car.nombre as 'Carrera' , asistencia  FROM inscripcionreunion IR INNER JOIN alumnos alu on  IR.id_alumno = alu.ID_Alumno LEFT JOIN reuniones reu on IR.id_reunion = reu.ID_Reunion  LEFT JOIN carrera car on alu.Id_Carrera = car.Id_Carrera  WHERE IR.id_reunion = ? ");
	$consulta2->execute(array($id));

}

header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ReporteAsistenciaReunion.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Reporte Taller');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();


$pagina->setTitle('Asistencia');
$pagina->mergeCells('A1:I1');
$pagina->setCellValue('A2','ID Alumno');
$pagina->setCellValue('B2','ID Reuniиоn');
$pagina->setCellValue('C2','Nombre');
$pagina->setCellValue('D2','Class');
$pagina->setCellValue('E2','Sede');
$pagina->setCellValue('F2','Sexo');
$pagina->setCellValue('G2','Univiersidad');
$pagina->setCellValue('H2','Carrera');
$pagina->setCellValue('I2','Asistencia');
$pagina->setCellValue('J2','Datos Correspondiente');
$pagina->setCellValue('J3','Asistio');
$pagina->setCellValue('J4','Inasistencia');

$pagina->getStyle('A2:J2')->getFont()->setBold(true);
$pagina->getStyle('A2:J2')->getFont()->setSize(12);
$pagina->getStyle('J3:J4')->getFont()->setBold(true);
$pagina->getStyle('J3:J4')->getFont()->setSize(12);

$i = 2;
if ($consulta2->rowCount()>=1)
{
	while ($fila2=$consulta2->fetch())
	{
		$pagina->setCellValue('A'.($i+1), $fila2['ID_Alumno']);
		$pagina->setCellValue('B'.($i+1), $id);
		$pagina->setCellValue('C'.($i+1), $fila2['Nombre']);
		$pagina->setCellValue('D'.($i+1), $fila2['Class']);
		$pagina->setCellValue('E'.($i+1), $fila2['ID_Sede']);
		$pagina->setCellValue('F'.($i+1), $fila2['Sexo']);
		$pagina->setCellValue('G'.($i+1), $fila2['ID_Empresa']);
		$pagina->setCellValue('h'.($i+1), $fila2['Carrera']);

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