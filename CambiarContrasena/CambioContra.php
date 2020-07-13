<?php 
  session_start();  
  $varsesion = $_SESSION['Email'];
 require_once "../BaseDatos/conexion.php";
$consulta=$pdo->prepare("SELECT * FROM usuarios WHERE correo = ? ");
$consulta->execute(array($varsesion));

$IDuser;                                                                                                                                                                                                                  
if ($consulta->rowCount()>=1)
{
  while ($fila=$consulta->fetch())
  {   

    $IDuser = $fila['IDUsuario'];

  }
}
  error_reporting(0);
  if ($varsesion == null || $varsesion = "") {
  	header("Location: ../login.php");
  	die();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cambiar la contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../login/images/icons/WorkeysIcon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../login/css/util.css">

    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../login/css/main.css">

    <script src="../js/jquery.js"></script>

    <script src="../js/ValidarPassword.js"></script>

    <script type="text/javascript" src="../js/inputfile.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
    </script>

    <style type="text/css" media="screen">
    #EstiloAlerta {
        margin: 0 auto;
        width: 25%;
        height: 8%;

        position: fixed;
        top: 0;
        right: 0;
        margin-top: 5%;
        font-family: 'Roboto Light', arial;

    }

    #instagram,
    #celular,
    #linkedin {

        margin-top: 10px;
    }


    @media only screen and (max-width: 767px) {

        #EstiloAlerta {
            margin: 0 auto;
            width: 35%;
            height: 15%;

            position: fixed;
            top: 0;
            right: 0;
            margin-top: 5%;
            font-family: 'Roboto Light', arial;

        }
    }
    </style>

    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="float-right"> <?php include ('../SuperUsuario/Modularidad/Alerta.php') ?> </div>
            <span class="login100-form-title" style="color: white;">
                Restablecer Contra
            </span>
            

            <div id="pass" class="alert alert-danger">
                Las contraseñas no coinciden.
            </div>
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="../Modelo/RestablcerPassword.php" method="POST"
                    enctype="multipart/form-data">
                    <input type="hidden" name="iduser" value="<?php echo $_SESSION['Email'] ?>">
            <input type="hidden" name="iduser2" value="<?php echo $IDuser ?>">
                    <div class="row">
                    <!-- Formulario de redes sociales-->
                    <div class="col -sm">
                        <span class="login100-form-title" style="color: white;">
                            Formas de contacto
                        </span>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="facebook" id="facebook" placeholder="Facebook"
                                >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-facebook-square" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="se requiere una contraseña">
                            <input class="input100" type="text" name="instagram" id="instagram"
                                placeholder="Instagram" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="se requiere una contraseña">
                            <input class="input100" type="text" name="linkedin" id="linkedin" placeholder="LinkedIn"
                                required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="se requiere una contraseña">
                            <input class="input100" type="text" name="celular" id="celular"
                                placeholder="Celular (########)" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-phone-square" aria-hidden="true"></i>
                            </span>
                        </div>
                        <!--Fin de formulario de redes socieales-->
                    </div>

                    <div class="col -sm">
                        <div class="wrap-input100 validate-input" data-validate="se requiere una contraseña">
                            <input class="input100" type="text" name="password" id="password"
                                placeholder="Contraseña" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate="se requiere una contraseña">
                            <input class="input100" type="password" name="passwordVerifcado" id="passwordVerifcado"
                                placeholder="Repetir contraseña" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                            </span>
                        </div>
                        <br>
                        <div class="custom-file">
                            <input type="file" name="imgusu" id="imgusu" class="custom-file-input" accept="image"
                                required />
                            <label class="custom-file-label" for="customFileLang" data-browse="Buscar"
                                style="text-align: left">Foto de perfil</label>
                            <br><br>
                        </div>
                        <div class="container-login100-form-btn">
                            <input type="submit" value="Confirmar" name="Restablecer" id="Restablecer"
                                class="login100-form-btn">
                        </div>
                        <div class="text-center p-t-136">
                            <a class="txt2" href="../login.php" style="color: white;">
                                regresar
                                <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/bootstrap/js/popper.js"></script>
    <script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <!--===============================================================================================-->
    <script src="../login/js/main.js"></script>

</body>

</html>