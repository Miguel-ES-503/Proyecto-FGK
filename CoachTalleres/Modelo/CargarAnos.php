<?php


	// Consulta De La BASE DE DATOS

  setlocale(LC_TIME, 'es_SV.UTF-8');



$consulta=$pdo->prepare(" 
	SELECT Distinct(Date_Format(Fecha,'%Y')) as 'Year' FROM talleres
	");

$consulta->execute();

if ($consulta->rowCount()>=0)
{

	while ($fila=$consulta->fetch())
	{		
		
		 

		 echo "<option  value='".$fila['Year']."' class='dropdown-item' >".$fila['Year']."</option>";
		

	}
}

?>