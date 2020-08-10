<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel ( )
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt  LGPL
 * @version    1.8.0, 2014-03-02
 */

header("Content-type: text/html; charset=utf-8");
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
//date_default_timezone_set('Europe/London');
date_default_timezone_set("Asia/Shanghai");

if (PHP_SAPI == 'cli')
  die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require('PHPExcel-1.8/Classes/PHPExcel.php');
//require_once dirname(__FILE__) . '/libxls/Classes/PHPExcel.php';
//require_once dirname(__FILE__) .'/inc/xcl_conn.php';


//////////////////////////////////////////////////////////////////////

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("XiongChuanLiang")
               ->setLastModifiedBy("XiongChuanLiang")
               ->setTitle("Summary");


$objActSheet = $objPHPExcel->getActiveSheet();    

$objActSheet->getColumnDimension('A')->setWidth(50);    
$objActSheet->getColumnDimension('B')->setWidth(50);  

$objActSheet->getRowDimension(1)->setRowHeight(30);    
$objActSheet->getRowDimension(2)->setRowHeight(16);    

$objActSheet->mergeCells('A1:C1');    
$objActSheet->mergeCells('A2:C2');     
//Set center alignment   
$objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
$objActSheet->getStyle('A2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 

$objFontA1 = $objActSheet->getStyle('A1')->getFont();       
$objFontA1->setSize(18);     
$objFontA1->setBold(true);      


/////////////////////////////////////////////////////////////////////////

/*$sql  = mysql_query("SELECT * AS state_name, count( * ) AS stat_count
                FROM (
                   ......
                ) k
                GROUP BY status
                ORDER BY status ");
     $info = mysql_fetch_array($sql);
     $objActSheet->setCellValue('A1', 'Summary');
     if(strlen( trim( $sdev_model))  > 0 )
     { 
      $objActSheet->setCellValue('A2',"Model: XXXXXX");
     }
  

    $row=3;
    $objActSheet->setCellValue('A'.$row,'State');
    $objActSheet->setCellValue('B'.$row, 'The total number of');
    $row=4;

    do{                         
        $objActSheet->setCellValueExplicit('A'.$row,$info['state_name'],PHPExcel_Cell_DataType::TYPE_STRING);
        $objActSheet->setCellValueExplicit('B'.$row,$info['stat_count'],PHPExcel_Cell_DataType::TYPE_NUMERIC);

        $objActSheet->setCellValue('A'.$row, $info['state_name']);
        $objActSheet->setCellValue('B'.$row, $info['stat_count']);
        $row++;
    }while($info=mysql_fetch_array($sql));


/////////////////////////////////////////////////////////////////////////
    
for ($currrow = 3; $currrow <$row; $currrow++) {
  //Set the border   
  $objActSheet->getStyle('A'.$currrow)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('A'.$currrow)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('A'.$currrow)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('A'.$currrow)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('B'.$currrow)->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('B'.$currrow)->getBorders()->getLeft()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('B'.$currrow)->getBorders()->getRight()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
    $objActSheet->getStyle('B'.$currrow)->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN );   
 }*/
//////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////

//  Set the Labels for each data series we want to plot
//    Datatype
//    Cell reference for data
//    Format Code
//    Number of datapoints in series
//    Data values
//    Data Marker
$dataseriesLabels1 = array(
    new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$B$3', NULL, 1), 
  
);
//  Set the X-Axis Labels
//    Datatype
//    Cell reference for data
//    Format Code
//    Number of datapoints in series
//    Data values
//    Data Marker
$xAxisTickValues1 = array(
  new PHPExcel_Chart_DataSeriesValues('String', 'Worksheet!$A$4:$A$', NULL, 4),  
);

//  Set the Data values for each data series we want to plot
//    Datatype
//    Cell reference for data
//    Format Code
//    Number of datapoints in series
//    Data values
//    Data Marker
$dataSeriesValues1 = array(
  new PHPExcel_Chart_DataSeriesValues('Number', 'Worksheet!$B$4:$B$', NULL, 4), 
);

//  Build the dataseries
$series1 = new PHPExcel_Chart_DataSeries(
  PHPExcel_Chart_DataSeries::TYPE_BARCHART,       // plotType
  PHPExcel_Chart_DataSeries::GROUPING_STANDARD,     // plotGrouping
  range(0, count($dataSeriesValues1)-1),          // plotOrder
  $dataseriesLabels1,                   // plotLabel
  $xAxisTickValues1,                    // plotCategory
  $dataSeriesValues1                    // plotValues
);

//  Set up a layout object for the Pie chart
$layout1 = new PHPExcel_Chart_Layout();
$layout1->setShowVal(TRUE);
$layout1->setShowPercent(TRUE);

//  Set the series in the plot area
$plotarea1 = new PHPExcel_Chart_PlotArea(NULL, array($series1));
//  Set the chart legend
$legend1 = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);

$title1 = new PHPExcel_Chart_Title('Summary');


//  Create the chart
$chart1 = new PHPExcel_Chart(
  'chart1',   // name
  $title1,    // title
  $legend1,   // legend
  $plotarea1,   // plotArea
  true,     // plotVisibleOnly
  0,        // displayBlanksAs
  NULL,     // xAxisLabel
  NULL      // yAxisLabel   - Pie charts don't have a Y-Axis
);

//  Set the position where the chart should appear in the worksheet
$row += 2;
$chart1->setTopLeftPosition('A'.$row);
$row += 10;
$chart1->setBottomRightPosition('C'.$row);

//  Add the chart to the worksheet
$objPHPExcel->getActiveSheet()->addChart($chart1);
//////////////////////////////////////////////////////////////////////////////////////////

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

$filename = 'Summary_'.date("Y_m_d").".xlsx";


// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$filename.'"'); //devrent.xlsx

////////////////////////////////////////
//Treatment Chinese file name problem
/*$ua = $_SERVER["HTTP_USER_AGENT"];  
$encoded_filename = urlencode($filename);
$encoded_filename = str_replace("+", "%20",$encoded_filename);
header('Content-Type: application/octet-stream');
if (preg_match("/MSIE/", $ua)) { 
    header('Content-Disposition: attachment;filename="' . $encoded_filename . '"');
}else if (preg_match("/Firefox/", $ua)){ 
   header('Content-Disposition: attachment; filename*="utf8\'\'' . $filename . '"');
}else { 
  header('Content-Disposition: attachment; filename="' . $filename . '"');
}
////////////////////////////////////////

header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0/
*/

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->setIncludeCharts(TRUE);
$objWriter->save('output.xlsx');
exit;