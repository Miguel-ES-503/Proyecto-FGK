<?php

  require_once 'templates/head.php';

?>

<title>InicioAlumno</title>

<?php


//Manda  allamar plantillas
  require_once 'templates/header.php';

  //require_once 'templates/MenuVertical.php';
  require_once 'templates/MenuHorizontal.php';


  require '../Conexion/conexion.php';
  


  //Extraemos el carnet del estudiante
  $stmt1 =$dbh->prepare("SELECT `ID_Alumno`, `SedeAsistencia`, `ID_Sede` FROM `alumnos` WHERE `correo`='".$_SESSION['Email']."'");
  // Ejecutamos
  $stmt1->execute();

  while($fila = $stmt1->fetch()){
      $alumno=$fila["ID_Alumno"];
  }
  $fechaActual=date("Y-m-d");

  $verificaFinSolicitud=$dbh->prepare("SELECT  `id_alumno`, `fechaFin`, s.Nombre FROM solicitudcambio sc JOIN status s ON sc.id_status=s.ID_Status WHERE `id_alumno`='".$alumno."' AND `fechaFin`<='".$fechaActual."'");
  $verificaFinSolicitud->execute();
  while ($fila1=$verificaFinSolicitud->fetch()) {
    // code...
    $actualizaAlumno=$dbh->prepare("UPDATE `alumnos` SET `ID_Status`='EST001' WHERE `ID_Alumno`='".$fila1['id_alumno']."'");
    $actualizaAlumno->execute();
  }

?>
<style type="text/css">
   /* Three image containers (use 25% for four, and 50% for two, etc) */
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}
@media only screen and (max-width: 1080px ) {

#novedades h3, p{
font-size: 15px;

}

h1{
font-size: 13px;

}

#enlaces h3, h4{
font-size: 15px;

}

#avisos h3, p{
font-size: 15px;

}

#avisos img{
  height: 50px;
width: 50px;
}


#enlaces img{
  height: 50px;
width: 50px;


}
#img1{
height: 50px;
width: 50px;

}

#img2{
  height: 30px;
width: 100px;


}

.btn-leer{
  height: 20px;

  width: 30%;
}
.btn-leer2{
  height: 20px;
  position: relative;
  top: 22px;
  right: 50px;
 
}
.avisos{
position: relative;
right: 20px;

}

.enlace{
color: white;

}

#imgaviso{
position: relative;
left: 10px;

}


#enlaces{
  float: left;
}
#enlace2{
  color: white;
}
}
</style>

  <div class="container-fluid text-center" style="background-color: white; ">


    <div class="text-center"">
    
    <div>
        <h1 style="color:#BE0032;"> Bienvenido al sistema Side by Side del Programa Oportunidades</h1>
    </div>
    
    <div class="text-center">

      <div id="demo" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/slider1.jpg" alt="Los Angeles">
      </div>
      <div class="carousel-item">
        <img src="../img/silder2.png" alt="Chicago">
      </div>
      <div class="carousel-item">
        <img src="../img/slider3.jpg" alt="New York">
      </div>
      <div class="carousel-item">
        <img src="../img/slider4.jpg" alt="New York">
      </div>
    </div>

    <!-- Left and right controls -->
    
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

   </div>
    </div>
    <br>
    <br>
        <div class="row" style="">
        <div class="col-lg-11 col-md-8 col-sm-8 col-xs-12">
        <div id="novedades">
        <h3 style="text-align: left; font-weight: bold;">Novedades<h3>
        <img class="img-fluid" id="img1" src="../img/novedades.png" width="100px" height="100px">
        <div style="float: right; margin-left: 5px;"><p style="text-align: left;">Boletin</p>
        <img class="img-fluid" id="img2" src="../img/logonegro.png" width="150px">
        </div>
            <br>
        <center><a href="https://issuu.com/oportunidades0?issuu_product=header&issuu_subproduct=document_page&issuu_context=link&issuu_cta=profile" target="blank" style="text-decoration: none;"><button class="btn-leer"  >Leer</button></a></center>
        </div>
        <div id="avisos"  >
        <h3  class="avisos" style="font-weight: bold;">Avisos<h3>
        <img class="img-fluid" id="imgaviso" src="../img/avisos.png" width="100px" height="100px">
        <div style="float: right; " ><p class="enlace" style="text-align: left;">Enlace IG:<br>
        </p>
        <center><a href="https://www.instagram.com/bk2oportunidades/" target="_black" style="text-decoration: none;"><button class="btn-leer2" >Visitar</button></a></center>
        </div>
        
        </div>
        <div id="enlaces">
        <table class="table-responsive">

        <h3 id="enlace2" style="font-weight: bold;">Enlaces<h3>
        
        <tr>
        <td>
          <a href="Manual/ManualEstudiante.pdf" target="_black">
        <img class="img-fluid" src="../img/manual.png" width="100px" height="100px">
        </a>
        <td>
        <h4>Manual de usuario</h4>
        </td>
        </td>
        </tr>
        <tr>
        <td>
        <a href="http://workeysoportunidades.org/" target="_black"><img class="img-fluid" src="../img/landing.png" width="90px" height="90px">
        </td>
        <td>
        <h4>Workey's landing page</h4>
        </td>

        </tr>
        </table>
        </div>


    </div>
    
    </div>
    <br>
    
   
  </div>
  </div>

<!-- /#page-content-wrapper -->




<!-- /#wrapper -->


<?php

  require_once 'templates/footer.php';

?>
