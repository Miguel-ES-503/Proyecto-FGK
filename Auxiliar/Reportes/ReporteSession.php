<?php

require_once('../LibreriasPDF/fpdf.php');
require_once('../../BaseDatos/conexion.php');

session_start();
setlocale(LC_TIME, 'spanish');
$date = date('Y-m-d');
$stmt = "";
$coun = $pdo->query("SELECT count(*) FROM one_on_one WHERE estado = 'Finalizado' ")->fetchColumn();
$stmt = $pdo->query("SELECT *  FROM one_on_one LEFT JOIN alumnos ON   alumnos.ID_Alumno = one_on_one.id_alumno WHERE one_on_one.estado = 'Finalizado' ");
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

$pdf->Cell(5);
$pdf->Cell(35,6,utf8_decode('Reporte mes de: ').strftime(" %B ",strtotime($date)),0,0,'L',1);
$pdf->Ln(6);
$pdf->Cell(40);
 $pdf->Ln(15);
 $pdf->SetFont('Arial','',10);
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(85);
 $pdf->Cell(140,6,utf8_decode('Lista de asistencia One on One finalizas'), 0, 1);
 $pdf->Ln(10);
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(50,6,'Encargado',1,0,'C',1);
 $pdf->Cell(55,6,'Nombre',1,0,'C',1);
 $pdf->Cell(30,6,'ID Alumno',1,0,'C',1);
 $pdf->Cell(20,6,'Sede',1,0,'C',1);
 $pdf->Cell(15,6,'Cupo',1,0,'C',1);
 $pdf->Cell(30,6,'Asistencia',1,0,'C',1);
 $pdf->Cell(20,6,'Ciclo',1,0,'C',1);
 $pdf->Cell(50,6,'Fecha',1,1,'C',1);
 $pdf->SetFont('Arial','',10);    
if ($stmt->rowCount()>=1)
{
    while ($fila2=$stmt->fetch())
    {   $pdf->Cell(50,6,($fila2['titulo']),1,0,'C');
        $pdf->Cell(55,6,utf8_decode($fila2['Nombre']),1,0,'C');
        $pdf->Cell(30,6,utf8_decode($fila2['id_alumno']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['ID_Sede']),1,0,'C');
        $pdf->Cell(15,6,$fila2['cupo'],1,0,'C');
        $pdf->Cell(30,6,utf8_decode($fila2['estado_alumno']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['ciclo']),1,0,'C');
        $pdf->Cell(50,6,strftime("%A %d "." de"." %B del %Y ",strtotime($fila2['fecha'])),1,0,'C');
         $pdf->Ln();
         //$pdf->Cell(30,6,'',1,1,'L');
    }
}

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(240,6,'Total De Alumnos',1,0,'L',1);
$pdf->Cell(30,6,$coun,1,1,'L',1);
$pdf->Output("Reporte.pdf","I");
?>