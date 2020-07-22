<?php

session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];
$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra

//Concatenamosid="example"
$FullTime = "FT";
$Sabatino = "SAT";

$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT
$LugarSAT=$InicialDep . $FinalDep .$Sabatino; //Ejemplo SSSAT

//$Lugar2="SSSAT";
//<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila['ID_Alumno']."></td>

	// Consulta De La BASE DE DATOS
	$consulta=$pdo->prepare("SELECT alumnos.Nombre , one_on_one.titulo , one_on_one.estado , one_on_one.ID_Sede ,  one_on_one.id_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id  FROM one_on_one LEFT JOIN alumnos ON   alumnos.ID_Alumno = one_on_one.id_alumno WHERE one_on_one.estado = 'Finalizado' and one_on_one.estado_alumno = 'Pendiente' ");
	
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
		<th>".utf8_encode($fila['titulo'])."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['ID_Sede']."</th>
		<td>".utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($fila['fecha'])))."</td>
		<th>".$fila['hora_inicio']." - ".$fila['hora_fin']."</th>
		<th><form action='verificarasistencia2.php' method='post'><button type='submit' title='Asistió' class='btn btn-success btn-borrar display-5'"." name='siasistio' value='"."$fila[id]'"."><i class='fas fa-thumbs-up'></i></button></form>"."<form action='verificarasistencia.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='noasistio' title='No Asistió' value='"."$fila[id]'"."><i class='fas fa-thumbs-down'></i></button></form></th>
		</tr>";
		
	}
}
?>