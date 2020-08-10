<?php

require_once "../../../BaseDatos/conexion.php";

$NombreReu = $_POST['id'];
$Ano = $_POST['year'];
$Financiamiento = $_POST['financiamieto'];


 $consulta1=$pdo->prepare("SELECT  A.Nombre 
 FROM reuniones R 
 INNER JOIN inscripcionreunion IR 
 ON R.ID_Reunion = IR.id_reunion  
 LEFT JOIN alumnos A 
 ON IR.id_alumno = A.ID_Alumno
 WHERE R.Titulo = 'Reunion 1' AND A.FuenteFinacimiento = 'FGK' AND R.ID_Empresa ='UFGSS' AND IR.asistencia='Asistio'");//Este es el numero minimo de asistencia que debe tener

$consulta1->execute(array($NombreReu,$Financiamiento,$E));//Asistencia real

$conteo1;

if ($consulta1->rowCount() >=0)//Para verificar que devuelva algo la consulta
{
$i = 1;
while ($fila=$consulta1->fetch())
{       
echo "
<tr>
<th scope='row'>".$i++."</th> 
<td>".$fila['Nombre']."</td></tr>" ;

}
}
?>
