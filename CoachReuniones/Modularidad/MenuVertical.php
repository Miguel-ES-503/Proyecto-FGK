<!-- Page Content -->
<div id="page-content-wrapper">
    <?php  $idUser=$_SESSION['iduser']; ?>

    <nav class="navbar navbar-expand-lg border-bottom" id="menu">
        <button class="btn btn-dark" id="menu-toggle" style="background: #717175;"><i class="fas fa-bars"></i></button>

     <center>
      <a href="http://portal.workeysoportunidades.org/CoachReuniones/index.php">
      <img width="250px" height="10px" src="../img/SideBySideWhiteVersion.png" class="img-fluid">
      </a>
    </center>


        <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-sort-down"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                <script type="text/javascript">
                $(document).ready(function() {
                    //Recibir cantidad de notificaciones
                    $.ajax({
                        url: "Modelo/Notificaciones/notificaciones.php",
                        data: {
                            "user": "<?php echo $idUser; ?>",
                            "cuantas": "1"
                        },
                        type: "POST",
                        success: function(response) {
                            $(".cuantas").remove();
                            if (response == null || response == 0 || response == '') {
                                cuanto = 0;
                            } else {
                                cuanto = response;
                            }
                            $("#num").remove();

                            $("#cuantas").append('<p id="num">' + cuanto + '</p>');
                        }
                    });


                    //Recibir notificaciones
                    $.ajax({
                        url: "Modelo/Notificaciones/notificaciones.php",
                        data: {
                            "user": "<?php echo $idUser; ?>",
                            "noti": "1"
                        },
                        type: "POST",
                        success: function(response) {

                            $(".notificacion").remove();
                            notificacion = $.parseJSON(response);
                            for (var i = 0; i < notificacion.length; i++) {

                                var nombre = notificacion[i].nombreUsuario;
                                var imagen = notificacion[i].imgUsuario;
                                var tipo = notificacion[i].Tipo;
                                var EstadoSolicitud = notificacion[i].EstadoSolicitud;
                                var solicitud = notificacion[i].idSolicitud;
                                var estado = notificacion[i].Estado;
                                var idNoti = notificacion[i].Id;
                            }
                        }

                    });
                });
                </script>
                <script type="text/javascript">
                setInterval(function() {
                    //Recibir notificaciones
                    $.ajax({
                        url: "Modelo/Notificaciones/notificaciones.php",
                        data: {
                            "user": "<?php echo $idUser; ?>",
                            "cuantas": "1"
                        },
                        type: "POST",
                        success: function(response) {
                            $(".cuantas").remove();
                            if (response == null || response == 0 || response == '') {
                                cuanto = 0;
                            } else {
                                cuanto = response;
                            }
                            $("#num").remove();

                            $("#cuantas").append('<p id="num">' + cuanto + '</p>');
                        }
                    });
                }, 3000);
                </script>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown campana" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-dark" id="cuantas"></span>
                    </a>
                    <div class="contenedor dropdown-menu dropdown-menu-right bg-dark" id="notis"
                        aria-labelledby="navbarDropdown">
                        <script type="text/javascript">
                        setInterval(function() {
                            //Recibir notificaciones
                            $.ajax({
                                url: "Modelo/Notificaciones/notificaciones.php",
                                data: {
                                    "user": "<?php echo $idUser; ?>",
                                    "noti": "1"
                                },
                                type: "POST",
                                success: function(response) {
                                    $(".notificacion").remove();
                                    notificacion = $.parseJSON(response);
                                    for (var i = 0; i < notificacion.length; i++) {

                                        var nombre = notificacion[i].nombreUsuario;
                                        var imagen = notificacion[i].imgUsuario;
                                        var tipo = notificacion[i].Tipo;
                                        var EstadoSolicitud = notificacion[i].EstadoSolicitud;
                                        var solicitud = notificacion[i].idSolicitud;
                                        var estado = notificacion[i].Estado;
                                        var idNoti = notificacion[i].Id;

                                        if (tipo == 'Horas de vinculacion') {
                                            //Si es desinscribirse de un taller
                                            if (EstadoSolicitud == 'Aprobado') {
                                                if (estado == 'Visto') {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                } else {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<div class="novisto"></div>' +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                }
                                            } else if (EstadoSolicitud == 'Rechazado') {
                                                if (estado == 'Visto') {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                } else {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<div class="novisto"></div>' +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                }
                                            } else if (EstadoSolicitud == 'Enviado') {
                                                if (estado == 'Visto') {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="../DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                } else {
                                                    $("#notis").append(
                                                        '<div class="notificacion">' +
                                                        '<a class="dropdown-item noti" href="DetallesHorasSociales.php?id=' +
                                                        solicitud + '&&idNotif=' + idNoti +
                                                        '">' +
                                                        '<div class="row Envia">'

                                                        +
                                                        '<div class="novisto"></div>' +
                                                        '<img src="../img/imgUser/' + imagen +
                                                        '" alt="img de usuario" class="imgUsu" style = "height: 40px;' +
                                                        'width: 40px; background-repeat: no-repeat;' +
                                                        'border-radius: 50%;' +
                                                        'background-size: 100% auto;" ><span class="textoNoti">   ' +
                                                        nombre +
                                                        ' ha solicitado horas de vinculación.</span>' +
                                                        '</div>');
                                                }
                                            }
                                        }
                                    }



                                }
                            });
                        }, 3000);
                        </script>

                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php 
              $NombreUser = $_SESSION['Nombre'];
              $PrimerNombre = explode(" ", $NombreUser);
              echo $PrimerNombre[0]." ".$PrimerNombre[2]; 
              ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"
                        style="background: #343a40;">
                        <a class="dropdown-item" href="Configuracion.php" style="color: white;">Configuración</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../CerrarSession.php" style="color: white;">Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>