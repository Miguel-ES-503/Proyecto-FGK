<?php
require_once '../Conexion/conexion.php';
$column = array('titulo', 'Nombre','ID_Sede','estado_alumno', 'estado', 'id', 'hora_inicio','id' );
$searchValue = $_POST['search']['value']; // Search value
$query = " SELECT alumnos.Nombre , one_on_one.titulo , one_on_one.estado , one_on_one.ID_Sede ,  one_on_one.id_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id  FROM one_on_one LEFT JOIN alumnos ON   alumnos.ID_Alumno = one_on_one.id_alumno WHERE one_on_one.estado = 'Finalizado' and one_on_one.estado_alumno = 'Pendiente' and (one_on_one.titulo LIKE '%$searchValue%' or one_on_one.ID_Sede LIKE '%$searchValue%' or one_on_one.fecha LIKE '%$searchValue%' or alumnos.Nombre LIKE '%$searchValue%' ) ";
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
 $sub_array[] = utf8_encode($row['titulo']);
 $sub_array[] = $row['Nombre']." "."<b>".utf8_encode($row['ID_Sede'])."</b>";
 $sub_array[] = utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fecha'])));
 $sub_array[] = $row['hora_inicio']." - ".$row['hora_fin'];
 $sub_array[] = "<form action='verificarasistencia2.php' method='post'><button type='submit' title='Asistió' class='btn btn-success btn-borrar display-5'"." name='siasistio' value='"."$row[id]'"."><i class='fas fa-thumbs-up'></i></button></form> "."

 <form action='verificarasistencia.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='noasistio' title='No Asistió' value='"."$row[id]'"."><i class='fas fa-thumbs-down'></i></button></form>";
 $data[] = $sub_array;
}
function count_all_data($dbh)
{
 $query = "SELECT * FROM one_on_one WHERE estado = 'Finalizado' ";
 $statement = $dbh->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}
$output2 = array(
 "draw"       =>  intval($_POST["draw"]),
 "recordsTotal"   =>  count_all_data($dbh),
 "recordsFiltered"  =>  $number_filter_row,
 "data"       =>  $data
);
echo json_encode($output2);
?>


  