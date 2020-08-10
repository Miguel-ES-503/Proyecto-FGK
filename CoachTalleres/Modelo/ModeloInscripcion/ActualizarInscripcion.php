<?php 


require_once "../../../BaseDatos/conexion.php"; 
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Inscripcion'])) 
{
	$IDInscripcion = $_POST['idInscripcion'];
	$SEDE = $_POST['Lugar'];
	$Fecha = $_POST['Fecha'];
	$Hora = $_POST['Hora'];
	$Estado = $_POST['estado'];


		$InicialDep = $varLugar [0]; // Extraemos la primera letra
		$FinalDep = $varLugar [1]; // Extraemos la segunda letra

		//Concatenamos
		$FullTime = "FT";


		$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT


	$consulta=$pdo->prepare("UPDATE inscripcion SET ID_Sede=:ID_Sede , Fecha =:Fecha , Hora = :Hora , estado = :estado   WHERE IDinscripcion=:IDinscripcion");
	$consulta->bindParam(':ID_Sede',$LugarFT);
	$consulta->bindParam(':Fecha',$Fecha);
	$consulta->bindParam(':Hora',$Hora);
	$consulta->bindParam(':estado',$Estado);
	$consulta->bindParam(':IDinscripcion',$IDInscripcion);


	if (!$consulta->execute()) 
	{
		$_SESSION['message'] = 'Fallo al Actualizar Inscripción';
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-ProcesoInscripcion.php");
	}
	else
	{			 	
		$_SESSION['message'] = 'Inscripción actualizado con exito';
		$_SESSION['message2'] = 'success';
		header("Location: ../../SIT-ProcesoInscripcion.php");
	}


}
else 
{
	echo "datos no entrando";
}






 ?>