<?php

require_once('../LibreriasPDF/fpdf.php');
require_once('../../BaseDatos/conexion.php');

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


if (isset($_GET['id'])) {
	
	$id=$_GET['id'];

	$consulta=$pdo->prepare("SELECT * FROM reuniones WHERE ID_Reunion = :ID_Reunion");
	$consulta->bindParam(":ID_Reunion",$id);
	$consulta->execute();


	$TituloReunion = '';
	$Ubicacíon = '';
	$Fecha = '';
	$Ciclo = '';
	

	if ($consulta->rowCount() >=0)
	{
		$fila=$consulta->fetch();
		$TituloReunion = $fila['Titulo'];
		$Ubicacíon = $fila['ID_Empresa'];
		$Fecha = $fila['Fecha'];
		$Ciclo = $fila['ID_Ciclo'];

	}



	$consulta2=$pdo->prepare("SELECT  reu.ID_Reunion, alu.ID_Alumno,  alu.ID_Alumno , alu.Nombre , alu.Class , alu.ID_Sede , alu.Sexo , alu.ID_Empresa, reu.Titulo , car.nombre , asistencia  FROM inscripcionreunion IR INNER JOIN alumnos alu on  IR.id_alumno = alu.ID_Alumno LEFT JOIN reuniones reu on IR.id_reunion = reu.ID_Reunion  LEFT JOIN carrera car on alu.Id_Carrera = car.Id_Carrera  WHERE IR.id_reunion = ? ");
	$consulta2->execute(array($id));


	$consulta3=$pdo->prepare("SELECT COUNT(ID_Alumno) AS Total FROM inscripcionreunion  WHERE ID_Reunion =  ? ");
	$consulta3->execute(array($id));
	$Total ='';

	if ($consulta3->rowCount() >=0) 
	{
		$fila3=$consulta3->fetch();
		$Total = $fila3['Total'];

	}	
	

	
}


$pdf = new FPDF("P" , 'mm' , 'A3');
$pdf->AddPage();


//Insertar Imagenes
$pdf->Image('Recursos/funda.png',20, 14, 25, 30, 'png');
$pdf->Image('Recursos/logo_oportunidades.png',215, 20, 70, 20, 'png');

$pdf->Ln(15);           
$pdf->SetFont('Arial','B',17);
$pdf->Cell(100);
$pdf->Cell(172,8,utf8_decode('Fundación Gloria De Kriete'), 0, 1);
$pdf->Cell(103);
$pdf->Cell(172,8,utf8_decode('Programa Oportunidades'), 0, 1);
$pdf->Ln(10);
$pdf->Cell(10);

$pdf->Cell(25);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->Ln(2);

$pdf->Cell(40);
$pdf->Cell(33,6,utf8_decode('Nombre Reunión: '),0,0,'L',1);
$pdf->Cell(5);
$pdf->Cell(35,6,utf8_decode($TituloReunion),0,0,'L',1);
$pdf->Ln(6);
$pdf->Cell(40);
$pdf->Cell(25,6,utf8_decode('Universidad:'),0,0,'L',1);
$pdf->Cell(2);
$pdf->Cell(50,6,utf8_decode($Ubicacíon),0,0,'L',1);
$pdf->Cell(11,6,utf8_decode('Ciclo:'),0,0,'L',1);
$pdf->Cell(2);
$pdf->Cell(60,6,utf8_decode($Ciclo),0,0,'L',1);
$pdf->Cell(11,6,utf8_decode('Fecha:'),0,0,'L',1);
$pdf->Cell(2);
$pdf->Cell(35,6,utf8_decode($Fecha),0,0,'L',1);

 $pdf->Ln(15);
 $pdf->SetFont('Arial','',10);
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(112);
 $pdf->Cell(172,8,utf8_decode('Lista de asistencia'), 0, 1);
 $pdf->Ln(10);
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(70,6,'Carnet',1,0,'C',1);
 $pdf->Cell(80,6,'Alumno',1,0,'C',1);
 $pdf->Cell(20,6,'Class',1,0,'C',1);
 $pdf->Cell(20,6,'Sede',1,0,'C',1);
 $pdf->Cell(20,6,'Sexo',1,0,'C',1);
 $pdf->Cell(40,6,'Universidad',1,0,'C',1);
 $pdf->Cell(30,6,'Firma',1,1,'C',1);
 $pdf->SetFont('Arial','',10);
    
if ($consulta2->rowCount()>=1)
{
    while ($fila2=$consulta2->fetch())
    {	$pdf->Cell(70,6,utf8_decode($fila2['ID_Alumno']),1,0,'C');
        $pdf->Cell(80,6,utf8_decode($fila2['Nombre']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['Class']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['ID_Sede']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['Sexo']),1,0,'C');
 	    $pdf->Cell(40,6,utf8_decode($fila2['ID_Empresa']),1,0,'C');
 	    
        $pdf->Cell(30,6,'',1,1,'L');
    }
}



$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(250,6,'Total De Alumnos',1,0,'L',1);
$pdf->Cell(30,6,$Total,1,1,'L',1);





$pdf->Output($TituloReunion.".pdf","I");
?>