<?php

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

//$Lugar2="SSSAT";


	// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("	SELECT A.Titulo as 'Titulo', A.Fecha as 'Fecha',S.Nombre as 'Sede',F.Nombre as 'Tipo'
	from tallercompetencia T
	INNER JOIN talleres A
	ON T.ID_Taller = A.ID_Taller
	INNER JOIN sedes S
	ON A.ID_Sede = S.ID_Sede
	INNER JOIN formatotalleres F
	ON F.ID_Formato = A.ID_Formato
	where T.IDComptenecia = ? AND Date_Format(A.Fecha,'%M')= ? AND Date_Format(A.Fecha,'%Y')= ?
	");
$IdC = $_GET['id'];
$Month = $_GET['id2'];
$Year = $_GET['id3'];
//echo $Month;

setlocale(LC_TIME, 'es_SV.UTF-8');
$consulta->execute(array($IdC,$Month,$Year));

if ($consulta->rowCount()>=0)
{
	while ($fila=$consulta->fetch())
	{	
		
		
		echo "
		<tr class='table-light'>
		<td>".$fila['Titulo']."</td> 
		<td>".$fila['Fecha']."</td> 
		<td>".$fila['Sede']."</td> 
		<td>".$fila['Tipo']."</td> 
		</tr>
		"; 
		

		
	}
}
?>