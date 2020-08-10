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
	$consulta=$pdo->prepare("SELECT * FROM alumnos WHERE SedeAsistencia =  ? OR  SedeAsistencia  =  ? ");
	
	$consulta->execute(array($LugarFT,$LugarSAT));

	if ($consulta->rowCount()>=1)
	{
		while ($fila=$consulta->fetch())
			{		echo "
		<tr class='table-light'>
		<th>".$fila['ID_Alumno']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>
		<th>".$fila['SedeAsistencia']."</th>
		<th>".$fila['Estado']."</th>
		<td><a href='NotasPorAlumno.php?id=".$fila['ID_Alumno']."' class='fas fa-clipboard-list  btn btn-success'></a> </td>
		</tr>";

	}
}



 ?>