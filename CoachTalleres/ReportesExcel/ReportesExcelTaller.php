<?php 
//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');

if (isset($_GET['id'])) {

	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT  ID_Taller ,Titulo , Fecha , Hora, F.Nombre AS 'Tipo' ,ID_Sede , ID_Ciclo, E.Nombre AS Empresa ,Estado FROM talleres T INNER JOIN formatotalleres F on T.ID_Formato = F.ID_Formato LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa  WHERE ID_Taller = :ID_Taller");
	$consulta->bindParam(":ID_Taller",$id);
	$consulta->execute();

	$TituloTaller = '';
	$Tipo = '';
	$Fecha = '';
	$Lugar = '';

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();
		$TituloTaller = $fila['Titulo'];
		$Tipo = $fila['Tipo'];
		$Fecha = $fila['Fecha'];
		$Lugar = $fila['Empresa'];
	}


	$consulta2=$pdo->prepare("SELECT a.ID_Alumno, a.Nombre , a.Class , a.ID_Sede , a.Sexo , E.Nombre AS 'Uni' , car.nombre AS 'Carrera' , T.Titulo , Asistencia ,IT.ID_Taller FROM inscripciontalleres IT INNER JOIN alumnos a on IT.ID_Alumno = a.ID_Alumno LEFT JOIN talleres T on IT.ID_Taller = T.ID_Taller LEFT JOIN carrera car on a.ID_Carrera = car.Id_Carrera left JOIN empresas E ON a.ID_Empresa = E.ID_Empresa WHERE IT.ID_Taller = ? ");
	$consulta2->execute(array($id));


}


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ReporteAsistenciaTaller.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Reporte Taller');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();


$pagina->setTitle('Asistencia');
$pagina->mergeCells('A1:J1');
$pagina->setCellValue('A1','Titulo del taller: ' . $TituloTaller);
$pagina->setCellValue('A2','ID Alumno');
$pagina->setCellValue('B2','ID Taller');
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

$pagina->getStyle('A1')->getFont()->setBold(true);
$pagina->getStyle('A1')->getFont()->setSize(15);


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
		$pagina->setCellValue('G'.($i+1), utf8_encode($fila2['Uni']));
		$pagina->setCellValue('h'.($i+1), utf8_encode($fila2['Carrera']));

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