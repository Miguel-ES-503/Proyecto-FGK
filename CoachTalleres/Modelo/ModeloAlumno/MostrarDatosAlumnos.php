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
//<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila['ID_Alumno']."></td>

	// Consulta De La BASE DE DATOS
	$consulta=$pdo->prepare("SELECT * FROM alumnos WHERE SedeAsistencia =  ? OR  SedeAsistencia  =  ? ");
	
	$consulta->execute(array($LugarFT,$LugarSAT));

	if ($consulta->rowCount()>=1)
	{
		while ($fila=$consulta->fetch())
			{		
				$Asistencia;
				if ($fila['SedeAsistencia'] == "SSFT") {
					$Asistencia = "San Salvador";
				}else
				{
					$Asistencia = "Santa Ana";
				}

				echo "
		<tr class='table-light'>
		
		<th>".$fila['ID_Alumno']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>
		<th>".$Asistencia."</th>
		<th>".$fila['StatusActual']."</th>
		<th>".$fila['Estado']."</th>
		<td><a href='AlumnoInicio.php?id=".$fila['correo']."' class='fas fa-user  btn btn-warning'></a> </td>
		
		</tr>";

	}
}







?>