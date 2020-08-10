<?php 

 require_once "../../../BaseDatos/conexion.php";
 session_start();

 if (isset($_POST['EnviarComenterio'])) {
 
 	if (isset($_POST['comentario']) == null) {
 		$_SESSION['message'] = 'No has ingresado el comentario';
 		$_SESSION['message2'] = 'danger';
 		header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
 	}else
 	{
 		$IDTaller = $_POST['idTaller'];
 		$Comentario = $_POST['comentario'];

 		$consulta=$pdo->prepare("INSERT INTO objetivostaller (ID_Taller , Objetivo) VALUES(:ID_Taller , :Objetivo)");
 		$consulta->bindParam(':ID_Taller',$IDTaller);
 		$consulta->bindParam(':Objetivo',$Comentario);
 		
 		if(!$consulta->execute())
 		{
 			$_SESSION['message'] = 'Fallo al Guardar comentario';
 			$_SESSION['message2'] = 'danger';
 			header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
 		}else
 		{
 			$_SESSION['message'] = 'Comentario Creada con exito';
 			$_SESSION['message2'] = 'success';
 			header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));
 		}
 		

 	}





 }
 else
 {
 	$_SESSION['message'] = 'No has ingresado ningun datos';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../Competencia_Objetivo_Taller.php?id=".urlencode($IDTaller));

 }



 ?>