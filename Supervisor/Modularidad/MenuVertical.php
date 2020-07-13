<!-- Page Content -->
<style>
#op:hover{
    background-color: #959C9C;
}
#op2:hover{
    background-color: #959C9C;
}
#logito{
    margin-left: 25%;
    height:50px;
}
@media only screen and (max-width: 992px) {

  #logito {
 
     width: 20%;
    margin-left: 0%;
  }


}
    </style>
</style>
<div id="page-content-wrapper">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <nav class="navbar navbar-expand-lg border-bottom" id="menu">
    <button class="btn btn-dark" id="menu-toggle"><i class="fas fa-bars"></i></button>

    <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"><i class="fas fa-sort-down"></i></span>
    </button>
    <center><img src="../img/WorkeysBlanco.png" alt=""  style=" " id="logito" ></center>
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


                    if (tipo=='Horas de vinculacion') {
                      //Si es horas de vinculacion
                      if (EstadoSolicitud=='Aprobado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
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
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
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
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                              +'</div>');
                        }

                         }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">   '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }
                      }else if (EstadoSolicitud=='Enviado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="Solicitudes/cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href=../PermisosDesincribirTaller.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
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
        <?php
        /*<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown campana" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
          <i class="far fa-bell"></i>
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


                         if (tipo=='Horas de vinculacion') {
                          //Si es horas de vinculacion
                          if (EstadoSolicitud=='Aprobado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha aprobado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
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
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">El usuario '+nombre+' Ha rechazado tu solicitud</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
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
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">   '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }
                            }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">   '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="cambio.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }
                          }else if (EstadoSolicitud=='Enviado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="../PermisosDesincribirTaller.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">'+nombre+' ha solicitado desinscribirse de un taller.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="PermisosDesincribirTaller.php?idSoli='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti">'+nombre+' ha solicitado desinscribirse de un taller.</span>'
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
        </li>*/
        ?>
        <li class="nav-item dropdown" >
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
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
            <a class="dropdown-item" href="Configuracion.php" style="color: white;" id="op" >Configuración</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../CerrarSession.php" style="color: white;" id="op2">Salir</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
