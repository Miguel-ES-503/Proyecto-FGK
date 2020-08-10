<?php

require_once('../LibreriasPDF/fpdf.php');
require_once('../../BaseDatos/conexion.php');

session_start();
setlocale(LC_TIME, 'spanish');
$date = date('Y-m-d');
$stmt = "";
//$coun = $pdo->query("SELECT count(*) FROM one_on_one WHERE estado = 'Finalizado' ")->fetchColumn();
$stmt = $pdo->prepare("SELECT alumnos.Nombre AS alumno , alumnos.Class,alumnos.ID_Sede,alumnos.Sexo, datos_modulos.id_alumno , datos_modulos.id, datos_modulos.id_modulo , empresas.Nombre, datos_modulos.estado FROM datos_modulos LEFT JOIN alumnos ON datos_modulos.id_alumno =  alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE datos_modulos.id_modulo = ?  ");
$pdf = new FPDF("P" , 'mm' , 'A3');
$pdf->AddPage('landscape');
//   Insertar Imagenes
$pdf->Image('Recursos/funda.png',75, 14, 25, 30, 'png');
$pdf->Image('Recursos/logo_oportunidades.png',300, 20, 70, 20, 'png');

$pdf->Ln(15);           
$pdf->SetFont('Arial','B',17);
$pdf->Cell(160);
$pdf->Cell(172,8,utf8_decode('Fundación Gloria De Kriete'), 0, 1);
$pdf->Cell(160);
$pdf->Cell(172,8,utf8_decode('Programa Oportunidades'), 0, 1);
$pdf->Ln(10);
$pdf->Cell(10);

$pdf->Cell(25);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','B',12);
$pdf->Ln(2);

$pdf->Cell(172);
$pdf->Cell(35,6,utf8_decode('Reporte mes de: ').strftime(" %B ",strtotime($date)),0,0,'L',1);
$pdf->Ln(6);
$pdf->Cell(40);
 $pdf->Ln(15);
 $pdf->SetFont('Arial','',10);
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(150);
 $pdf->Cell(140,6,utf8_decode('Lista de alumnos inscritos Modulo C2'), 0, 1);
 $pdf->Ln(10);
 $pdf->Cell(50);
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(40,6,'ID Alumno',1,0,'C',1);
 $pdf->Cell(80,6,'Alumno',1,0,'C',1);
 $pdf->Cell(15,6,'Sexo',1,0,'C',1);
 $pdf->Cell(15,6,'Class',1,0,'C',1);
 $pdf->Cell(33,6,'Sede/Modalidad',1,0,'C',1);
 $pdf->Cell(120,6,'Universidad',1,0,'C',1);
 $pdf->Cell(25,6,'Estado',1,0,'C',1);
 $pdf->Ln();
 //  $pdf->Cell(0,6,'',1,1,'L');


    $stmt->execute(array('MOD20000002'));  
    while ($fila2=$stmt->fetch())
    {	$pdf->Cell(50);
        $pdf->Cell(40,6,utf8_decode($fila2['id_alumno']),1,0,'C');
        $pdf->Cell(80,6,utf8_decode($fila2['alumno']),1,0,'C');
        $pdf->Cell(15,6,utf8_decode($fila2['Sexo']),1,0,'C');
        $pdf->Cell(15,6,utf8_decode($fila2['Class']),1,0,'C');
        $pdf->Cell(33,6,utf8_decode($fila2['ID_Sede']),1,0,'C');
        $pdf->Cell(120,6,($fila2['Nombre']),1,0,'C');
        $pdf->Cell(25,6,utf8_decode($fila2['estado']),1,0,'C');
        $pdf->Ln();
        //$pdf->Cell(0,6,'',1,1,'L');
    }
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
//$pdf->Cell(240,6,'Total De Alumnos',1,0,'L',1);
//$pdf->Cell(30,6,$coun,1,1,'L',1);
$pdf->Output("Reporte.pdf","I");
?>