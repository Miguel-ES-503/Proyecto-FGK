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
	$consulta=$pdo->prepare("SELECT one_on_one.titulo , one_on_one.estado , one_on_one.ID_Sede , one_on_one.estado_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id, alumnos.Nombre, alumnos.correo, empresas.Nombre AS universidad  FROM one_on_one INNER JOIN alumnos  ON one_on_one.id_alumno = alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE one_on_one.estado = 'Pendiente' ");
	
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
		<th>".$fila['correo']."</th>
		<td>".utf8_encode($fila['universidad'])."</td>
		<td>".$fila['ID_Sede']."</td>
		<td>".$fila['estado_alumno']."</td>	
        <th>".$fila['estado']."</th>
        <th>". utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($fila['fecha'])))."</th>
		<th>".$fila['hora_inicio']." - ".$fila['hora_fin']."</th>
		<th><form method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='eliminarsession' value='"."$fila[id]'"."title='Eliminar' ><i class='fas fa-trash-alt'></i></button></form>".
		"<form  method='post'>
		<button type='submit' class='btn btn-primary ' title='Finalizar' name='Finalizars'  value='"."$fila[id]'"."><i class='fas fa-check-circle'></i></button>
		</form></th>
		</tr>";
		
	}
}


@$estado = $_POST['Finalizars'];
if (isset($estado)) {
		$sqlactualizar = "UPDATE one_on_one SET estado = ? WHERE id = ?";
		$stmt= $dbh->prepare($sqlactualizar);
		$stmt->execute(['Finalizado', $estado]);
		echo '<script language="javascript">alert("Sesión Finalizada con Exito!!! (Por favor recargar la página para observar los cambios) ");</script>';
		header("Location:sessionesOneonOne.php");
	}else{
				 header("Location:sessionesOneonOne.php");
				
	}


	// delete preguntas
@$pregunta = $_POST['eliminarsession'];
$sql = "DELETE FROM one_on_one WHERE id = $pregunta";
if ($dbh->query($sql) == TRUE) {
	echo '<script language="javascript">alert("Sesión Eliminada con Exito!!! (Por favor recargar la página para observar los cambios) ");</script>';
	header("Location:sessionesOneonOne.php");

} else {
  header("Location:sessionesOneonOne.php");
}
?>