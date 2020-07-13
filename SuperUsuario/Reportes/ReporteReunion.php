<?php

 require_once('../LibreriasPDF/fpdf.php');
 require_once('../../BaseDatos/conexion.php');

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];






 $pdf = new FPDF("P" , 'mm' , 'A3');
 $pdf->AddPage();


//Insertar Imagenes
$pdf->Image('Recursos/funda.png',20, 14, 25, 30, 'png');
$pdf->Image('Recursos/logo_oportunidades.png',220, 14, 70, 20, 'png');
 
 $pdf->Ln(7);           
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(100);
 $pdf->Cell(172,8,utf8_decode('Fundación Gloria De Kriete'), 0, 1);
 $pdf->Cell(103);
 $pdf->Cell(172,8,utf8_decode('Programa Oportunidades'), 0, 1);
 $pdf->Ln(10);
 $pdf->Cell(100);
 $pdf->Cell(172,8,utf8_decode('REPORTE DE REUNIONES'), 0, 1);
 $pdf->Ln(10);

 $pdf->Cell(25);
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(20,6,'ID',1,0,'C',1);
 $pdf->Cell(60,6,'Titulo',1,0,'C',1);
 $pdf->Cell(30,6,'Tipo',1,0,'C',1);
 $pdf->Cell(30,6,'Ciclo',1,0,'C',1);
 $pdf->Cell(40,6,'Empresa',1,0,'C',1);
 $pdf->Cell(20,6,utf8_decode('Rating'),1,0,'C',1);
 $pdf->Cell(30,6,'Fecha',1,1,'C',1);
 $pdf->SetFont('Arial','',10);
 $pdf->Cell(25);






 $pdf->Output();
?>