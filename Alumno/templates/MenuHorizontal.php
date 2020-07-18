<!-- Page Content -->

<div id="page-content-wrapper" style="background-color: white;">

<nav class="navbar navbar-expand-lg border-bottom" id="menu" style="background-color: #2D2D2E;">
  
    <center>
      <a href="http://portal.workeysoportunidades.org/Alumno/index.php">
      <img width="390px" height="80px" src="../img/SideBySideWhiteVersion.png" alt="">
      </a>
    </center>
    <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-sort-down"></i></span>
    </button>

    <?php
      $extraeIdUsuario=$pdo->prepare("SELECT `IDUsuario` FROM `usuarios` WHERE `correo`='".$_SESSION['Email']."'");
      $extraeIdUsuario->execute();
      if ($extraeIdUsuario->rowCount()>0) {
        // code...
        $hilera=$extraeIdUsuario->fetch();
        $idUser=$hilera["IDUsuario"];
      }


    ?>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

        <script type="text/javascript">
          $(document).ready(function() {
            //Recibir cantidad de notificaciones
            $.ajax({
              url:"Modelo/Notificaciones/notificaciones.php",
              data:{"user":"<?php echo $idUser; ?>","cuantas":"1"},
              type:"POST",
              success: function(response) {
                $(".cuantas").remove();
                if (response==null || response ==0 || response=='') {
                  cuanto=0;
                }else {
                  cuanto=response;
                }
                $("#num").remove();

                  $("#cuantas").append('<p id="num">'+cuanto+'</p>');
              }
            });


            //Recibir notificaciones
            $.ajax({
              url:"Modelo/Notificaciones/notificaciones.php",
              data:{"user":"<?php echo $idUser; ?>","noti":"1"},
              type:"POST",
              success: function(response) {
                $(".notificacion").remove();
                  notificacion=$.parseJSON(response);
                  for (var i = 0; i < notificacion.length; i++) {

                    var nombre=notificacion[i].nombreUsuario;
                    var imagen=notificacion[i].imgUsuario;
                    var tipo=notificacion[i].Tipo;
                    var EstadoSolicitud=notificacion[i].EstadoSolicitud;
                    var solicitud=notificacion[i].idSolicitud;
                    var estado=notificacion[i].Estado;
                    var idNoti=notificacion[i].Id;


                    //Si es una solicitu de cambio de estado
                    if (tipo=='Cambio de estado') {
                      if (EstadoSolicitud=='Aprobado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }
                      }else if (EstadoSolicitud=='Enviado') {
                        if (estado=='Sin revisar') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }
                      }



                    }else if (tipo=='Horas de vinculacion') {

                      //Si es horas de vinculacion
                      if (EstadoSolicitud=='Aprobado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }
                      }else if (EstadoSolicitud=='Rechazado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }
                      }


                    }else if (tipo=='Desinscribirse') {

                      //Si es desinscribirse de un taller
                      if (EstadoSolicitud=='Aprobado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }
                      }else if (EstadoSolicitud=='Rechazado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }
                      }
                    }
                  }



              }
            });

          });
        </script>
        <script type="text/javascript">
        setInterval(function() {
          //Recibir notificaciones
          $.ajax({
            url:"Modelo/Notificaciones/notificaciones.php",
            data:{"user":"<?php echo $idUser; ?>","cuantas":"1"},
            type:"POST",
            success: function(response) {
              $(".cuantas").remove();
              if (response==null || response ==0 || response=='') {
                cuanto=0;
              }else {
                cuanto=response;
              }
              $("#num").remove();

                $("#cuantas").append('<p id="num">'+cuanto+'</p>');
            }
          });
        }, 3000);
        </script>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown campana" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="far fa-bell" style="color:white;"></i>
          <span class="badge badge-dark" id="cuantas"></span>
          </a>
          <div class="contenedor dropdown-menu dropdown-menu-right bg-dark" id="notis" aria-labelledby="navbarDropdown">
            <script type="text/javascript">
              setInterval(function() {
                //Recibir notificaciones
                $.ajax({
                  url:"Modelo/Notificaciones/notificaciones.php",
                  data:{"user":"<?php echo $idUser; ?>","noti":"1"},
                  type:"POST",
                  success: function(response) {
                    $(".notificacion").remove();
                      notificacion=$.parseJSON(response);
                      for (var i = 0; i < notificacion.length; i++) {

                        var nombre=notificacion[i].nombreUsuario;
                        var imagen=notificacion[i].imgUsuario;
                        var tipo=notificacion[i].Tipo;
                        var EstadoSolicitud=notificacion[i].EstadoSolicitud;
                        var solicitud=notificacion[i].idSolicitud;
                        var estado=notificacion[i].Estado;
                        var idNoti=notificacion[i].Id;


                        //Si es una solicitu de cambio de estado
                        if (tipo=='Cambio de estado') {
                          if (EstadoSolicitud=='Aprobado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }
                          }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliCambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }
                          }



                        }else if (tipo=='Horas de vinculacion') {

                          //Si es horas de vinculacion
                          if (EstadoSolicitud=='Aprobado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }
                          }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliHoras.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }
                          }


                        }else if (tipo=='Desinscribirse') {

                          //Si es desinscribirse de un taller
                          if (EstadoSolicitud=='Aprobado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }
                          }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="RevisarSoliDesinscribir.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                			+'width: 40px; background-repeat: no-repeat;'
                                			+'border-radius: 50%;'
                                			+'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
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
          <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 50px; height: 50px" >
          
          <?php

            $sesionCorreo=$_SESSION['Email'];

            $que=$pdo->prepare("select substring_index(`nombre`,' ',1) AS nombreAlumno FROM usuarios WHERE `correo`=:correo");
            $que->bindParam(":correo",$sesionCorreo);
            $que->execute();
            $nomAl;
            if ($que->rowCount() >0)
            {
              $r=$que->fetch();
              $nomAl = $r['nombreAlumno'];
            }
              echo $nomAl;

            ?>
          </a>
          <div class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdown">
          <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
      <center>
      <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
       </center>
        <hr>
        <b><p style="font-size: 11px;"><?php echo $_SESSION['Email'] ?></p></b>
      </div>
      <div class="list-group list-group-flush">
        <ul class="snip1135">
          <li><a href="AlumnoInicio.php" class="list-group-item list-group-item-action"><i class="far fa-address-book"></i> Expediente</a></li>
          <br>
          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-tasks"></i> Talleres <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">
              <ul>
               <li><a href="AlumnoInscritos.php" class="list-group-item list-group-item-action">Talleres inscritos</a></li>
               <li><a href="AlumnoMensuales.php" class="list-group-item list-group-item-action">Talleres mensuales</a></li>



             </ul>

            </div>
          </li>


          <?php
          $anio=date("Y");
          $month=date("m");
          $que2=$pdo->prepare("SELECT `estado` FROM `inscripcion` WHERE MONTH(`Fecha`)='".$month."' AND YEAR(`Fecha`)='".$anio."' AND `ID_Sede`='".$_SESSION['Lugar']."'");
          $que2->execute();
          $estadoInsc;
          if ($que2->rowCount() >0)
          {
            $r2=$que2->fetch();
            $estadoInsc = $r2['estado'];
          }

          if ($estadoInsc=='Activo') {
          ?>
          <li><a href="AlumnoInscribir.php" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Inscribir taller</a></li>
    <?php }else {
      ?>
      <li><a href="AlumnoInscribir.php" class="list-group-item list-group-item-action disabled"><i class="fas fa-pencil-alt"></i> Inscribir taller</a></li>
      <?php
    }
     ?>
      <li><a href="AlumnoReuniones.php" class="list-group-item list-group-item-action"><i class="fas fa-clipboard-list"></i> Reuniones</a></li>


    <!--Menu Transporte-->
       <li><a href="InscripcionTransporte.php" class="list-group-item list-group-item-action"><i class="fas fa-bus"></i> Transporte</a></li>
      <li>

    <!--Menu Carrera Universitaria-->


     <li>
        <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
          <i class="fas fa-graduation-cap"></i> Universidad <i class="fas fa-sort-down"></i>
        </a>
        <div class="collapse" id="collapseExample2">
          <ul>
           <li><a href="expedienteU.php" class="list-group-item list-group-item-action"><i class="fas fa-user-graduate"></i> Expediente</a></li>


           <li><a href="pensum.php" class="list-group-item list-group-item-action">  <i class="fas fa-file-pdf"></i> Pensum</a></li>
           
           <li><a href="IndicacionesMaterias.php" class="list-group-item list-group-item-action">  <i class="fas fa-book"></i> Materias</a></li>

           <li><a href="IndicacionesRetiros.php" class="list-group-item list-group-item-action">  <i class="fas fa-ban"></i> Retiros</a></li>
           

         </ul>
         
        </div>

      </li>
                <li><a href="preguntasfrecuentes.php" class="list-group-item list-group-item-action"><i class="far fa-question-circle"></i> Preguntas Frecuentes</a></li>
          <li><a href="inscribir_session.php" class="list-group-item list-group-item-action"><i class="fas fa-pencil-alt"></i> Inscribir Sesiones Individuales</a></li>
      <li><a href="configuracion.php" class="list-group-item list-group-item-action">  <i class="fas fa-book"></i> Configuración</a></li>
      <br>
           
    <li><a href="../CerrarSession.php" class="list-group-item list-group-item-action">  <i class=""></i> Salir</a></li>



        



            


            


        </ul>
      </div>
    </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
