<?php
	// Consulta De La BASE DE DATOS
  setlocale(LC_TIME, 'es_SV.UTF-8');

$consulta=$pdo->prepare(" 
SELECT DISTINCT(Titulo) as Name FROM `reuniones` WHERE Date_Format(Fecha,'%Y') = '2020' ORDER By Name asc
	");

$consulta->execute();

if ($consulta->rowCount()>=0)
{
	
	while ($fila=$consulta->fetch())
	{				
		 echo "<option  value='".$fila['Name']."' class='dropdown-item' >".$fila['Name']."</option>";		
	}
}

?>