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
    $Cargo = $fila['cargo'];

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
    <title>Cambio de contraseña</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../login/images/icons/WorkeysIcon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/vendor/noui/nouislider.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/css/util.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../InicioSesion/css/main.css">
    <!--===============================================================================================-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--===============================================================================================-->
    <script src="../js/jquery.js"></script>
    <!--===============================================================================================-->
    <script src="../js/ValidarPassword.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="../js/inputfile.js"></script>



    <!--*******************Es para leer el evento cuando trata de subir la imagens-->
    <script type="text/javascript">
    $(document).ready(function() {
        bsCustomFileInput.init()
    });
    </script>
</head>




<body>


    <div class="container-contact100">

        <div class="wrap-contact100">
            <form class="contact100-form validate-form" action="../Modelo/RestablcerPassword.php" method="POST"
                enctype="multipart/form-data">
                <span class="contact100-form-title" id="ocultar6">
                    Redes sociales
                </span>
                <span class="contact100-form-title" id="ocultar7">
                   Foto de perfil
                </span>
                <!--***********************Este inputa abarca todo el espacio 
				<div class="wrap-input100 validate-input bg1" data-validate="Please Type Your Name">
					<span class="label-input100">FULL NAME *</span>
					<input class="input100" type="text" name="name" placeholder="Enter Your Name">
				</div>-->
                <!--***********Este serviria para validar email
				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Email (e@a.x)">
					<span class="label-input100">Facebook</span>
					<input class="input100" type="text" name="email" placeholder="Enter Your Email ">
				</div>-->
                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar">
                    <span class="label-input100">Facebook*</span>
                    <input class="input100" type="text" name="facebook" id="facebook"
                        placeholder="Escribe el link de tu perfil">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar1">
                    <span class="label-input100">Instagram*</span>
                    <input class="input100" type="text" name="instagram" id="instagram"
                        placeholder="Escribe el link de tu perfil">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar2">
                    <span class="label-input100">Twitter*</span>
                    <input class="input100" type="text" name="twitter" id="twitter"
                        placeholder="Escribe el link de tu perfil">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar3">
                    <span class="label-input100">LinkedIn*</span>
                    <input class="input100" type="text" name="linkedin" id="linkedin"
                        placeholder="Escribe el link de tu perfil">
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar4">
                    <span class="label-input100">Celular**</span>
                    <input class="input100" type="text" name="celular" id="celular" placeholder="Escribe tú número de teléfono "
                        >
                </div>

                <div class="wrap-input100 bg1 rs1-wrap-input100" id="ocultar5">
                    <span class="label-input100">Foto de perfil</span>
                    <!--El div "custom-file" es para lo de subir la imagen -->
                    <div class="custom-file" style="margin: 5% 0% 0% 0%;">
                        <input type="file" name="imgusu" id="imgusu" class="custom-file-input" accept="image"
                            required />
                        <label class="custom-file-label" for="customFileLang" data-browse="Buscar"
                            style="text-align: left; width: 90%;">Foto de perfil</label>
                        <br><br>
                    </div>
                </div>

                <span class="contact100-form-title">
                    Restablecer contraseña
                </span>
                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Contraseña</span>
                    <input class="input100" name="password" id="password" type="password" name="phone"
                        placeholder="Escribe la contraseña" required>
                </div>
                <div class="wrap-input100 bg1 rs1-wrap-input100">
                    <span class="label-input100">Repita contraseña</span>
                    <input class="input100" name="passwordVerifcado" id="passwordVerifcado" type="password" name="phone"
                        placeholder="Escribe nuevamenta la contraseña" required>
                </div>
                <div id="pass" class="alert alert-warning" role="alert">
                    <strong>Advertencia!</strong> Las contraseñas no coinciden.
                </div>

                <div id="redes" class="alert alert-warning" role="alert">
                    <strong>Advertencia!</strong> Debes ingresar almenos 2 redes.
                </div>
                <div id="phone" class="alert alert-warning" role="alert">
                    <strong>Advertencia!</strong> Debes ingresar un número telefónico de 8 dígitos.
                </div>



                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn" name="Restablecer" id="Restablecer">
                        <span>
                            OK
                            <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                        </span>
                    </button>
                </div>
                <span class="contact100-form">
                    <label style="margin: 0% 0% 0% 2%;">*Debes ingresar al menos 2 redes sociales.</label>
                </span>
                <span class="contact100-form">
                    <label style="margin: 0% 0% 0% 2%;">**Campo obligatorio.</label>
                </span>
                <input type="hidden" name="iduser" value="<?php echo $_SESSION['Email'] ?>">
                <input type="hidden" name="iduser2" value="<?php echo $IDuser ?>">

                <!--Se recibe el cargo en el input para despues enviarlo a un js para validar-->
                <input type="hidden" name="Cargo" id="Cargo" value="<?php echo $Cargo ?>">
                <!--************Sirve para hacer una lista desplegable anidada
                <div class="wrap-input100 input100-select bg1">
                    <span class="label-input100">Needed Services *</span>
                    <div>
                        <select class="js-select2" name="service">
                            <option>Please chooses</option>
                            <option>eCommerce Bussiness</option>
                            <option>UI/UX Design</option>
                            <option>Online Services</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                </div>

                <div class="w-full dis-none js-show-service">
                    <div class="wrap-contact100-form-radio">
                        <span class="label-input100">What type of products do you sell?</span>

                        <div class="contact100-form-radio m-t-15">
                            <input class="input-radio100" id="radio1" type="radio" name="type-product" value="physical"
                                checked="checked">
                            <label class="label-radio100" for="radio1">
                                Phycical Products
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="radio2" type="radio" name="type-product" value="digital">
                            <label class="label-radio100" for="radio2">
                                Digital Products
                            </label>
                        </div>

                        <div class="contact100-form-radio">
                            <input class="input-radio100" id="radio3" type="radio" name="type-product" value="service">
                            <label class="label-radio100" for="radio3">
                                Services Consulting
                            </label>
                        </div>
                    </div>

                    <div class="wrap-contact100-form-range">
                        <span class="label-input100">Budget *</span>

                        <div class="contact100-form-range-value">
                            $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                            <input type="text" name="from-value">
                            <input type="text" name="to-value">
                        </div>

                        <div class="contact100-form-range-bar">
                            <div id="filter-bar"></div>
                        </div>
                    </div>
                </div>
                -->
                <!--**********Sirve para escribir un mensaje
                <div class="wrap-input100 validate-input bg0 rs1-alert-validate"
                    data-validate="Please Type Your Message">
                    <span class="label-input100">Message</span>
                    <textarea class="input100" name="message" placeholder="Your message here..."></textarea>
                </div>
                -->

            </form>
        </div>
    </div>

    <!--*****************************Para la foto de perfil--->
    <?php
    /*
    <!--===============================================================================================-->
    <script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/bootstrap/js/popper.js"></script>
    <script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    
    
   
    <!--===============================================================================================-->
    <script src="../login/js/main.js"></script> */
?>
    <!--********************Termina lo de la foto de perfil-->


    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/bootstrap/js/popper.js"></script>
    <script src="../InicioSesion/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/select2/select2.min.js"></script>
    <script src="../login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
    </script>
    <script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });


        $(".js-select2").each(function() {
            $(this).on('select2:close', function(e) {
                if ($(this).val() == "Please chooses") {
                    $('.js-show-service').slideUp();
                } else {
                    $('.js-show-service').slideUp();
                    $('.js-show-service').slideDown();
                }
            });
        });
    })
    </script>

    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/daterangepicker/moment.min.js"></script>
    <script src="../InicioSesion/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/vendor/noui/nouislider.min.js"></script>
    <script>
    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [1500, 3900],
        connect: true,
        range: {
            'min': 1500,
            'max': 7500
        }
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function(values, handle) {
        skipValues[handle].innerHTML = Math.round(values[handle]);
        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
    });
    </script>
    <!--===============================================================================================-->
    <script src="../InicioSesion/js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>