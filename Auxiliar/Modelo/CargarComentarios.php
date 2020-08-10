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
$consulta=$pdo->prepare("SELECT Comentario from evaluaciontalleres where ID_Taller = ? ");

$consulta->execute(array($id));

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch())
		{	
			$cont ++;
			echo "<ul id='comments-list' class='comments-list'>
	<li>
	<div class='comment-main-level'>
	
	<div class='comment-box'>
	<div class='comment-head'>
	<h6 class='comment-name '>
	<a href=''>Alumno ".$cont."</a>
	</h6>
	<span>
	</span>

	</div>
	<div class='comment-content'>".$fila['Comentario']."</div>
	</div>
	</div>
	</ul>";
	

}
}

?>