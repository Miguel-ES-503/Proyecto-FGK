<?php
require_once '../Conexion/conexion.php';
$column = array('titulo', 'Nombre','ID_Sede','estado_alumno', 'estado', 'id', 'hora_inicio','id' );
$searchValue = $_POST['search']['value']; // Search value
$query = " SELECT one_on_one.titulo , one_on_one.estado , one_on_one.ID_Sede , one_on_one.estado_alumno , one_on_one.fecha , one_on_one.hora_inicio , one_on_one.hora_fin , one_on_one.id, alumnos.Nombre, alumnos.correo, empresas.Nombre AS universidad  FROM one_on_one INNER JOIN alumnos  ON one_on_one.id_alumno = alumnos.ID_Alumno LEFT JOIN empresas ON empresas.ID_Empresa = alumnos.ID_Empresa WHERE one_on_one.estado = 'Pendiente' and (titulo LIKE '%$searchValue%' or one_on_one.ID_Sede LIKE '%$searchValue%' or alumnos.Nombre LIKE '%$searchValue%' or one_on_one.estado LIKE '%$searchValue%' or one_on_one.fecha LIKE '%$searchValue%')";

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
 $sub_array[] = ($row['Nombre']);
 $sub_array[] = ($row['correo']);
 $sub_array[] = ($row['universidad']);
 $sub_array[] = utf8_encode($row['ID_Sede']);
 $sub_array[] = utf8_encode($row['estado_alumno']);
 $sub_array[] = utf8_encode($row['estado']);
 $sub_array[] = utf8_encode(strftime("%A %d "." de"." %B del %Y ",strtotime($row['fecha'])));
 $sub_array[] = $row['hora_inicio']." - ".$row['hora_fin'];

 $sub_array[] = "<form action='eliminarsession.php' method='post'><button type='submit' class='btn btn-danger btn-borrar'"." name='eliminarsession' value='"."$row[id]'"."title='Eliminar' ><i class='fas fa-trash-alt'></i></button></form>".
 "<form action='Finalizarsession.php' method='post'><button type='submit' class='btn btn-primary '"." title='Finalizar' name='Finalizars' value='"."$row[id]'"."><i class='fas fa-check-circle'></i></button></form>";
 $data[] = $sub_array;
}
function count_all_data($dbh)
{
 $query = "SELECT * FROM one_on_one";
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


  