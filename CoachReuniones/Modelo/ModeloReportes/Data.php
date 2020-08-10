<?php
require_once "../../../BaseDatos/conexion.php";


$query = "SELECT Titulo, Id_reunion  as Total , e.Nombre as Empresa
from reuniones r
INNER JOIN empresas e 
ON r.ID_Empresa = e.ID_Empresa
WHERE Titulo = 'Reunion 3'";
$consulta =$pdo->prepare($query) ;
$array = array();
$consulta->execute();

while($fila = $consulta->fetch()){
    $name = $fila['Nombre'];
    $unidades_vendidas = $fila['Total'];
    $empresa = $fila['Empresa'];
    //$unidades_vendidas = $row['unidades_vendidas'];
    $array['cols'][] = array('type' => 'string'); 
   // $array['cols'][] = array('type' => 'number'); 
    $array['rows'][] = array('c' => array( array('v'=> $name), array('v'=>(int)$unidades_vendidas), array('v'=>$empresa)) );
}

$Data =  json_encode($array); // retorna los datos como JSON
    echo $Data;
//, array('v'=>(int)$unidades_vendidas)
//echo "salio algo mal";
//if($consulta) { // prepara la sentencia

   /* $lugarR = $_GET["lugar"];
    $cicloR = $_GET["ciclo"];
    $consulta->bindParam("pl", $lugarR); // bindea los datos
    $consulta->bindParam("ci", $cicloR);*/

   // $consulta->execute(); // ejecuta la sentencia
    //$result = $consulta->fetch(); // obtiene los resultados
    //$connection->close();
    
//}
?>