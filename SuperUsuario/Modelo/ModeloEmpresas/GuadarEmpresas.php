<?php
require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

if (isset($_POST['Guardar_Datos'])) 
{
		// Declaración de variable
	
	$NombreEmpresa= utf8_decode($_POST['NombreEmpresa']);
	$Opciones = utf8_decode($_POST['opciones']);


	$consulta4=$pdo->prepare("SELECT Nombre FROM empresas WHERE Nombre = :Nombre");
	$consulta4->bindParam(":Nombre",$NombreEmpresa);
	$consulta4->execute();

	 $SiglaEmpresa;
	 $IdentNombre;


	if ($consulta4->rowCount() >=1) 
	{
		$fila4=$consulta4->fetch();
        $IdentNombre = $fila4['Nombre'];
	}

	

	
	if($IdentNombre == $NombreEmpresa )
	{
		$_SESSION['message'] = 'La empresa '.$NombreEmpresa . ' Ya existe' ;
		$_SESSION['message2'] = 'danger';
		header("Location: ../../SIT-CrearEmpresas.php");;
	}else
	{ 
			$string = $NombreEmpresa;

		function initials($str) 
		{ 
			$ret = '';

		    foreach (explode(' ', $str) as $word) 
		    $ret .= strtoupper($word[0]);
		     return $ret; 

		} 

    $SiglaEmpresa  = initials($string); // would output "PIVS"

		$consulta3=$pdo->prepare("INSERT INTO empresas(ID_Empresa,Nombre,Tipo) VALUES(:ID_Empresa,:Nombre,:Tipo)");
		$consulta3->bindParam(':ID_Empresa',$SiglaEmpresa);
		$consulta3->bindParam(':Nombre',$NombreEmpresa);
		$consulta3->bindParam(':Tipo',$Opciones);

		if (!$consulta3->execute()) 
		{
			$_SESSION['message'] = 'Fallo al Guardar Empresa';
			$_SESSION['message2'] = 'danger';
			header("Location: ../../SIT-CrearEmpresas.php");
		}
		else
		{			 	
			$_SESSION['message'] = 'Empresa Creada';
			$_SESSION['message2'] = 'success';
			header("Location: ../../SIT-CrearEmpresas.php");
		}

		
	}

}
else
{
	$_SESSION['message'] = 'Datos No ingresados Form GuadarEmpresas.php';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearEmpresas.php");
}

?>


	