<?php
require_once "../../../BaseDatos/conexion.php";




//Guardar solicitud
if(isset($_POST['Inscribir_Materia']))
{ 
  
  //variables de campos soli transporte
	$idMateria=$_POST['materia'];
	$Matricula=$_POST['matricula'];
//	$CicloU=$_POST['ciclo'];
    $idExpedienteU=$_POST['expedienteu'];
    $Id_InscripcionC=$_POST['idInscripcionCiclo'];

    //creacion de codigo aleatorio para solicitud
		$MI="MI";
		$n1="-";
		$n2=mt_rand(1,9);
		$n3=mt_rand(1,9);
		$n4=mt_rand(1,9);
		$n5=mt_rand(1,9);
		$n6=mt_rand(1,9);

 		//Generamos el id con el año y 4 numeros random
 		$InscripcionMateria= $MI."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
  		$comp=1;

$existe;

 while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$pdo->prepare("SELECT COUNT(`idExpedienteU`) AS existe FROM `materias` WHERE `idExpedienteU`='".$InscripcionMateria."'");
        $query->execute();
        $existe;
        if ($query->rowCount() >0)
        {
          $r=$query->fetch();
          $existe = $r['existe'];
        }
        //Comprobamos que no exista
        if ($existe>=1) {
         $n1="-";
          $n2=mt_rand(1,9);
          $n3=mt_rand(1,9);
          $n4=mt_rand(1,9);
          $n5=mt_rand(1,9);
		  $n6=mt_rand(1,9);
          // Si existe generamos otro id con el año y 4 numeros random
         $InscripcionMateria= $MI."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
        }else {
          $comp=2;
        }
    }

    	//consulta para poner estado inscrito
     $consulta2=$pdo->prepare("UPDATE `materias` SET `estadoM`= 'Inscrita' WHERE idExpedienteU = :idExpedienteU and idMateria = :idMateria");
    
     $consulta2->bindParam(':idMateria',$idMateria);
     $consulta2->bindParam(':idExpedienteU',$idExpedienteU);


      //consulta para insertar solicitud de transporte 
    $consulta=$pdo->prepare("INSERT INTO `inscripcionmateria`(`Id_InscripcionM`, `idMateria`, `Id_InscripcionC`, `nota`, `matricula`, `estado`) VALUES(:Id_InscripcionM,:idMateria,:Id_InscripcionC,0,:matricula,'Inscrita')");

    $consulta->bindParam(':Id_InscripcionM',$InscripcionMateria);
    $consulta->bindParam(':idMateria',$idMateria);
    $consulta->bindParam(':Id_InscripcionC',$Id_InscripcionC);
    $consulta->bindParam(':matricula',$Matricula);


    /*$consulta3=$pdo->prepare("UPDATE `inscripcionciclos` SET `cicloU`= :cicloU  WHERE `Id_InscripcionC` = :Id_InscripcionC ");
    $consulta3->bindParam(':cicloU',$CicloU);
    $consulta3->bindParam(':Id_InscripcionC',$Id_InscripcionC);*/


 
if ($consulta->execute() && $consulta2->execute()) 
	   {
	   	
       	header("Location: ../../InscripcionMateriasCiclo.php?id=".$Id_InscripcionC);
       echo "Funciona";
	   		
	   		
	    }
		else
		{			 	
		header("Location: ../../InscripcionMateriasCiclo.php?id=".$Id_InscripcionC);

		echo " No Funciona";
		}







}
else
{
  echo "DATOS NO RECIBIDO";
}






?>