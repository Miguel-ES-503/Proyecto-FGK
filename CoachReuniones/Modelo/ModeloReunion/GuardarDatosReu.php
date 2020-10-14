<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];


$InicialDep = $varLugar [0]; // Extraemos la primera letra
$FinalDep = $varLugar [1]; // Extraemos la segunda letra


//Concatenamos
$FullTime = "FT";
$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT



error_reporting(0);
if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}

if($_POST['NombreReunion'] == '')
{

	$_SESSION['message'] = 'No has ingresado ningun datos';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearReunion.php");
}
else if (isset($_POST['NombreReunion']))
{
	if (isset($_POST['Guardar_Reunion'])) 
	{

		$NombreReunion = $_POST['NombreReunion'];
		$FechaReunion = $_POST['fecha'];
		$LugarReunion = $_POST['idempresa'];
		$encargado = $_POST['encargado'];
		$Ciclo = $_POST['idCICLO'];
		$Tipo = $_POST['tipo'];
		$Place = $_POST['Lugar'];

		$ciclo1 =  $Ciclo [0]; // Extraemos la primera letra
		$ciclo2 =  $Ciclo [1]; // Extraemos la primera letra
		

		$string = $NombreReunion;

		function initials($str) 
		{ 
			$ret = '';

		    foreach (explode(' ', $str) as $word) 
		    $ret .= strtoupper($word[0]);
		     return $ret; 

		} 
    	$SiglaReunion  = initials($string); // would output "PIVS"  
    	
        $dia1 =   $FechaReunion[8]; 
    	$dia2 =   $FechaReunion[9];
    	$Mes1  =  $FechaReunion[5];
    	$Mes2  =  $FechaReunion[6];  
    	$año = date("y");
    	$sigla1 = $LugarReunion[0];
    	$sigla2 = $LugarReunion[1];
    	$sigla3 = $LugarReunion[2];

    	$Fecha = $año.$dia1.$dia2.$Mes1.$Mes2;
    	$siglaCompleta = $sigla1.$sigla2.$sigla3; 
    	$IDReunion = $Fecha.rand(1000,9999);
	


		
      
        	$consulta=$pdo->prepare("INSERT INTO reuniones (ID_Reunion,Titulo,Fecha,ID_Ciclo,Estado,Tipo,ID_Sede,Lugar,encargado) VALUES(:ID_Reunion,:Titulo,:Fecha,:IDcilo,'Activo',:Tipo,:ID_Sede,:Lugar,:encargado)");
        	$consulta->bindParam(':ID_Reunion',$IDReunion);
        	$consulta->bindParam(':Titulo',$NombreReunion);
        	$consulta->bindParam(':Fecha',$FechaReunion);
        	$consulta->bindParam(':IDcilo',$Ciclo);
        	$consulta->bindParam(':Tipo',$Tipo);
			$consulta->bindParam(':ID_Sede',$LugarFT);
			$consulta->bindParam(':Lugar',$Place);
			$consulta->bindParam(':encargado',$encargado);
			

        	if (!$consulta->execute()) 
        	{
				
        		$_SESSION['message'] = 'Ya existe el ID Intente con otro Nombre';
        		$_SESSION['message2'] = 'danger';
        		header("Location: ../../SIT-CrearReunion.php");
        	}
        	else
        	{			 	
        		$_SESSION['message'] = 'Reunión Creada con exitos';
        		$_SESSION['message2'] = 'success';
        		header("Location: ../../SIT-CrearReunion.php");
        	}     			  	
	}else
	{
		
		$_SESSION['message'] = 'Datos No ingresados Form GuardarDatosReu.php';
	 	$_SESSION['message2'] = 'danger';
	 	header("Location: ../../SIT-CrearReunion.php");

	}
	
}



?>