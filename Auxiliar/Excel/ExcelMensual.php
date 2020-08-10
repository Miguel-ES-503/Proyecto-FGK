<?php 
require_once('../../BaseDatos/conexion.php');


require('PHPExcel-1.8/Classes/PHPExcel.php');
/** PHPExcel_IOFactory */
//include 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';



//echo $_POST['id'];
/*echo $_POST['id2'];
echo $_POST['id3'];
echo $_POST['id4'];
echo $_POST['id5'];
echo $_POST['id6'];
echo $_POST['id7'];
echo $_POST['id8'];
echo $_POST['id9'];
echo $_POST['id10'];*/
//echo "<script> alert(".$_POST['id']."); </script>";
//header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");


$ea = new PHPExcel();
$ews = $ea->getSheet(0);
$ews->setTitle('Data');





$ews->setCellValue('a2', 'Asistencia'); // Sets cell 'a1' to value 'ID 
$ews->setCellValue('a6','Evaluaciones');

	//...
    //Fill data 
    $data = array("hola","hoa");
    $ews->fromArray(array(
    	array(''),
		array('',	'Hombre','Mujeres','Total'),
		array('Asistencia Real',$_GET['id7'],$_GET['id8'],  $_GET['id']),
		array('Asistencia de impacto','','',$_GET['id2']),
		array(''),
		array('','Total'),
		array('Nada satisfecho',$_GET['id3']),
		array('Algo satisfecho',$_GET['id9']),
		array('Satisfecho',$_GET['id4']),
		array('Bastante satisfecho',$_GET['id10']),
		array('Muy satisfecho',$_GET['id5']),
		
	));







    $header = 'a2';
    $header2 = 'a6';
//$ews->mergeCells('A7:B7');//Para combinar celdas



//$ews->getStyle($header)->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('00ffff00');
$style = array(
    'font' => array('bold' => true,),
    'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),
    );
$ews->getStyle($header)->applyFromArray($style);
$ews->getStyle($header2)->applyFromArray($style);



for ($col = ord('a'); $col <= ord('h'); $col++)
{
    $ews->getColumnDimension(chr($col))->setAutoSize(true);
}












$dsl=array(
                new PHPExcel_Chart_DataSeriesValues('String','Data!A2' , NULL, 1),//Lo que va a un lado
                
                
            );
$xal=array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Data!$A$3:$A$4', NULL, 90),//Lo que va abajo
                 
            );

$dsv=array(
                new PHPExcel_Chart_DataSeriesValues('Number', 'Data!$D$3:$D$4', NULL, 90),
                // new PHPExcel_Chart_DataSeriesValues('Number', 'Data!$D$3', NULL, 90),
               
            );
$ds=new PHPExcel_Chart_DataSeries(
                    PHPExcel_Chart_DataSeries::TYPE_BARCHART,
                    PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                    range(0, count($dsv)-1),
                    $dsl,
                    $xal,
                    $dsv
                    );
/*
$layout1 = new PHPExcel_Chart_Layout();
$layout1->setShowVal(TRUE);
$layout1->setShowPercent(TRUE);*/

$pa=new PHPExcel_Chart_PlotArea(NULL, array($ds));
$legend=new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
$title=new PHPExcel_Chart_Title('Promedio de asistencia');
$chart= new PHPExcel_Chart(
                    'chart1',
                    $title,
                    $legend,
                    $pa,
                    true,
                    0,
                    NULL, 
                    NULL
                    );
$chart2= new PHPExcel_Chart(
                    'chart1',
                    $title,
                    $legend,
                    $pa,
                    true,
                    0,
                    NULL, 
                    NULL
                    );

$chart->setTopLeftPosition('K1');
$chart->setBottomRightPosition('P12');
$ews->addChart($chart);

///////////////////****************GRAFICO DE EVALUACIONES******************************
$dsl2=array(
                new PHPExcel_Chart_DataSeriesValues('String','Data!A6' , NULL, 1),//Lo que va a un lado
                
                
            );
$xal2=array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Data!$A$7:$A$11', NULL, 90),//Lo que va abajo
                 
            );

$dsv2=array(
                new PHPExcel_Chart_DataSeriesValues('Number', 'Data!$B$7:$B$11', NULL, 90),
                // new PHPExcel_Chart_DataSeriesValues('Number', 'Data!$D$3', NULL, 90),
               
            );
$ds2=new PHPExcel_Chart_DataSeries(
                    PHPExcel_Chart_DataSeries::TYPE_BARCHART,
                    PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                    range(0, count($dsv2)-1),
                    $dsl2,
                    $xal2,
                    $dsv2
                    );


$pa2=new PHPExcel_Chart_PlotArea(NULL, array($ds2));
$legend2=new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
$title2=new PHPExcel_Chart_Title('Promedio de evaluaciones');

$chart2= new PHPExcel_Chart(
                    'chart1',
                    $title2,
                    $legend2,
                    $pa2,
                    true,
                    0,
                    NULL, 
                    NULL
                    );

$chart2->setTopLeftPosition('K13');
$chart2->setBottomRightPosition('Q25');
$ews->addChart($chart2);
//$title=new PHPExcel_Chart_Title('El titulo sabroson');
$filename = 'prueba';

$writer = PHPExcel_IOFactory::createWriter($ea, 'Excel2007');
    header('Content-Disposition: attachment;filename="Reporte.xlsx"');        
$writer->setIncludeCharts(true);
$writer->save('php://output');




?>