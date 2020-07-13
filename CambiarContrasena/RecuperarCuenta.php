<?php  session_start(); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Restablecer Contraseña</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="../login/images/icons/WorkeysIcon.png"/>
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
  <link rel="stylesheet" type="text/css" href="../login/css/main.css">


  <style type="text/css" media="screen">
    
    #EstiloAlerta
    {
      margin: 0 auto; 
      width: 25%;
      height: 8%;

      position: fixed;
      top: 0; 
      right: 0;
      margin-top: 5%;
      font-family: 'Roboto Light', arial;

    }



    @media only screen and (max-width: 767px) {

      #EstiloAlerta
      {
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

</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
    <img class="img-fluid" src="../img/SideBySideWhiteVersion.png">
      <div class="wrap-login100">
     
        <div  class="float-right"> <?php include ('../SuperUsuario/Modularidad/Alerta.php') ?> </div>
        <div class="login100-pic js-tilt" data-tilt style="margin-right: 15%; ">
      
     
        </div>

        <form class="login100-form validate-form" action="../Modelo/RecuperarContrasena.php" method="POST">
          <span class="login100-form-title" style="color: white;">
          Recuperar Cuenta
          </span>

          <span class="login100-form-title" style="color: white;">
          <p style="text-align: justify; font-family: sans-serif; color: white;">Nota: Se te enviara un correo electrónico con una contraseña nueva la cual deberás ingresar al iniciar sesión.</p>
          </span>


          <div class="wrap-input100 validate-input" data-validate = "Se requiere un correo valido">
            <input class="input100" type="email" name="correo" id="correo"  placeholder="Correo electrónico"  required>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-envelope" aria-hidden="true"></i>
            </span>
          </div>

          
          <div class="container-login100-form-btn">
             <input type="submit" value="Confirmar" name="Restablecer" id="Restablecer"  class="login100-form-btn">
            
          </div>

        

          <div class="text-center p-t-136">
            <a class="txt2" href="../login.php" style="color: white;">
              regresar
              <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
            </a>
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
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  <script src="../login/js/main.js"></script>

</body>
</html>