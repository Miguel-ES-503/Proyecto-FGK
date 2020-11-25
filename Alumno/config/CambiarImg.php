<?php
error_reporting(0);
//Conexión con la base de datos;
require_once "../../BaseDatos/conexion.php";
session_start();
$varsesion = $_SESSION['Email'];

if (isset($_POST['SubirImg']))
{


$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE correo = :correo");
$consulta->bindParam(':correo',$varsesion);
$consulta->execute();



$Foto;
$IDUser;
if ($consulta->rowCount() >=0)
    {
        $fila=$consulta->fetch();
        $Foto = $fila['imagen'];
        $IDUser = $fila['IDUsuario'];
        $Sede = $fila['ID_Sede'];
    }

$sql = "SELECT IDUsuario FROM usuarios WHERE cargo = 'Coach Fase 2' AND ID_Sede = '".$Sede."'";
foreach ($pdo->query($sql) as $coach) {
    $idCoach = $coach['IDUsuario'];
}



if($_FILES["imgusu"]["error"]>0){
        //Si entra aqui es porque ha tenido un error al subir la img

        echo'<script type="text/javascript">
                    window.location.href="../configuracion.php";
                    </script>';
                    $_SESSION['message'] = 'No has selecciona la imagen';
                    $_SESSION['message2'] = 'danger';

       // header("Location: ../configuracion.php");
    }
    else
    {


if ($Foto !=null) {
   $destino = "../../img/imgUser/".$Foto;
   unlink($destino);
}

        //Si entra aqui es porqueno tenemos ningun error
        $tipoimg = array("image/jpg","image/png","image/jpeg");

        //verifica con la funcion in_array si el tipo de la imagen es igual a algun tipo de dato en la variable $tipoimg
        if(in_array($_FILES["imgusu"]["type"], $tipoimg)){

            //hacemos referencia a la ruta donde guardaremos la imagen
            $rutaimg = '../../img/imgUser/';

            //guardamos la extencion de la imagen
            $extensionimg = explode("/",$_FILES["imgusu"]["type"]);

            //se genera un numero de 5 cifras para renombrar la imagen
            //esto es opcional porque esto lo utilice para mis imagenes
            $d=$IDUser;

            //en la variable $nombreimg concatenamos toda la ruta y el nombre de la imagen para
            //que no se escriba si hay otra imagen con el mismo nombre en esa ruta
            $nombreimg = $rutaimg . "img" .$d . "." . $extensionimg[1];

            //guardamos solo el nombre de la imagen con su extencion
            $img = "img" . $d . "." . $extensionimg[1];

            //verificamos si existe la carpeta /img y si no existe se crea
            if(!file_exists($rutaimg)){
                mkdir($rutaimg);
            }


            //verificamos si existe una imagen con
            if(!file_exists($nombreimg)){
                //guardando el nombre de la imagen en la base de datos



                //copiano la imagen con la funcion @move_uploaded_file()
                //y como parametros le pasamos la imagen que subio el usuario
                //y como segundo parametro toda la ruta hasta con el nombre de la imagen para que la guarde
                $resultadoimg = @move_uploaded_file($_FILES["imgusu"]["tmp_name"], $nombreimg);

                //Consulta de actualización de datos
                $consulta=$pdo->prepare("UPDATE usuarios SET  imagen=:imagen  WHERE correo=:id");
                $consulta->bindParam(":imagen",$img);
                $consulta->bindParam(":id",$varsesion);

                //Verifica si ha insertado los datos
                if ($consulta->execute())
                {
                //Si todo fue correcto muestra el resultado con exito;

                
               

                   $_SESSION['message'] = 'Imagen Cambiada con exito';
                   $_SESSION['message2'] = 'success';

                    $Vaciar = null;
                    $_SESSION['Foto'] = $Vaciar;
                    $_SESSION['Foto'] = $img;
                    include 'notificacion.php';

                    echo'<script type="text/javascript">
                    window.location.href="../configuracion.php";
                    </script>';

                // header("Location: ../configuracion.php");   
            }
            else
            {


                echo'<script type="text/javascript">
                window.location.href="../configuracion.php";
                </script>';
                
            $_SESSION['message'] = "No se pude actualizar la imagen en la BDD";
            $_SESSION['message2'] = 'danger';

               
                // header("Location: ../configuracion.php");
            }


        }else{

            echo'<script type="text/javascript">
			window.location.href="../configuracion.php";
			</script>';
			
		$_SESSION['message'] = "existe una imagen con el mismo nombre generado";
        $_SESSION['message2'] = 'danger';

        
        //    header("Location: ../configuracion.php");
                //entra a este else si existe una imagen con el mismo nombre generado
       }
   }else{

    echo'<script type="text/javascript">
			window.location.href="../configuracion.php";
			</script>';
			
		$_SESSION['message'] = "No se pude cambiar la imagen ya que no esta con una extencion valida";
        $_SESSION['message2'] = 'danger';

    
    //    header("Location: ../configuracion.php");
            //Si entra a este else es porque la imagen no esta con una extencion valida

   }
}



}

?>
