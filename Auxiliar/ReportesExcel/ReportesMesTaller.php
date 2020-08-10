<?php 

	//Conexion con la base de datos
require_once('../../BaseDatos/conexion.php');

if (isset($_GET['id'])) {

	$sede = $_GET['id'];
	$mes = $_GET['id2'];
	$yaer = $_GET['id3'];

	  $consulta=$pdo->prepare("SELECT ID_Taller , Fecha , Titulo , `ID_Empresa` ,ID_Sede , FT.Nombre AS 'Tipo' ,t.ID_Formato FROM talleres t INNER JOIN formatotalleres FT ON t.ID_Formato = FT.ID_Formato WHERE YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? AND `ID_Sede` = ? AND `ID_Empresa` = 'FGK' ORDER BY `t`.`Fecha` ASC ");
$consulta->execute(array($yaer,$mes,$sede));

 $consulta4=$pdo->prepare("SELECT COUNT(DISTINCT(I.ID_Alumno)) as 'Total' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
            $consulta4->execute(array($sede,$yaer,$mes));//Asistencia real
             
while ($fila2=$consulta4->fetch()){	
			 	$Totalreal = $fila2['Total'];
 }


    $consulta5 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.Fecha AND  YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta5->execute(array($sede,$yaer,$mes));//Asistencia impacto

    while ($fila3=$consulta5->fetch()){	
			 	$TotalImpactos = $fila3['Total'];
 }



    $consulta7=$pdo->prepare("SELECT COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller INNER JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno WHERE T.ID_Sede =  ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta7->execute(array($sede,$yaer,$mes));//Asistencia Real hombres

       while ($fila4=$consulta7->fetch()){	
			 	$TotalHombres = $fila4['TotalHOM'];
 }



 $consulta8 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ?  ");
 $consulta8->execute(array($sede,$yaer,$mes));//Asistencia real Mujeres

     while ($fila5=$consulta8->fetch()){	
			 	$TotalMujer = $fila5['TotalMUJ'];
 }


  $consulta9 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Charla' FROM `talleres` WHERE ID_Formato = 'SITC' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta9->execute(array($sede,$yaer,$mes));//total charla

     while ($fila6=$consulta9->fetch()){	
			 	$TotalCharla = $fila6['Charla'];
 }
 
 $consulta12 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Taller' FROM `talleres` WHERE ID_Formato = 'SITT' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta12->execute(array($sede,$yaer,$mes));//total charla

     while ($fila7=$consulta12->fetch()){	
			 	$TotalTaller = $fila7['Taller'];
 }


  $consulta13 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Foros' FROM `talleres` WHERE ID_Formato = 'SITF' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta13->execute(array($sede,$yaer,$mes));//total charla

     while ($fila8=$consulta13->fetch()){	
			 	$TotalForos = $fila8['Foros'];
 }


  $consulta14 = $pdo->prepare("SELECT COUNT(ID_Taller) AS 'Laboratorio' FROM `talleres` WHERE ID_Formato = 'SITL' AND `ID_Sede` = ? AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
 $consulta14->execute(array($sede,$yaer,$mes));//total charla

     while ($fila9=$consulta14->fetch()){	
			 	$TotalLab = $fila9['Laboratorio'];
 }



    $consulta15=$pdo->prepare("SELECT COUNT(I.ID_Alumno) as 'TotalHOM' from inscripciontalleres I INNER JOIN talleres T ON I.ID_Taller = T.ID_Taller INNER JOIN alumnos A ON I.ID_Alumno = A.ID_Alumno WHERE T.ID_Sede =  ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ? ");
    $consulta15->execute(array($sede,$yaer,$mes));//Asistencia Real hombres

       while ($fila15=$consulta15->fetch()){	
			 	$TotalHImpacto = $fila15['TotalHOM'];
 }


  $consulta16 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND YEAR(Fecha) = ? AND MONTH(`Fecha`) = ?  ");
 $consulta16->execute(array($sede,$yaer,$mes));//Asistencia real Mujeres

     while ($fila16=$consulta16->fetch()){	
			 	$TotalImpactosM = $fila16['TotalMUJ'];
 }

 $MESTomado;

  if($mes == 01){echo "Enero";}
		    elseif ($mes == 02) {  $MESTomado = "Febrero";}
		    elseif ($mes == 03) {  $MESTomado = "Marzo";}	
		    elseif ($mes == 04) {  $MESTomado = "Abril";} 
		    elseif ($mes == 05) {  $MESTomado = "Mayo";} 
		    elseif ($mes == 06) {  $MESTomado =  "Junio";}
		    elseif ($mes == 07) {  $MESTomado = "Julio";}
		    elseif ($mes ==  8) {  $MESTomado = "Agosto";}
		    elseif ($mes == 9) {
                 $MESTomado =  "Septiembre";
            }
            elseif ($mes == 10) {
                $MESTomado =  "Octubre";
            }
            elseif ($mes == 11) {
                $MESTomado = "Noviembre";
            }
            elseif ($mes ==12) {
                 $MESTomado = "Diciembre";
                
            }



header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ReporteAsistenciaTaller.xlsx"');
header('Cache-Control: max-age=0');

require('../PHPExcel-1.8/Classes/PHPExcel.php');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Reporte del mes');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet();

$pagina->setCellValue('B1','Reporte del mes: de"'.$MESTomado.'" de la sede "'.$sede.'" del año "'.$yaer.'" ');
$pagina->setCellValue('B2','Resutado de asistencia real');
$pagina->setCellValue('C1','Hombres');
$pagina->setCellValue('D1','Mujeres');


$pagina->setCellValue('C2',$TotalHombres);
$pagina->setCellValue('D2',$TotalMujer);

$pagina->setCellValue('B3','Resutado de asistencia Impactos');
$pagina->setCellValue('C3',$TotalHImpacto);
$pagina->setCellValue('D3',$TotalImpactosM);

$pagina->setCellValue('E1','Total');
$pagina->setCellValue('E2',$Totalreal);
$pagina->setCellValue('E3',$TotalImpactos);

$pagina->setCellValue('B5','Resultados de tipos talleres dados');
$pagina->setCellValue('C5','Taller');
$pagina->setCellValue('D5','Charla');
$pagina->setCellValue('E5','Foro');
$pagina->setCellValue('F5','Laboratorio');



$pagina->setCellValue('C6',$TotalTaller);
$pagina->setCellValue('D6',$TotalCharla);
$pagina->setCellValue('E6',$TotalForos);
$pagina->setCellValue('F6',$TotalLab);


$pagina->setCellValue('A9','Fecha');
$pagina->setCellValue('B9','Taller');
$pagina->setCellValue('C9','Tipo');
$pagina->setCellValue('D9','Impacto');
$pagina->setCellValue('E9','Hombres');
$pagina->setCellValue('F9','Mujeres');

$i = 9;

 
	while ($fila=$consulta->fetch())
	{
		$pagina->setCellValue('A'.($i+1), $fila['Fecha']);
		$pagina->setCellValue('B'.($i+1), $fila['Titulo']);
		$pagina->setCellValue('C'.($i+1), $fila['Tipo']);

		 //La asistencia de impacto
			$consulta3 = $pdo->prepare("SELECT  COUNT(I.ID_Alumno) as 'Total'
            from inscripciontalleres I
            INNER JOIN talleres T
            ON I.ID_Taller = T.ID_Taller
            WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND T.ID_Taller = ? ");
		    $consulta3->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencoa de impacto
		    $fila3=$consulta3->fetch();
		    $pagina->setCellValue('D'.($i+1), $fila3['Total']);

		     $consulta10 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalHOM' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'M' AND T.ID_Taller = ? ");
		    $consulta10->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencia real
		     $fila5=$consulta10->fetch();
		     $pagina->setCellValue('E'.($i+1), $fila5['TotalHOM']);

		     $consulta11 = $pdo->prepare("SELECT  COUNT(DISTINCT(I.ID_Alumno)) as 'TotalMUJ' 
                from inscripciontalleres I
                INNER JOIN talleres T
                ON I.ID_Taller = T.ID_Taller
                INNER JOIN alumnos A
                ON I.ID_Alumno = A.ID_Alumno
                WHERE T.ID_Sede = ? AND I.Asistencia = 'Asistio' AND A.Sexo = 'F' AND T.ID_Taller = ? ");
		      $consulta11->execute(array($fila['ID_Sede'],$fila['ID_Taller']));//Asistencia real
		     $fila6=$consulta11->fetch();
		     $pagina->setCellValue('F'.($i+1),$fila6['TotalMUJ']);


		

		$i++;
	}

	 foreach (range('A','F') as $columna) 
 {
 	$pagina->getColumnDimension($columna)->setAutoSize(true);
 }		



$objWriter = PHPExcel_IOFactory::createWriter($excel,'Excel2007');
$objWriter->save('php://output');



	}else
	{
		echo "Problemas a recibir los id";
	}


?>