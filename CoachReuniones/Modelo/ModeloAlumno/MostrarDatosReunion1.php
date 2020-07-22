<?php

session_start();  


//$Lugar2="SSSAT";
//<td><input type='checkbox' name='ActuaAlumno[]' class='case' value=".$fila['ID_Alumno']."></td>

	// Consulta De La BASE DE DATOS
	$consulta=$pdo->prepare("SELECT one_on_one.titulo , one_on_one.estado , one_on_one.ID_Sede , one_on_one.estado_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id, alumnos.Nombre, alumnos.correo, empresas.Nombre AS universidad  FROM one_on_one INNER JOIN alumnos  ON one_on_one.id_alumno = alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE one_on_one.estado = 'Pendiente' ");
	
	$consulta->execute($pdo);


				echo "
		<tr class='table-light'>
		
		<th>".$fila['titulo']."</th>
		<th>".$fila['Nombre']."</th>
		<th>".$fila['correo']."</th>
		<td>".$fila['universidad']."</td>
		<td>".$fila['ID_Sede']."</td>
		<td>".$fila['estado_alumno']."</td>	
		<th>".$fila['estado']."</th>
		<th>".$fila['fecha']."</th>
		<th>".$fila['hora_inicio']." - ".$fila['hora_fin']."</th>
		<th><form action='eliminarsession.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='eliminarsession' value='"."$row[id]'"."title='Eliminar' ><i class='fas fa-trash-alt'></i></button></form>".
		"<form action='Finalizarsession.php' method='post'><button type='submit' class='btn btn-primary '"." title='Finalizar' name='Finalizars' value='"."$row[id]'"."><i class='fas fa-check-circle'></i></button></form></th>
		</tr>";
		
	}
}
?>