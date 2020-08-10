
<?php
require_once "../../../BaseDatos/conexion.php";


//-------------------------------------------------------------------------------------------
//Consulta 2: GUARDAR DATOS DE HORARIO Y RUTAS
//-------------------------------------------------------------------------------------------

//Guardar datos horario y rutas
if(isset($_POST['Ingresar_DatosT']))
{	
/*-----------------------
DECLARACION VARIABLES 
-----------------------*/
//$idHorarioTrans=$_POST['idHorario'];
$idSoliT=$_POST['idSoliT'];
//variables horario
$dia=$_POST['dia'];
$horainicio=$_POST['horainicio'];
$horafinal=$_POST['horafinal'];
//variables costos
$tipo=$_POST['tipo'];
$nombreruta=$_POST['nombreruta'];
$costo=$_POST['costo'];


 //Consulta para insertar horario

    $sqlHorario=$pdo->prepare("INSERT INTO `horariotransporte` (`idSoliTrans`, `dia`, `horaEntrada`, `horaSalida`) VALUES (:idSoliTrans, :dia, :horaEntrada,:horaSalida)");


		$sqlHorario->bindParam(':idSoliTrans',$idSoliT);
		$sqlHorario->bindParam(':dia',$dia);
		$sqlHorario->bindParam(':horaEntrada',$horainicio);
		$sqlHorario->bindParam(':horaSalida',$horafinal);


//Consulta para insertar rutas de buses

 	$sqlRuta=$pdo->prepare("INSERT INTO rutasbuses(idSoliTrans,nombreruta,costo,tipo) VALUES(:idSoliTrans,:nombreruta,:costo,:tipo)");

 	$sqlRuta->bindParam(':idSoliTrans',$idSoliT);
	$sqlRuta->bindParam(':nombreruta',$nombreruta);
	$sqlRuta->bindParam(':costo',$costo);
	$sqlRuta->bindParam(':tipo',$tipo);




//seleccionar id horario
	 /*$consulta1=$pdo->prepare("SELECT H.idSoliTrans, H.idHorarioTrans FROM horariotransporte H  WHERE  idSoliTrans=?");
	  $consulta1->execute(array( $idSoliT));


	//Seleccionar ID Ruta
	$consulta2=$pdo->prepare("SELECT  B.idRuta, B.idSoliTrans FROM rutasbuses B  WHERE  idSoliTrans=?");
	$consulta2->execute(array( $idSoliT));*/

	//Consulta para insertar rutas_horario
 /*$sql3=$pdo->prepare("INSERT INTO ruta_horario(idHorarioTrans,idRuta) VALUES(:idHorarioTrans,:idRuta)");

	$sql3->bindParam(':idHorarioTrans',$consulta1);
	$sql3->bindParam(':idRuta',$consulta2);*/
	

 



	if ($sqlHorario->execute() && $sqlRuta->execute()) 
	   {
	   		header("Location: ../../SoliTransporte.php?id=".$idSoliT);
	   		//echo "No se puedo guardar el dato";
	   		echo "Funciona";

	   		
	    }
		else
		{			 	
		header("Location: ../../SoliTransporte.php?id=".$idSoliT);

		echo " No Funciona";
		}






}







?>