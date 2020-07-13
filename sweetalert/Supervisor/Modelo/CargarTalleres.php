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


	// Consulta De La BASE DE DATOS
$consulta=$pdo->prepare("SELECT  T.ID_Taller ,Titulo , Fecha , F.Nombre AS 'Tipo' ,S.Nombre as Sede, E.Nombre AS Empresa ,(SELECT TRUNCATE(AVG(Rating),2) from evaluaciontalleres WHERE T.ID_Taller = ID_Taller ) as Rating,(SELECT COUNT(ID_Taller) from evaluaciontalleres  where  T.ID_Taller = ID_Taller) as Total
	FROM talleres T 
	INNER JOIN formatotalleres F
	on T.ID_Formato = F.ID_Formato 
    INNER JOIN sedes S
    on T.ID_Sede = S.ID_Sede
	LEFT JOIN empresas E 
	on T.ID_Empresa = E.ID_Empresa
    where  T.Estado = 'Finalizado'
	");

 

 setlocale(LC_TIME, 'es_SV.UTF-8');
$consulta->execute();

if ($consulta->rowCount()>=0)
{
	while ($fila=$consulta->fetch())
		{	
		$Em = strftime("%A, %d de %B de %Y",strtotime($fila['Fecha']));	
			
			echo "
			<tr class='table-light'>
			<td>".$fila['Titulo']."</td>
			<td>".$Em."</td>  
			<td>".$fila['Tipo']."</td> 
			<td>".$fila['Sede']."</td> 
			<td>".$fila['Empresa']."</td>
			<td>".$fila['Rating']."</td> 
			"; if ($fila['Total'] == 0 ) {
				echo "<td> <a data-toggle='popover' data-trigger='hover' data-content='No hay información que mostrar.' data-placement='right' > <button  class='fas fa-comments  btn btn-secondary'    type='button'  >
				</button> </a></td></tr>";
			}else{
				echo "<td> <a href='Comentarios.php?id=".$fila['ID_Taller']."&id2=".$fila['Titulo']."&id3=".$fila['Fecha']."&id4=".$fila['Sede']."&id5=".$fila['Rating']."&id6=".$fila['Total']."' data-toggle='popover' data-placement='right'  data-trigger='hover' data-content='Graficos.'  > <button  class='fas fa-comments  btn btn-info'    type='button'  >
				</button> </a></td></tr>";
				}
				
			
	
}
}
?>