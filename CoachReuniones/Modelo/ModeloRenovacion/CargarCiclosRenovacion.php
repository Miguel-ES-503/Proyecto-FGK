<?php


	// Consulta De La BASE DE DATOS

  setlocale(LC_TIME, 'es_SV.UTF-8');



$consulta=$pdo->prepare(" SELECT * FROM ciclos ");

$consulta->execute();

if ($consulta->rowCount()>=0)
{
	while ($fila=$consulta->fetch())
	{				
		 echo "<option  value='".$fila['ID_Ciclo']."' class='dropdown-item' >".$fila['ID_Ciclo']."</option>";
	}
}
