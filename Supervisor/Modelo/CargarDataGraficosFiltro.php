<?php


	// Consulta De La BASE DE DATOS

  setlocale(LC_TIME, 'es_SV.UTF-8');



$consulta=$pdo->prepare(" 
	SELECT  T.ID_Taller ,Titulo , Date_Format(Fecha,'%M')  as 'Mes' ,Date_Format(Fecha,'%Y') as 'Ano' , F.Nombre AS 'Tipo' ,S.Nombre as 'Sede', E.Nombre AS 'Empresa'
	FROM talleres T 
	INNER JOIN formatotalleres F
	on T.ID_Formato = F.ID_Formato 
	INNER JOIN sedes S
	on T.ID_Sede = S.ID_Sede
	LEFT JOIN empresas E 
	on T.ID_Empresa = E.ID_Empresa
	WHERE Date_Format(Fecha,'%M') = ? AND S.Nombre = ?
	");

$consulta->execute(array($FMeses,$FSedes));

if ($consulta->rowCount()>=0)
{

	while ($fila=$consulta->fetch())
	{		
		
		 $Em = strftime(" %B ",strtotime($fila['Mes']));
		echo "
		<tr class='table-light'>
		<td>".$fila['Titulo']."</td> 
		<td>".$fila['Ano']."</td> 
		<td>".$Em."</td> 
		<td>".$fila['Tipo']."</td> 
		<td>".$fila['Sede']."</td>
		<td>".$fila['Empresa']."</td>
		<td> <a> <button  class='fas fa-comments  btn btn-info'    type='button'  >
		</button> </a></td></tr>";



	}
}

?>