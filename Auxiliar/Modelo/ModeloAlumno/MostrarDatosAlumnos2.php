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
	$consulta=$pdo->prepare("SELECT * FROM alumnos LEFT JOIN carrera ON alumnos.ID_Carrera = carrera.Id_Carrera ");
	
	$consulta->execute();

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
		<tr class='table table-light w-100 '>
		
		<td style='width:22%' >".$fila['Nombre']."</td>
		<td style='width:5.8%'>".$fila['Sexo']."</td>
		<td style='width:10.5%'>".$fila['Class']."/".$fila['ID_Sede']."</td>
		<td style='width:28.3%'>".utf8_encode($fila['nombre'])."</td>
		<td style='width:5.8%'>".$fila['CantidadModulos']."/6</td>
		<td style='width:6%'>".$fila['TotalTalleres']."</td>	
		<td>".$fila['EstadoCerti']."</td>
		<td><form action='cambiardatos.php' method='post'><button type='submit' name='id' value='".$fila['ID_Alumno']."' class='btn btn-warning' ><i class='far fa-edit'></i> Actualizar</button></form></td>
		</tr>";

	}
}
?>

