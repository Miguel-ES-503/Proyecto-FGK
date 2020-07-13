<?php
//Conexión con la base de datos;
include_once '../BaseDatos/conexion.php';
session_start();  
if (isset($_POST['Restablecer'])) 
{
    $iduser=$_POST['iduser2'];
  

    if($_FILES["imgusu"]["error"]>0){
        //Si entra aqui es porque ha tenido un error al subir la img
      $_SESSION['message'] = 'No has selecciona la imagen';
      $_SESSION['message2'] = 'danger';
        header("Location: ../CambiarContrasena/CambioContra.php");
    }else{
        //Si entra aqui es porqueno tenemos ningun error
        $tipoimg = array("image/jpg","image/png","image/jpeg");

        //verifica con la funcion in_array si el tipo de la imagen es igual a algun tipo de dato en la variable $tipoimg
        if(in_array($_FILES["imgusu"]["type"], $tipoimg)){

            //hacemos referencia a la ruta donde guardaremos la imagen
            $rutaimg = '../img/imgUser/';
            
            //guardamos la extencion de la imagen
            $extensionimg = explode("/",$_FILES["imgusu"]["type"]);
            
            //se genera un numero de 5 cifras para renombrar la imagen
            //esto es opcional porque esto lo utilice para mis imagenes
            $d=$iduser.rand(10000,99999);
            
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

                /*$conexion3 = new DB();

                $cn1 = $conexion3->connect();  
                $cn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                $query3 = $cn1->prepare('INSERT INTO imagenes (NombreImg)
                VALUES (?)');

                //le pasamos solo el nombre de la imagen
                $query3->execute(array($img));
                */
                
                //copiano la imagen con la funcion @move_uploaded_file()
                //y como parametros le pasamos la imagen que subio el usuario
                //y como segundo parametro toda la ruta hasta con el nombre de la imagen para que la guarde
                $resultadoimg = @move_uploaded_file($_FILES["imgusu"]["tmp_name"], $nombreimg);

                $Password = $_POST['passwordVerifcado'];
                #Verificamos si alguna variable de las redes sociales viene vacia
                if ($_POST['facebook']) {
                    $fcb = $_POST['facebook'];                    
                } else  {
                   $fcb = '0';
                }
                if ($_POST['instagram']){
                    $ing = $_POST['instagram'];                    
                }else {
                    $ing = '0';
                }
                if ($_POST['linkedin']) {
                    $lik = $_POST['linkedin'];
                }
                else {
                    $lik ='0';
                }
                if ($_POST['twitter']) {
                    $twt = $_POST['twitter'];
                }else{
                    $twt = '0';
                }
               
                
               #El celular como es obligacion no lo verificamos ya que si o si debe traer informacion
                
               if($_POST['celular'])
               {
                $cel = $_POST['celular'];
               }
               

                $Clave= password_hash($Password, PASSWORD_DEFAULT);//Incriptamos la contraseña del usuario generado automaticamente

                //Consulta de actualización de datos
                $consulta=$pdo->prepare("UPDATE usuarios SET  imagen=:imagen , contrasena=:contrasena , conteo_entradas = '1'  WHERE correo=:id");
                $consulta->bindParam(":imagen",$img);
                $consulta->bindParam(":contrasena",$Clave);
                $consulta->bindParam(":id",$_SESSION['Email']);

                #Consulta para actualizar los datos de las redes sociales
                $consulta2 =$pdo->prepare("UPDATE alumnos SET Facebook = :fcb , Instagram = :ing , LinkedIn = :lik , Celular = :cel , Twitter = :twt WHERE correo=:id");
                $consulta2->bindParam(":fcb",$fcb);
                $consulta2->bindParam(":ing",$ing);
                $consulta2->bindParam(":lik",$lik);
                $consulta2->bindParam(":cel",$cel);
                $consulta2->bindParam(":twt",$twt);
                $consulta2->bindParam(":id",$_SESSION['Email']);

                //Verifica si ha insertado los datos
			if ($consulta->execute()) 
			{    
                  session_destroy();
                  session_start(); 
                //Si todo fue correcto muestra el resultado con exito;
                if ($_POST['Cargo'] == "Estudiante") {
                     $consulta2->execute();
                }
                $_SESSION['message'] = 'Cuenta Activada';
                $_SESSION['message2'] = 'success';             
                header("Location: ../login.php");                               
				
            }
			else
			{	
				echo 'No se pudo actualizar contrasena';
			}



                

                echo "Si se pudo subir la IMAGEN";
            }else{
                //entra a este else si existe una imagen con el mismo nombre generado
                echo 'entra a este else si existe una imagen con el mismo nombre generado';
                
            }
        }else{
            //Si entra a este else es porque la imagen no esta con una extencion valida
            echo 'Si entra a este else es porque la imagen no esta con una extencion valida';
            
        }
    }

}

?>