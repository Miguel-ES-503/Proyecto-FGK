<?php

 require_once('../LibreriasPDF/fpdf.php');
 require_once('../../BaseDatos/conexion.php');

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


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

	$consulta3=$pdo->prepare("SELECT COUNT(ID_Alumno) AS Total FROM inscripciontalleres  WHERE ID_Taller =  ? ");
	$consulta3->execute(array($id));
	$Total ='';

	    if ($consulta3->rowCount() >=0) 
  		{
  			$fila3=$consulta3->fetch();
  			$Total = $fila3['Total'];
  		}	
	
	
	
	$consulta2=$pdo->prepare("SELECT a.ID_Alumno , a.ID_Alumno, a.Nombre , a.Class , a.ID_Sede , a.Sexo , a.ID_Empresa , car.nombre AS 'Carrera'  , T.Titulo , Asistencia ,IT.ID_Taller FROM inscripciontalleres IT INNER JOIN alumnos a on IT.ID_Alumno = a.ID_Alumno LEFT JOIN talleres T on IT.ID_Taller = T.ID_Taller LEFT JOIN carrera car on a.ID_Carrera = car.Id_Carrera  WHERE  IT.ID_Taller =  ?");
	$consulta2->execute(array($id));

	
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


 $pdf->Cell(20);
$pdf->Cell(37,6,utf8_decode('Nombre del Taller: '),0,0,'L',1);
$pdf->Cell(1);
$pdf->Cell(80,6,utf8_decode($TituloTaller),0,0,'L',1);
$pdf->Ln(6);
$pdf->Cell(20);
$pdf->Cell(10,6,utf8_decode('Tipo:'),0,0,'L',1);
$pdf->Cell(1);
$pdf->Cell(25,6,utf8_decode($Tipo),0,0,'L',1);
$pdf->Cell(13,6,utf8_decode('Lugar:'),0,0,'L',1);
$pdf->Cell(2);
$pdf->Cell(130,6,utf8_decode($Lugar),0,0,'L',1);
$pdf->Cell(13,6,utf8_decode('Fecha:'),0,0,'L',1);
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





 $pdf->Output($TituloTaller.".pdf","I");
?>