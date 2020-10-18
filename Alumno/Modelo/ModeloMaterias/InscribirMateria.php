<?php
require_once "../../../BaseDatos/conexion.php";

error_reporting(0);


//Guardar solicitud
if(isset($_POST['Inscribir_Materia']))
{ 
  
  //variables de campos soli transporte
$idExpedienteU=$_POST['expedienteu'];
$idMateria=$_POST['Materia'];
$Matricula=$_POST['matricula'];
$IdCiclo=$_POST['Ciclos'];





//creacion de codigo aleatorio para solicitud
$MI="MI";
$n1="-";
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
$n5=mt_rand(1,9);
$n6=mt_rand(1,9);

 //Generamos el id con el año y 4 numeros random
 $materia= $MI."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
  $comp=1;



 while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$pdo->prepare("SELECT COUNT(`idExpedienteU`) AS existe FROM `materias` WHERE `idExpedienteU`='".$materia."'");
        $query->execute();
        $existe;
        if ($query->rowCount() >0)
        {
          $r=$query->fetch();
          
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
          $materia=ST."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
        }else {
          $comp=2;
        }
    }



   $consulta2=$pdo->prepare("UPDATE `materias` SET `estadoM`= 'Inscrita' WHERE idExpedienteU = :idExpedienteU and idMateria = :idMateria");
    
   $consulta2->bindParam(':idMateria',$idMateria);
   $consulta2->bindParam(':idExpedienteU',$idExpedienteU);




      //consulta para insertar solicitud de transporte 
    $consulta=$pdo->prepare("INSERT INTO `inscripcionmateria`(`Id_InscripcionM`, `idMateria`, `Id_InscripcionC`, `nota`, `matricula`, `estado`) VALUES(:Id_InscripcionM,:idMateria,:Id_InscripcionC,0,:matricula,'Inscrita')");

    $consulta->bindParam(':Id_InscripcionM',$materia);
    $consulta->bindParam(':idMateria',$idMateria);
    $consulta->bindParam(':Id_InscripcionC',$IdCiclo);
    $consulta->bindParam(':matricula',$Matricula);


  
  


  if (!$consulta->execute() && !$consulta2->execute()) 
     {
       
        echo "No se puedo guardar el dato";
       header("Location: ../../InscripcionMateriasCiclo.php");
      }
    else
    {       
      
      echo "Funciona";
      header("Location: ../../InscripcionMateriasCiclo.php");
    }






}
else
{
  echo "DATOS NO RECIBIDO";
}






?>