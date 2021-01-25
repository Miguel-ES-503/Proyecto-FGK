<?php
require_once "../../../BaseDatos/conexion.php";
session_start();



//Guardar solicitud
if(isset($_POST['Guardar_Materia']))
{	
	
	//variables de campos soli transporte
$idExpedienteU=$_POST['expedienteu'];
//$ciclou=$_POST['ciclo'];
$nomMateria=$_POST['nombremateria'];
//$Matricula=$_POST['matricula'];




//creacion de codigo aleatorio para solicitud
$IM="IM";
$n1="-";
$n2=mt_rand(1,9);
$n3=mt_rand(1,9);
$n4=mt_rand(1,9);
$n5=mt_rand(1,9);
$n6=mt_rand(1,9);

 //Generamos el id con el año y 4 numeros random
 $materia= $IM."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
  $comp=1;



  while ($comp==1) {
      //Comprobamos que no exista otro igual
        $query=$pdo->prepare("SELECT COUNT(`idExpedienteU`) AS existe FROM `materias` WHERE `idExpedienteU`='".$materia."'");
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
          $materia=ST."".$n1."".$n2."".$n3."".$n4."".$n5."".$n6;
        }else {
          $comp=2;
        }
    }


    $verificarNombreMateria=$pdo->prepare("SELECT * FROM materias WHERE nombreMateria='$nomMateria' AND idExpedienteU='$idExpedienteU'");
    $verificarNombreMateria->execute();

    $valor= $verificarNombreMateria->rowCount();
    $nombreMateria="";
    while ($row = $verificarNombreMateria->fetch()) {
      $nombreMateria= $row ['nombreMateria'];  

    }

    
    if($nombreMateria == $nomMateria) {
      
            $_SESSION['message'] = 'Error, Registro duplicado';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../pensum.php");
    } else {
     

      //Crea materia
      $consulta=$pdo->prepare("INSERT INTO materias(idMateria,idExpedienteU,nombreMateria,Estado, estadoM) 
        VALUES(:idMateria,:idExpedienteU,:nombreMateria,'Activo', null)");

        $consulta->bindParam(':idMateria',$materia);
        $consulta->bindParam(':idExpedienteU',$idExpedienteU);
        //$consulta->bindParam(':cicloPensum',$ciclou);
        $consulta->bindParam(':nombreMateria',$nomMateria);

        if($consulta->execute()) {
            //Si todo fue correcto muestra el resultado con exito;
          $_SESSION['message'] = 'Materia agregada';
          $_SESSION['message2'] = 'success';
          header("Location: ../../pensum.php");
        }else {
    
         
            $_SESSION['message'] = 'Error, No se pudo guardar el dato';
            $_SESSION['message2'] = 'danger';
            header("Location: ../../pensum.php");
        }

    }//fin de if

  }//fin while

    
else
{
   //Si todo fue correcto muestra el resultado con exito;
   $_SESSION['message'] = 'Datos no recibidos';
   $_SESSION['message2'] = 'danger';
   header("Location: ../../pensum.php");
  
}






?>