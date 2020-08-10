<?php include("../../../BaseDatos/conexion.php"); //Realizamos la conexión con la base de datos?>



<?php



$query = "SELECT COUNT(ID_Reunion) as total FROM `reuniones` WHERE ID_Empresa=:pl AND ID_Ciclo=:ci ";
$consulta =$pdo->prepare($query) ;
//echo "salio algo mal";
//if($consulta) { // prepara la sentencia
    $lugarR = $_GET["lugar"];
    $cicloR = $_GET["ciclo"];
    $consulta->bindParam("pl", $lugarR); // bindea los datos
    $consulta->bindParam("ci", $cicloR);
    $consulta->execute(); // ejecuta la sentencia
    $result = $consulta->fetch(); // obtiene los resultados
    //$connection->close();
    echo json_encode($result); // retorna los datos como JSON
//}

?>