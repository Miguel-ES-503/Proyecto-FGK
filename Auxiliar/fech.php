<?php
require_once '../Conexion/conexion.php';
$column = array('pregunta', 'fechaPregunta','respuesta','fechaRespuesta', 'estado', 'id');
$searchValue = $_POST['search']['value']; // Search value
$query = " SELECT * FROM preguntas WHERE pregunta LIKE '%$searchValue%' or respuesta LIKE '%$searchValue%' ";

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].'  ';
}
else
{
 $query .= ' ORDER BY id ASC ';
}
$query1 = '';
setlocale(LC_TIME, 'spanish');

if($_POST["length"] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $dbh->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $dbh->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row['pregunta'];
 $sub_array[] = $row['respuesta'];
 $sub_array[] = utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fechaRespuesta']))).date('h:i A', strtotime($row['fechaRespuesta']));
 $sub_array[] = "<form action='eliminarpregunta.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='eliminar' value='"."$row[id]'"."><i class='fas fa-trash-alt'></i></button></form>
 ";
 $data[] = $sub_array;
}
function count_all_data($dbh)
{
 $query = "SELECT * FROM oneoneone";
 $statement = $dbh->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}
$output = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($dbh),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);
echo json_encode($output);
?>


  