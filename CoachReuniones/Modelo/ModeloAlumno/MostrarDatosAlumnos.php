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
		
		<th style='width:13.4%'>".$fila['ID_Alumno']."</th>
		<th style='width:22.1%'>".$fila['Nombre']."</th>
		<th style='width:7.3%'>".$fila['Class']."</th>
		<th style='width:7.9%'>".$fila['ID_Sede']."</th>
		<th style='width:11.9%'>".$Asistencia."</th>
		<th style='width:21.2%'>".$fila['StatusActual']."</th>
		<th>".$fila['Estado']."</th>
		<td><a href='AlumnoInicio.php?id=".$fila['correo']."' class='fas fa-user  btn btn-warning'></a> </td>
		<td><a href='ModificarBeca.php?id=".$fila['correo']."' class='fas fa-user  btn btn-warning'></a> </td>
		
		</tr>";

	}
}







?>