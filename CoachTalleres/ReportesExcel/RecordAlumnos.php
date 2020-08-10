<?php 

include("../../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos 
require('../PHPExcel-1.8/Classes/PHPExcel.php');

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
	$consulta=$pdo->prepare("SELECT `ID_Alumno` , `Nombre` , `Class` , `ID_Sede` , Estado  FROM alumnos WHERE `Estado` = 'Activo' OR `Estado` = 'Graduado'  AND SedeAsistencia =  ? OR  SedeAsistencia  =  ? ");
	$consulta->execute(array($LugarFT,$LugarSAT));



header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ListaAlumnos.xlsx"');
header('Cache-Control: max-age=0');

$excel = new PHPExcel();

$excel->getProperties()->setCreator('Oportunidades-FGK')->setLastModifiedBy('Oportunidades-FGK')->setTitle('Listado De Alumnos');

$excel->setActiveSheetIndex(0);

$pagina = $excel->getActiveSheet()->setTitle('Listado De Alumnos');


$pagina->setCellValue('A1','Lista De Alumnos');
$pagina->setCellValue('A2','Carnet');
$pagina->setCellValue('B2','Nombre');
$pagina->setCellValue('C2','Class');
$pagina->setCellValue('D2','SEDE');
$pagina->setCellValue('E2','Talleres Interno');
$pagina->setCellValue('F2','Talleres Externo');
$pagina->setCellValue('G2','Reuniones');
$pagina->setCellValue('H2','Total');
$pagina->setCellValue('I2','Status Certificación');



$i = 2;
	if ($consulta->rowCount()>=1)
	{	
		while ($fila=$consulta->fetch())
		{	 
			

		$pagina->setCellValue('A'.($i+1), $fila['ID_Alumno']);
		$pagina->setCellValue('B'.($i+1), $fila['Nombre']);
		$pagina->setCellValue('C'.($i+1), $fila['Class']);
		$pagina->setCellValue('D'.($i+1), $fila['ID_Sede']);



		$consulta3=$pdo->prepare("SELECT COUNT(`Asistencia`) AS 'Total_Interno' FROM inscripciontalleres IT INNER JOIN talleres T on IT.`ID_Taller` = T.`ID_Taller` LEFT JOIN alumnos A on IT.`ID_Alumno` = A.`ID_Alumno`  WHERE T.ID_Empresa = 'FGK' AND `Asistencia` = 'Asistio' AND A.ID_Alumno='".$fila['ID_Alumno']."'  GROUP BY A.ID_Alumno HAVING COUNT( Asistencia ) >= 1");
		$consulta3->execute();
		$fila2=$consulta3->fetch();

		$consulta2=$pdo->prepare("SELECT COUNT(`Asistencia`) AS 'Total_Externo' FROM inscripciontalleres IT INNER JOIN talleres T on IT.`ID_Taller` = T.`ID_Taller` LEFT JOIN alumnos A on IT.`ID_Alumno` = A.`ID_Alumno` LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE `Asistencia` = 'Asistio' AND E.Tipo = 'Empresa Externa' AND A.ID_Alumno='".$fila['ID_Alumno']."'  GROUP BY A.ID_Alumno HAVING COUNT( Asistencia ) >= 1");
		$consulta2->execute();
		$fila3=$consulta2->fetch();


		$consulta4=$pdo->prepare("SELECT COUNT(`asistencia`) AS 'Reunion' FROM inscripcionreunion WHERE `asistencia` = 'Asistio' AND `id_alumno` = '".$fila['ID_Alumno']."' GROUP BY `id_alumno` HAVING COUNT( `asistencia` ) >= 1 ");
		$consulta4->execute();
		$fila4=$consulta4->fetch();

		$Result;
		if ($fila2['Total_Interno'] == null) 
		{
			$Result = 0;
		}else
		{
			$Result = $fila2['Total_Interno'];
		}

		$Result2;

		if ($fila3['Total_Externo'] == null) 
		{
			$Result2 = 0;
		}else
		{
			$Result2 = $fila3['Total_Externo'];
		}

		$result3;
		if ($fila4['Reunion'] == null) 
		{
			$result3 = 0;
		}else
		{
			$result3 = $fila4['Reunion'];
		}
		
		$Result4 = $Result +  $Result2 + $result3;

		$pagina->setCellValue('E'.($i+1), $Result);
		$pagina->setCellValue('F'.($i+1), $Result2);
		$pagina->setCellValue('G'.($i+1), $result3);
		$pagina->setCellValue('H'.($i+1), $Result4);
		$pagina->setCellValue('I'.($i+1), $fila['Estado']);



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