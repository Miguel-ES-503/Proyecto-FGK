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
$consulta=$pdo->prepare("	SELECT C.Nombre as 'Nombre',C.IDComptenecia as 'IdC', COUNT(T.ID_Taller) as  'Total'
										FROM tallercompetencia T
										INNER JOIN competencias C
										ON T.IDComptenecia = C.IDComptenecia
										INNER JOIN talleres A
										ON T.ID_Taller = A.ID_Taller
										WHERE Date_Format(A.Fecha,'%M') = ? AND Date_Format(A.Fecha,'%Y') = ?
										GROUP BY (C.Nombre) ASC LIMIT 5
	");



 setlocale(LC_TIME, 'es_SV.UTF-8');
$consulta->execute(array($_POST['Meses'],$_POST['Year']));

if ($consulta->rowCount()>=0)
{
	while ($fila=$consulta->fetch())
		{	
		
			
			echo "
			<tr class='table-light'>
			<td>".utf8_encode($fila['Nombre'])."</td> 
			<td>".$fila['Total']."</td> 
			<td> <a href='TalleresCompetenciasTop.php?id=".$fila['IdC']."&id2=".$FMeses."&id3=".$FYear."' data-toggle='popover' data-trigger='hover' data-content='Lista de talleres.' data-placement='right' > <button  class='fa fa-list  btn btn-info'    type='button'  >
				</button> </a></td></tr>
			"; 
			/*if ($fila['Rating'] == 0) {
				echo "<td>0.00</td>";
			}
			else{
				echo "<td>".$fila['Rating']."</td>";
			}
			if ($fila['Total'] == 0 ) {
				echo "<td> <a data-toggle='popover' data-trigger='hover' data-content='No hay información que mostrar.' data-placement='right' > <button  class='fas fa-comments  btn btn-secondary'    type='button'  >
				</button> </a></td></tr>";
			}else{
				echo "<td> <a href='Comentarios.php?id=".$fila['ID_Taller']."&id2=".$fila['Titulo']."&id3=".$fila['Fecha']."&id4=".$fila['Sede']."&id5=".$fila['Rating']."&id6=".$fila['Total']."' data-toggle='popover' data-placement='right'  data-trigger='hover' data-content='Graficos.'  > <button  class='fas fa-comments  btn btn-info'    type='button'  >
				</button> </a></td></tr>";
				}*/
				

	
}
}
?>