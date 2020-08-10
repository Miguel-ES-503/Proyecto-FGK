<?php

require_once "../../../BaseDatos/conexion.php";
session_start();  
$varsesion = $_SESSION['Email'];
$varLugar = $_SESSION['Lugar'];

error_reporting(0);
if ($varsesion == null || $varsesion = "") {
	header("Location: ../login.php");
	die();
}

if ($_POST['TitutloTaller'] == '' )
{
	$_SESSION['message'] = 'No has ingresado ningun datos';
	$_SESSION['message2'] = 'danger';
	header("Location: ../../SIT-CrearTaller.php");
}
else if(isset($_POST['TitutloTaller']))
{
	if (isset($_POST['Guardar_Taller'])) 
	{
		//Declaración de variables
		$NombreTaller = $_POST['TitutloTaller'];
		$Fecha = $_POST['Fecha'];
		$Horario = $_POST['Horario'];
		$TipoTaller = $_POST['TipoTaller'];
		
		$ciclo =$_POST['ciclo'];
		$Empresa = $_POST['empresa'];
		$Cupo = $_POST['Cantidad'];
		$Estado = "Activo";
		$Valor = 0;

		
		$ciclo1 =  $ciclo [0]; // Extraemos la primera letra
		$ciclo2 =  $ciclo [1]; // Extraemos la primera letra
    	$dia1 =   $Fecha[8]; 
    	$dia2 =   $Fecha[9];
    	$Mes1  =  $Fecha[5];
    	$Mes2  =  $Fecha[6];  
    	$año = date("y");
    	
    	
		$string = $NombreTaller;

		function initials($str) 
		{ 
			$ret = '';

		    foreach (explode(' ', $str) as $word) 
		    $ret .= strtoupper($word[0]);
		     return $ret; 

		} 

    	$SiglaTaller  = initials($string); // would output "PIVS"




    	$Fecha2 =$año.$dia1.$dia2.$Mes1.$Mes2;

    	$IDTaller =$ciclo1.$ciclo2.$Fecha2.$SiglaTaller;


    	$InicialDep = $varLugar [0]; // Extraemos la primera letra
		$FinalDep = $varLugar [1]; // Extraemos la segunda letra

		//Concatenamos
		$FullTime = "FT";


		$LugarFT=$InicialDep . $FinalDep . $FullTime; //Ejemplo SSFT

    	$consulta1=$pdo->prepare("INSERT INTO talleres(ID_Taller,Titulo,Fecha,Hora,ID_Formato,ID_Sede,ID_Ciclo,ID_Empresa,Estado,Cupo , Rating ) VALUES(:ID_Taller,:Titulo,:Fecha,:Hora,:ID_Formato,:ID_Sede,:ID_Ciclo,:ID_Empresa,:Estado,:Cupo,:Rating)");

    	$consulta1->bindParam(':ID_Taller',$IDTaller);
    	$consulta1->bindParam(':Titulo',$NombreTaller);
    	$consulta1->bindParam(':Fecha',$Fecha);
    	$consulta1->bindParam(':Hora',$Horario);
    	$consulta1->bindParam(':ID_Formato',$TipoTaller);
    	$consulta1->bindParam(':ID_Sede',$LugarFT);
    	$consulta1->bindParam(':ID_Ciclo',$ciclo);
    	$consulta1->bindParam(':ID_Empresa',$Empresa);
    	$consulta1->bindParam(':Estado',$Estado);
    	$consulta1->bindParam(':Cupo',$Cupo);
    	$consulta1->bindParam(':Rating',$Valor);

    	if (!$consulta1->execute()) 
    	{
    		$_SESSION['message'] = 'Fallo al Guardar Taller';
    		$_SESSION['message2'] = 'danger';

    		header("Location: ../../SIT-CrearTaller.php");
    	}
    	else
    	{

    		$_SESSION['message'] = 'Taller Creado con exito';
    		$_SESSION['message2'] = 'success';
    		
    		header("Location: ../../SIT-CrearTaller.php");
	     }// else que todo fue lo correcto


	 }
	 else
	 {
	 	$_SESSION['message'] = 'Datos No ingresados Form GuardarCuenta.php';
	 	$_SESSION['message2'] = 'danger';
	 	header("Location: ../../SIT-CrearTaller.php");
	 }
	}

	?>