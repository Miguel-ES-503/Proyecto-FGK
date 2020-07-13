<?php 

require_once "../../../BaseDatos/conexion.php";
session_start();

if (isset($_POST['Guardar_Datos'])) {
	
	$ID = $_POST['id'];
	$IDComptencia = $_POST['siglacomptencia'];
	$NombreCompetencia = $_POST['comptencia'];

	//Prepara la  consulta para insertar un dato
	$consulta=$pdo->prepare("UPDATE competencias SET IDComptenecia =:IDComptenecia , Nombre =:Nombre  WHERE IDComptenecia = :id");
	$consulta->bindParam(':IDComptenecia',$IDComptencia);
	$consulta->bindParam(':Nombre',$NombreCompetencia);
	$consulta->bindParam(':id',$ID);

		//Verifica si ha insertado los datos
	if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Competencia Actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-Competencias.php"); 
	}
	else
	{
		$_SESSION['message'] = 'Sigla ya existe '.$ID;
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-Competencias.php"); 
	}


}
else
{
	echo "Datos perdido";
}




 ?>