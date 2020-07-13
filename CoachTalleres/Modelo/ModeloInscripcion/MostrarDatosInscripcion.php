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

	// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT * FROM inscripcion WHERE ID_Sede =  ? OR  ID_Sede  =  ? ");
$consulta->execute(array($LugarFT,$LugarSAT));

if ($consulta->rowCount()>=1)
{
	while ($fila=$consulta->fetch())
		{		echo "
	<tr class='table-light'>
	<th>".$fila['IDinscripcion']."</th>
	<th>".$fila['ID_Sede']."</th>
	<th>".$fila['Fecha']."</th>
	<th>".$fila['Hora']."</th>
	<th>".$fila['estado']."</th>
	<td><a href='Vistas/VistasInscripcion/ActualizaInscripcion.php?id=".$fila['IDinscripcion']."' class='fas fa-pencil-alt  btn btn-success'></a> </td>
	<td><a href='Vistas/VistasInscripcion/EliminarInscrpcion.php?id=".$fila['IDinscripcion']."' class='fas fa-trash  btn btn-warning'></a> </td>
	</tr>";

}
}





 ?>