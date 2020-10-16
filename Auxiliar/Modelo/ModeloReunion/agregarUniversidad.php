<?php

require_once "../../../BaseDatos/conexion.php";
$idEmpresa = $_POST['idempresa'];
$idReunion = $_POST['idReunion'];
 $idEmpresa;
 $idReunion;
 session_start();  
 $varsesion = $_SESSION['Email'];
 $varLugar = $_SESSION['Lugar'];
 
 error_reporting(0);
 $stmt24 =$pdo->prepare("SELECT ID_Empresa FROM universidadreunion WHERE ID_Reunion = $idReunion" );
 $stmt24->execute();
 while($row = $stmt24->fetch()){
     $NombreU = $row["ID_Empresa"];
     if($idEmpresa == $NombreU){
         $igual =1;
     break;
     }
     else{
         $igual=0;
     }
 }
 


if($igual==1){
    $_SESSION['message'] = 'Fallo al agregar, ya se agregó esa Universidad a esta reunión';
    $_SESSION['message2'] = 'danger';
    header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));


}else
{
    $sql = "INSERT INTO universidadreunion (ID_Reunion, ID_Empresa) VALUES (?,?)";
    $stmt= $pdo->prepare($sql);
    if($stmt->execute([$idReunion, $idEmpresa])){
 
        $_SESSION['message'] = "Universidad Agregada Correctamente";
        $_SESSION['message2'] = 'success';
        header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));   
    }
    else{
        $_SESSION['message'] = 'Fallo al agregar la universidad';
        $_SESSION['message2'] = 'danger';
        header("Location: ../../ListaReunion.php?id=".urlencode($idReunion));
    }
}

?>