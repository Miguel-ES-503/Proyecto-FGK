<?php 

require_once "../../../BaseDatos/conexion.php"; 
session_start();

if (isset($_POST['CambiarEstado'])) {
	
  $id = $_POST['idreu'];

  $consulta=$pdo->prepare("UPDATE reuniones SET  Estado = 'Finalizado'  WHERE ID_Reunion = :id");
  $consulta->bindParam(":id",$id);

  if ($consulta->execute()) 
	{
				//Si todo fue correcto muestra el resultado con exito;
		$_SESSION['message'] = 'Reunión finalizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../ListaReunion.php?id=".$id);
	}
	else
	{
		$_SESSION['message'] = 'Reunión No Actualizdo';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../ListaReunion.php?id=".$id);
	}



}else
{
	echo "Datos no entrando";
}



 ?>