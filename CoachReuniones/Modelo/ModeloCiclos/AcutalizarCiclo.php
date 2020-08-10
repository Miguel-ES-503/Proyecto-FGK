<?php  

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


if (isset($_POST['Guardar_Ciclo'])) 
{
  		//Declaración de variables 
		$IDCiclo = $_POST['idciclo'];
		$CicloInicio = $_POST['fechaInicio'];
		$CicloFinal = $_POST['fechaFinal'];
		$id= $_POST['id'];

$consulta=$pdo->prepare("UPDATE ciclos SET ID_Ciclo=:id , Fechanicio =:inicio , FechaFinal =:final  WHERE ID_Ciclo=:parametro");
	

	$consulta->bindParam(":id",$IDCiclo);
	$consulta->bindParam(":inicio",$CicloInicio);
	$consulta->bindParam(":final",$CicloFinal);
	$consulta->bindParam(":parametro",$id);


	//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Ciclo Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-Ciclos.php");
	}
	else
	{
		$_SESSION['message'] = 'Ciclo ya existe ' . $id;
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-Ciclos.php");
	}



}
else 
{
	$_SESSION['message'] = 'Datos No ingresados Form AcutalizarCiclo.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-Ciclos.php");
}

?>