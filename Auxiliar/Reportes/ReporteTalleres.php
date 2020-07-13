<?php

 require_once('../LibreriasPDF/fpdf.php');
 require_once('../../BaseDatos/conexion.php');

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



$consulta=$pdo->prepare("SELECT ID_Taller ,Titulo , Fecha , Hora, F.Nombre AS 'Tipo' ,ID_Sede , ID_Ciclo, E.Nombre AS 'Empresa' ,Estado , Rating FROM talleres T INNER JOIN formatotalleres F on T.ID_Formato = F.ID_Formato LEFT JOIN empresas E on T.ID_Empresa = E.ID_Empresa WHERE ID_Sede =  ? AND Estado = 'Activo'  ORDER BY Tipo DESC ");
$consulta->execute(array($LugarFT));



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
 $pdf->Cell(172,8,utf8_decode('REPORTE DE TALLERES'), 0, 1);
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
 while($fila=$consulta->fetch())
 {
 	$pdf->Cell(20,6,utf8_decode($fila['ID_Taller']),1,0,'C');
 	$pdf->Cell(60,6,$fila['Titulo'],1,0,'C');
 	$pdf->Cell(30,6,$fila['Tipo'],1,0,'C');
 	$pdf->Cell(30,6,$fila['ID_Ciclo'],1,0,'C');
 	$pdf->Cell(40,6,$fila['Empresa'],1,0,'C');
 	$pdf->Cell(20,6,$fila['Rating'],1,0,'C');
 	$pdf->Cell(30,6,utf8_decode($fila['Fecha']),1,1,'C');
 	$pdf->Cell(25);
 }





 $pdf->Output();
?>