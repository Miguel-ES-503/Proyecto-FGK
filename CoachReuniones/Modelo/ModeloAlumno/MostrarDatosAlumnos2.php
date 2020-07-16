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
	$consulta=$pdo->prepare("SELECT * FROM alumnos LEFT JOIN carrera ON alumnos.ID_Carrera = carrera.Id_Carrera WHERE SedeAsistencia =  ? OR  SedeAsistencia  =  ? ");
	
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
		<th>".$fila['Sexo']."</th>
		<th>".$fila['Class']."</th>
		<th>".$fila['ID_Sede']."</th>
		<td>".utf8_encode($fila['nombre'])."</td>
		<td>".$fila['CantidadModulos']."/6</td>
		<td>".$fila['TotalTalleres']."</td>	
		</tr>";

	}
}
?>