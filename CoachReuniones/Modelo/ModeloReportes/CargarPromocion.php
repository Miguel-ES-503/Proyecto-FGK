<?php
	// Consulta De La BASE DE DATOS
  setlocale(LC_TIME, 'es_SV.UTF-8');

  //consulta para seleccionar promoción
$consulta=$pdo->prepare("SELECT DISTINCT  Class FROM alumnos ORDER BY  Class ASC");
$consulta->execute();

if ($consulta->rowCount()>=0)
{

	while ($fila=$consulta->fetch())
	{				
		 echo "<option  value='".$fila['Class']."' class='dropdown-item' >".$fila['Class']."</option>";		
	}
}

?>