 
<?php
require_once "../../../BaseDatos/conexion.php";

$iddescripcion = $_POST['idmateria'];

 $sql = $pdo->prepare("DELETE FROM `inscripcionmateria` WHERE `Id_InscripcidMateriaionM` =? ");
 
 if($sql->execute(array($iddescripcion))){

    echo "vaMOS bIEN";

    $sql2 = $pdo->prepare("UPDATE FROM materias SET estadoM = null WHERE idMateria = ? ");
    if($sql2->execute(array($iddescripcion))){
        echo "Chale a funcionado";
    }else{
        echo "Chale no funciona";
    }
    
 }
else{
    echo "nEL";
    echo $iddescripcion;
}













?>