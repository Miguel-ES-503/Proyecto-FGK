<?php


	// Consulta De La BASE DE DATOS

  setlocale(LC_TIME, 'es_SV.UTF-8');



$consulta=$pdo->prepare(" 
	SELECT * FROM sedes
	");

$consulta->execute();

if ($consulta->rowCount()>=0)
{

	while ($fila=$consulta->fetch())
	{		
		
		 

		 echo "<option  value='".$fila['ID_Sede']."' class='dropdown-item' >".$fila['Nombre']."</option>";
		

	}
}

?>