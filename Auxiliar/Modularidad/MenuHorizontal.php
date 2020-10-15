<!--<body>-->

  <div class="d-flex" id="wrapper">

    <!-- Sidebar 
    <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
        <center>
          <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
        </center> 
        <hr>
        <b><p style="font-size: 10px; text-align: center; "><?php echo $_SESSION['Email'] ?></p></b>
      </div>
      <div class="list-group list-group-flush">
        <ul class="snip1135">
        
        

          <li>
            <a class="list-group-item list-group-item-action" href="Calendario.php" >
              <i class="far fa-calendar-alt"></i>  Calendario 
            </a>
          </li>

          

          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
              <i class="fas fa-chalkboard-teacher"></i> Administración <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">  
              <ul>
              <li><a href="SIT-CrearReunion.php" class="list-group-item list-group-item-action">Crear Reunión</a></li>
              <li><a href="LIS-Reunion.php" class="list-group-item list-group-item-action">Reuniones Activos</a></li>
              <li><a href="reunionesFinalizados.php" class="list-group-item list-group-item-action">Reuniones Finalizadas</a></li>
             </ul>
           </div>
         </li>
          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample">
            <i class="fas fa-user-graduate"></i>Estudiantes<i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample4">  
              <ul>
                <li><a href="LIS-Alumnos.php" class="list-group-item list-group-item-action">Alumnos</a></li>
                <li><a href="RecordAlumnos.php" class="list-group-item list-group-item-action">Récord Alumnos</a></li>
                <li><a href="BecasAprobadas.php" class="list-group-item list-group-item-action">Estado Beca</a></li> 
               </ul>
            </div>
          </li>

<br>
          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
             <i class="far fa-envelope"></i>Solicitud <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample3">  
              <ul>
              <li><a href="HorasVinculacion.php" class="list-group-item list-group-item-action">Horas De Vinculación</a></li> 
                  
               </ul>
            </div>
          </li>

             <li>
        <a class="list-group-item list-group-item-action" href="Manual/ManualTaller.pdf" >
          <i class="fas fa-info-circle"></i> Instrucciones
        </a>
      </li>

      <li>
        <a class="list-group-item list-group-item-action" href="ReporteReuniones.php" >
          <i class="fas fa-chart-pie"></i> Reporteria
        </a>
      </li>-->
      <!-- Link de preguntas Frecuentes 
      <li>
        <a class="list-group-item list-group-item-action" href="preguntas.php" ><i class="fas fa-question-circle"></i> Preguntas Frecuentes
        </a>
      </li>
    fin de preguntas frecuentes 
      <li>
        <a class="list-group-item list-group-item-action" href="sessionesOneonOne.php"><i class="fas fa-user-friends"></i> Sesiones Individuales
        </a>
      </li>
      <li>
        <a class="list-group-item list-group-item-action" href="modulosMoodle.php"><i class="fas fa-briefcase"></i> Módulos
        </a>
      </li>
      </ul>
    </div>
  </div>
/#sidebar-wrapper -->















<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="style_menu.css" rel="stylesheet" type="text/css" />
   <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="estilo.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
  
  /* The sidepanel menu */
.sidepanel {
  height: 658px; /* Specify a height */
  width: 0px; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0;
  left: 0;
  background-color:#2D2D2E; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 10px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidepanel */
}

/* The sidepanel links */
.sidepanel a {
  padding: 8px 8px 8px 8px;
  text-decoration: none;
  font-size: 15px;
  color: #2D2D2E;
  display: block;
  transition: 0.3s;

}

/* When you mouse over the navigation links, change their color */
.sidepanel a:hover {
  color: #2D2D2E;
}

/* Position and style the close button (top right corner) */
.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 15px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style the button that is used to open the sidepanel */
.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #2D2D2E;
  color: white;
  padding: 15px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #2D2D2E;
}
@media only screen and (min-width: 320px) and (max-width: 767px) {

  

.sidepanel #sidebar-wrapper { 
  margin-right: -18px;
font-size: 13px;


  
}
.linemenu{
  width: 210px;
  
}
#sidebar-wrapper .snip1135{
  margin-left: 210px;
  font-size: 13px;
 
}

.sidebar-heading {

margin-right: -230px;
font-size: 1.2rem;
background-color: #0D0D0D;

}


}
</style>
<body>

<div id="mySidepanel" class="sidepanel" style="background-color: #BE0032;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
     <div class="dark border-right" id="sidebar-wrapper">
      <div class="sidebar-heading justify-content-center align-items-center">
        <center>
          <img src ="../img/imgUser/<?php echo $_SESSION['Foto']?>" class="rounded-circle" class="img-responsive" style="width: 100px; height: 100px" >
        </center> 
        <hr>
        <b><p style="font-size: 10px; text-align: center; "><?php echo $_SESSION['Email'] ?></p></b>
      </div>

<!--Inicio -->

      <div class="list-group list-group-flush" >
        <ul class="snip1135 ml-lg-3" style="text-align: center;">
        
        
        <li>
            <a class="list-group-item list-group-item-action" href="Calendario.php" >
              <i class="far fa-calendar-alt"></i>  Calendario 
            </a>
          
          </li>

          <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >
            <i class="fas fa-chalkboard-teacher"></i> Taller <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample">  
              <ul class="mr-lg-1">
              <li><a href="SIT-ProcesoInscripcion.php" class="list-group-item list-group-item-action">Hora Inscripción</a></li>
               <li><a href="SIT-CrearTaller.php" class="list-group-item list-group-item-action">Crear Talleres</a></li>
               <li><a href="LIS-Talleres.php" class="list-group-item list-group-item-action">Talleres Activos</a></li>
               <li><a href="ListadoTalleresFinalizado.php" class="list-group-item list-group-item-action">Talleres Finalizados</a></li> 
               <li><a href="ListadoTalleresDesactivo.php" class="list-group-item list-group-item-action">Talleres Desactivos</a></li>
             </ul>
           </div>
         </li>

         <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size: 13px;">
            <i class="fas fa-university"></i> Reuniones<i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample4">  
              <ul class="mr-lg-1">
              <li><a href="SIT-CrearReunion.php" class="list-group-item list-group-item-action" id="submenu">Crear Reunión</a></li>
              <li><a href="LIS-Reunion.php" class="list-group-item list-group-item-action" id="submenu">Reuniones Activos</a></li>
              <li><a href="reunionesFinalizados.php" class="list-group-item list-group-item-action" id="submenu">Reuniones Finalizadas</a></li>
             </ul>
           </div>
         </li>

         <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size: 13px;">
            <i class="fas fa-user-graduate"></i>Estudiantes<i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample3">  
              <ul class="mr-lg-1">
              <li><a href="LIS-Alumnos.php" class="list-group-item list-group-item-action">Alumnos</a></li>
            <li><a href="RecordAlumnos.php" class="list-group-item list-group-item-action">Récord Alumnos</a></li>
            <li><a href="BecasAprobadas.php" class="list-group-item list-group-item-action">Estado Beca</a></li>
             </ul>
           </div>
         </li>

         <li>
            <a class="list-group-item list-group-item-action" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample" style="font-size: 13px;">
            <i class="fas fa-envelope"></i> Solicitud <i class="fas fa-sort-down"></i>
            </a>
            <div class="collapse" id="collapseExample2">  
              <ul class="mr-lg-1">
              <li><a href="PermisosDesincribirTaller.php" class="list-group-item list-group-item-action">Permisos Talleres</a></li> 
            <li><a href="HorasVinculacion.php" class="list-group-item list-group-item-action">Horas De Vinculación</a></li> 
             </ul>
           </div>
         </li>

          

          <li>
          <a class="list-group-item list-group-item-action" href="Graficos.php" >
          <i class="fas fa-archive"></i> Reportes Talleres 
        </a>
          </li>

          <li>
        <a class="list-group-item list-group-item-action" href="ReporteCompetenciasFecha.php" >
          <i class="fas fa-archive"></i> Reportes Competencias
        </a>
      </li>

          

         
          

<br>
         
      <!-- fin de preguntas frecuentes -->
     
      <li>
        <a class="list-group-item list-group-item-action" href="modulosMoodle.php"><i class="fas fa-briefcase"></i> Módulos
        </a>
      </li>
      </ul>
    </div>











<!-- Fin -->
  </div>
  <!-- /#sidebar-wrapper -->

</div>
</div>
<nav class="navbar navbar-expand-lg border-bottom" id="menu" style="background-color: #2D2D2E;">
    <button class="openbtn" onclick="openNav()">&#9776;</button>
    <center>
      <a href="http://portal.workeysoportunidades.org/SuperUsuario/index.php">
        <img width="340px" height="80px" src="../img/SideBySideWhiteVersion.png" alt="">
      </a>
    </center>
    
        <button class="navbar-toggler btn-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
          <span class="navbar-toggler-icon"><i class="fas fa-sort-down"></i></span>
        </button>
        
        
 
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


          if (tipo=='Cambio de estado') {
                      //Si es desinscribirse de un taller
                      if (EstadoSolicitud=='Aprobado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                             +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                           +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                  +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                              +'</div>');
                        }

                         }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                    +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                               +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }
                      }else if (EstadoSolicitud=='Enviado') {
                        if (estado=='Visto') {
                          $("#notis").append('<div class="notificacion">'
                             +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                 +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                              +'</div>');
                        }else {
                          $("#notis").append('<div class="notificacion">'
                            +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                              +'<div class="row Envia">'

                              +'<div class="novisto"></div>'
                                  +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                  +'width: 40px; background-repeat: no-repeat;'
                                  +'border-radius: 50%;'
                                 +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown campana" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

                     if (tipo=='Cambio de estado') {
                          //Si es desinscribirse de un taller
                          if (EstadoSolicitud=='Aprobado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                 +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                     +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }
                            }else if (EstadoSolicitud=='Rechazado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                 +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                     +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                                +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                      +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }
                          }else if (EstadoSolicitud=='Enviado') {
                            if (estado=='Visto') {
                              $("#notis").append('<div class="notificacion">'
                                 +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                     +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
                                  +'</div>');
                            }else {
                              $("#notis").append('<div class="notificacion">'
                               +'<a class="dropdown-item noti" href="DetallesSolicitudCampoLaboral.php?id='+solicitud+'&&idNotif='+idNoti+'">'
                                  +'<div class="row Envia">'

                                  +'<div class="novisto"></div>'
                                      +'<img src="../img/imgUser/'+imagen+'" alt="img de usuario" class="imgUsu" style = "height: 40px;'
                                      +'width: 40px; background-repeat: no-repeat;'
                                      +'border-radius: 50%;'
                                     +'background-size: 100% auto;" ><span class="textoNoti"> '+nombre+' ha solicitado un cambio de estado.</span>'
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
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php 
              $NombreUser = $_SESSION['Nombre'];
              $PrimerNombre = explode(" ", $NombreUser);
              echo utf8_encode($PrimerNombre[0]." ".$PrimerNombre[2]) ; 
              ?>
              </a>

         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="background: #2D2D2E;">
          
                <a class="dropdown-item" href="Configuracion.php" style="color: white;">Configuración</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../CerrarSession.php" style="color: white;">Salir</a>
              </div>

            </li>
          </ul>
          
          
        </button>
        </div>

</nav>

</body>
</html>
<script type="text/javascript">
  /* Set the width of the sidebar to 250px (show it) */
function openNav() {
  document.getElementById("mySidepanel").style.width = "270px";
}

/* Set the width of the sidebar to 0 (hide it) */
function closeNav() {
  document.getElementById("mySidepanel").style.width = "0";
}
</script>